<?php

namespace App\Services;

use App\Models\QuoteRequest;

class QuoteRequestPdf
{
    public function render(QuoteRequest $quote): string
    {
        $logo = $this->loadLogo();
        $content = [];
        $content[] = 'q 0.02 0.16 0.41 rg 0 720 612 72 re f Q';
        $this->logo($content);
        $this->text($content, 390, 755, 'FORMAL QUOTATION', 11, [1, 1, 1], true);
        $this->text($content, 390, 739, $quote->reference, 10, [0.93, 0.79, 0.42], true);

        $y = 686;
        $this->text($content, 48, $y, 'DSAM PLASTIC PACKAGING MANUFACTURING', 14, [0.02, 0.16, 0.41], true);
        $this->text($content, 48, $y - 17, 'San Pedro, Laguna, Philippines  |  0917 833 9142  |  contact@dsam-packaging.com', 8, [0.25, 0.28, 0.34]);
        $this->line($content, 48, $y - 29, 564, $y - 29, [0.82, 0.84, 0.88]);

        $y -= 61;
        $this->section($content, 'CLIENT INFORMATION', $y);
        $y -= 24;
        $y = $this->field($content, 'Client / Company', $quote->client_name, 48, $y);
        $y = $this->field($content, 'Email', $quote->client_email, 310, $y + 16);
        $y -= 8;
        $y = $this->field($content, 'Contact Number', $quote->client_phone, 48, $y);
        $y = $this->field($content, 'Delivery Destination', $quote->client_address ?: 'Not specified', 310, $y + 16);

        $y -= 28;
        $this->section($content, 'PACKAGING REQUIREMENTS', $y);
        $y -= 24;
        $y = $this->field($content, 'Product Category', $quote->product_category, 48, $y);
        $y = $this->field($content, 'Material', $quote->material_type ?: 'Not specified', 310, $y + 16);
        $y -= 8;
        $y = $this->field($content, 'Target Quantity', $quote->target_quantity ?: 'Not specified', 48, $y);
        $y = $this->field($content, 'Dimensions / Size', $quote->dimensions_size ?: 'Not specified', 310, $y + 16);
        $y -= 8;
        $y = $this->field($content, 'Thickness / Gauge', $quote->thickness_gauge ?: 'Not specified', 48, $y);
        $y = $this->field($content, 'Printing', $quote->print_type ?: 'Not specified', 310, $y + 16);

        $y -= 31;
        $this->section($content, 'CLIENT NOTES AND TECHNICAL SCOPE', $y);
        $y -= 24;
        $notes = $quote->other_notes ?: 'No additional notes supplied.';
        foreach ($this->wrap($notes, 92) as $line) {
            $this->text($content, 48, $y, $line, 9, [0.18, 0.2, 0.25]);
            $y -= 14;
        }

        if ($quote->pricing) {
            $priceY = 214;
            $this->section($content, 'QUOTATION PRICE', $priceY);
            $tiers = $quote->pricingTiers;
            if ($tiers->isEmpty()) {
                $tiers = collect([(object) [
                    'quantity' => $quote->pricing->quantity,
                    'total_price' => $quote->pricing->total_estimate,
                ]]);
            }
            $boxHeight = 30 + ($tiers->count() * 22);
            $this->box($content, 48, $priceY - $boxHeight - 12, 516, $boxHeight, [0.94, 0.96, 0.98]);
            $this->text($content, 62, $priceY - 35, 'QUANTITY', 8, [0.25, 0.28, 0.34], true);
            $this->text($content, 260, $priceY - 35, 'PRICE / PIECE', 8, [0.25, 0.28, 0.34], true);
            $this->text($content, 420, $priceY - 35, 'TOTAL PRICE', 8, [0.25, 0.28, 0.34], true);
            $rowY = $priceY - 55;
            foreach ($tiers as $tier) {
                $this->text($content, 62, $rowY, number_format((int) $tier->quantity), 9, [0.05, 0.08, 0.14]);
                $this->text($content, 260, $rowY, 'PHP ' . number_format((float) $tier->unit_price, 2), 9, [0.05, 0.08, 0.14]);
                $this->text($content, 420, $rowY, 'PHP ' . number_format((float) $tier->total_price, 2), 9, [0.02, 0.16, 0.41], true);
                $rowY -= 22;
            }
        }

        $this->text($content, 48, 78, 'Prepared from client-submitted specifications. Please review the attached terms and conditions.', 7.5, [0.35, 0.37, 0.42]);
        $this->line($content, 48, 64, 564, 64, [0.82, 0.84, 0.88]);
        $this->text($content, 48, 47, 'DSAM Plastic Packaging Manufacturing  |  Formal quotation  |  Confidential', 7.5, [0.25, 0.28, 0.34]);

        $pages = [implode("\n", $content)];
        if ($quote->items->count() > 1) {
            $pages[] = $this->itemsPage($quote);
            $pages[] = $this->pricesPage($quote);
        }
        $pages[] = $this->termsPage($quote);

        return $this->document($pages, $logo);
    }

    private function itemsPage(QuoteRequest $quote): string
    {
        $content = [];
        $content[] = 'q 0.02 0.16 0.41 rg 0 720 612 72 re f Q';
        $this->logo($content);
        $this->text($content, 360, 755, 'SPECIFICATION ITEMS', 10, [1, 1, 1], true);
        $this->text($content, 360, 739, $quote->reference, 10, [0.93, 0.79, 0.42], true);

        $this->text($content, 48, 680, 'REQUESTED SPECIFICATION ITEMS', 14, [0.02, 0.16, 0.41], true);
        $this->line($content, 235, 678, 564, 678, [0.82, 0.84, 0.88]);
        $this->box($content, 48, 628, 516, 24, [0.94, 0.96, 0.98]);
        $this->text($content, 60, 642, 'ITEM / PRODUCT', 7.5, [0.25, 0.28, 0.34], true);
        $this->text($content, 300, 642, 'MATERIAL', 7.5, [0.25, 0.28, 0.34], true);
        $this->text($content, 410, 642, 'QUANTITY', 7.5, [0.25, 0.28, 0.34], true);
        $this->text($content, 490, 642, 'PRINT', 7.5, [0.25, 0.28, 0.34], true);

        $y = 612;
        foreach ($quote->items as $item) {
            $this->line($content, 48, $y + 9, 564, $y + 9, [0.88, 0.89, 0.92]);
            $rowY = $y;
            $this->text($content, 60, $rowY, 'Item ' . $item->item_number, 8, [0.02, 0.16, 0.41], true);
            foreach (array_slice($this->wrap($item->product_category, 34), 0, 2) as $lineIndex => $line) {
                $this->text($content, 60, $rowY - 13 - ($lineIndex * 10), $line, 8, [0.05, 0.08, 0.14]);
            }
            $this->text($content, 300, $rowY, $item->material_type ?: 'Not specified', 8, [0.05, 0.08, 0.14]);
            $this->text($content, 410, $rowY, $item->target_quantity ?: 'Not specified', 8, [0.05, 0.08, 0.14]);
            $this->text($content, 490, $rowY, $item->print_type ?: 'Not specified', 7, [0.05, 0.08, 0.14]);
            $this->text($content, 60, $rowY - 31, 'Size: ' . ($item->dimensions_size ?: 'Not specified') . '  |  Thickness: ' . ($item->thickness_gauge ?: 'Not specified'), 7.5, [0.25, 0.28, 0.34]);
            $y -= 50;
        }

        $this->text($content, 48, 52, 'Client-submitted specifications  |  Reference: ' . $quote->reference, 7.5, [0.25, 0.28, 0.34]);

        return implode("\n", $content);
    }

    private function termsPage(QuoteRequest $quote): string
    {
        $content = [];
        $content[] = 'q 0.02 0.16 0.41 rg 0 720 612 72 re f Q';
        $this->logo($content);
        $this->text($content, 390, 755, 'TERMS & CONDITIONS', 10, [1, 1, 1], true);
        $this->text($content, 390, 739, $quote->reference, 10, [0.93, 0.79, 0.42], true);

        $this->text($content, 48, 680, 'TERMS & CONDITIONS', 14, [0.02, 0.16, 0.41], true);
        $this->line($content, 185, 678, 564, 678, [0.82, 0.84, 0.88]);
        $y = 646;
        $sections = [
            ['Lead Time', '7 - 15 days (Plain); 3 - 4 weeks (Printed).'],
            ['Validity of Offer', 'Prices quoted are valid for seven (7) days from date of offer. Thereafter, all prices shall be subject to confirmation.'],
            ['Payment Terms', 'Fifty (50%) percent down payment upon receipt of PO, Fifty (50%) percent upon delivery of the items.'],
            ['Check Payee', 'All checks must be made payable to "DSAM PLASTIC PACKAGING MANUFACTURING".'],
            ['Quantity Variance', 'Quantities within 10% plus or minus of those stipulated shall be considered normal overrun or underrun and must be accepted.'],
            ['Actual Samples', 'Additional charges apply if you request an actual sample.'],
            ['Tolerance', 'Tolerance of plus or minus 1 to 3% on actual size and thickness is considered normal tolerance and should be accepted by the client.'],
            ['Color Disclaimer', 'Slight discrepancies in printed colors may occur due to material and printing process limitations. Variations within commercial production tolerances are acceptable.'],
            ['Delivery and VAT', 'FREE DELIVERY WITHIN METRO MANILA AREA upon purchase of minimum quantity orders. Freight is not included outside Metro Manila. All prices are VAT exclusive.'],
        ];
        foreach ($sections as [$title, $body]) {
            $this->text($content, 48, $y, $title, 9, [0.02, 0.16, 0.41], true);
            $y -= 16;
            foreach ($this->wrap($body, 92) as $line) {
                $this->text($content, 48, $y, $line, 8.5, [0.18, 0.2, 0.25]);
                $y -= 13;
            }
            $y -= 11;
        }

        $closing = [
            'We hope that you find our proposal in order.',
            'DSAM Plastic Packaging Manufacturing would welcome an audience with you to further discuss the details of our proposal and solution for your organization.',
            'Should you agree with this proposal and its terms and conditions, please conform to the space provided below.',
        ];
        foreach ($closing as $paragraph) {
            foreach ($this->wrap($paragraph, 92) as $line) {
                $this->text($content, 48, $y, $line, 8.5, [0.18, 0.2, 0.25]);
                $y -= 13;
            }
            $y -= 8;
        }

        $this->text($content, 48, $y, 'Very Truly Yours,', 8.5, [0.18, 0.2, 0.25]);
        $this->text($content, 48, $y - 18, 'DSAM PLASTIC PACKAGING MANUFACTURING', 9, [0.02, 0.16, 0.41], true);
        $this->line($content, 48, $y - 76, 240, $y - 76, [0.45, 0.47, 0.52]);
        $this->line($content, 350, $y - 76, 564, $y - 76, [0.45, 0.47, 0.52]);
        $this->text($content, 48, $y - 91, 'Prepared by: Shiela Acabal', 8, [0.18, 0.2, 0.25]);
        $this->text($content, 350, $y - 91, 'Approved by: Sonny C. Mata', 8, [0.18, 0.2, 0.25]);
        $this->text($content, 48, $y - 105, 'Office Staff', 8, [0.35, 0.37, 0.42]);
        $this->text($content, 350, $y - 105, 'General Manager', 8, [0.35, 0.37, 0.42]);

        return implode("\n", $content);
    }

    private function pricesPage(QuoteRequest $quote): string
    {
        $content = [];
        $content[] = 'q 0.02 0.16 0.41 rg 0 720 612 72 re f Q';
        $this->text($content, 48, 758, 'DSAM', 25, [1, 1, 1], true);
        $this->text($content, 48, 740, 'PLASTIC PACKAGING MFG.', 8, [0.93, 0.79, 0.42], true);
        $this->text($content, 360, 755, 'QUOTATION PRICES', 10, [1, 1, 1], true);
        $this->text($content, 360, 739, $quote->reference, 10, [0.93, 0.79, 0.42], true);
        $this->text($content, 48, 680, 'QUOTATION PRICES BY SPECIFICATION', 14, [0.02, 0.16, 0.41], true);
        $this->line($content, 270, 678, 564, 678, [0.82, 0.84, 0.88]);

        $y = 644;
        foreach ($quote->items as $item) {
            $this->text($content, 48, $y, 'ITEM ' . $item->item_number . '  ' . $item->product_category, 9, [0.02, 0.16, 0.41], true);
            $this->text($content, 48, $y - 14, ($item->material_type ?: 'Not specified') . '  |  ' . ($item->dimensions_size ?: 'Size not specified') . '  |  ' . ($item->print_type ?: 'Print not specified'), 8, [0.25, 0.28, 0.34]);
            $this->box($content, 48, $y - 76, 516, 38, [0.94, 0.96, 0.98]);
            $this->text($content, 60, $y - 52, 'QUANTITY', 7.5, [0.25, 0.28, 0.34], true);
            $this->text($content, 230, $y - 52, 'PRICE / PIECE', 7.5, [0.25, 0.28, 0.34], true);
            $this->text($content, 410, $y - 52, 'TOTAL PRICE', 7.5, [0.25, 0.28, 0.34], true);
            $rowY = $y - 68;
            foreach ($item->pricingTiers as $tier) {
                $this->text($content, 60, $rowY, number_format((int) $tier->quantity), 8.5, [0.05, 0.08, 0.14]);
                $this->text($content, 230, $rowY, 'PHP ' . number_format((float) $tier->unit_price, 2), 8.5, [0.05, 0.08, 0.14]);
                $this->text($content, 410, $rowY, 'PHP ' . number_format((float) $tier->total_price, 2), 8.5, [0.02, 0.16, 0.41], true);
                $rowY -= 16;
            }
            $y -= 132;
        }

        $this->text($content, 48, 52, 'Client-facing prices only  |  Reference: ' . $quote->reference, 7.5, [0.25, 0.28, 0.34]);
        return implode("\n", $content);
    }

    private function field(array &$content, string $label, string $value, float $x, float $y): float
    {
        $this->text($content, $x, $y, $label, 7.5, [0.35, 0.37, 0.42], true);
        $this->text($content, $x, $y - 14, $this->clean($value), 9.5, [0.05, 0.08, 0.14]);
        return $y - 30;
    }

    private function section(array &$content, string $title, float $y): void
    {
        $this->text($content, 48, $y, $title, 9, [0.02, 0.16, 0.41], true);
        $this->line($content, 185, $y - 2, 564, $y - 2, [0.82, 0.84, 0.88]);
    }

    private function box(array &$content, float $x, float $y, float $width, float $height, array $color): void
    {
        $content[] = sprintf('q %.3f %.3f %.3f rg %.2f %.2f %.2f %.2f re f Q', $color[0], $color[1], $color[2], $x, $y, $width, $height);
    }

    private function line(array &$content, float $x1, float $y1, float $x2, float $y2, array $color): void
    {
        $content[] = sprintf('q %.3f %.3f %.3f RG 0.7 w %.2f %.2f m %.2f %.2f l S Q', $color[0], $color[1], $color[2], $x1, $y1, $x2, $y2);
    }

    private function text(array &$content, float $x, float $y, string $text, float $size, array $color, bool $bold = false): void
    {
        $font = $bold ? '/F2' : '/F1';
        $content[] = sprintf('BT %s %.1f Tf %.3f %.3f %.3f rg 1 0 0 1 %.2f %.2f Tm (%s) Tj ET', $font, $size, $color[0], $color[1], $color[2], $x, $y, $this->escape($this->clean($text)));
    }

    private function logo(array &$content): void
    {
        $content[] = 'q 132 0 0 47 48 730 cm /Im1 Do Q';
    }

    private function loadLogo(): array
    {
        $path = public_path('images/dsam-official-logo.png');
        $png = file_get_contents($path);
        if ($png === false || substr($png, 0, 8) !== "\x89PNG\r\n\x1a\n") {
            throw new \RuntimeException('Official DSAM logo could not be read.');
        }

        $offset = 8;
        $idat = '';
        $width = $height = $bitDepth = $colorType = null;
        while ($offset < strlen($png)) {
            $length = unpack('N', substr($png, $offset, 4))[1];
            $type = substr($png, $offset + 4, 4);
            $data = substr($png, $offset + 8, $length);
            $offset += 12 + $length;
            if ($type === 'IHDR') {
                $header = unpack('Nwidth/Nheight/CbitDepth/CcolorType', $data);
                $width = $header['width'];
                $height = $header['height'];
                $bitDepth = $header['bitDepth'];
                $colorType = $header['colorType'];
            } elseif ($type === 'IDAT') {
                $idat .= $data;
            } elseif ($type === 'IEND') {
                break;
            }
        }

        if ($width === null || $height === null || $bitDepth !== 8 || $colorType !== 6) {
            throw new \RuntimeException('Official DSAM logo must be an 8-bit RGBA PNG.');
        }

        $decoded = gzuncompress($idat);
        if ($decoded === false) {
            throw new \RuntimeException('Official DSAM logo image data could not be decompressed.');
        }

        $stride = $width * 4;
        $previous = array_fill(0, $stride, 0);
        $rgb = '';
        $alpha = '';
        $position = 0;
        for ($rowIndex = 0; $rowIndex < $height; $rowIndex++) {
            $filter = ord($decoded[$position++]);
            $row = array_values(unpack('C*', substr($decoded, $position, $stride)));
            $position += $stride;
            for ($i = 0; $i < $stride; $i++) {
                $left = $i >= 4 ? $row[$i - 4] : 0;
                $up = $previous[$i];
                $upperLeft = $i >= 4 ? $previous[$i - 4] : 0;
                $value = $row[$i];
                if ($filter === 1) {
                    $value += $left;
                } elseif ($filter === 2) {
                    $value += $up;
                } elseif ($filter === 3) {
                    $value += intdiv($left + $up, 2);
                } elseif ($filter === 4) {
                    $predictor = $left + $up - $upperLeft;
                    $pa = abs($predictor - $left);
                    $pb = abs($predictor - $up);
                    $pc = abs($predictor - $upperLeft);
                    $value += $pa <= $pb && $pa <= $pc ? $left : ($pb <= $pc ? $up : $upperLeft);
                }
                $row[$i] = $value & 255;
            }
            for ($i = 0; $i < $stride; $i += 4) {
                $rgb .= chr($row[$i]) . chr($row[$i + 1]) . chr($row[$i + 2]);
                $alpha .= chr($row[$i + 3]);
            }
            $previous = $row;
        }

        return ['width' => $width, 'height' => $height, 'rgb' => gzcompress($rgb), 'alpha' => gzcompress($alpha)];
    }

    private function wrap(string $text, int $limit): array
    {
        return explode("\n", wordwrap($this->clean($text), $limit, "\n", true));
    }

    private function clean(string $text): string
    {
        return preg_replace('/[^\x20-\x7E]/', ' ', $text) ?: '';
    }

    private function escape(string $text): string
    {
        return str_replace(['\\', '(', ')'], ['\\\\', '\\(', '\\)'], $text);
    }

    private function document(array $streams, array $logo): string
    {
        $pageObjectIds = [];
        $contentObjectIds = [];
        $logoMaskObjectId = 5;
        $logoObjectId = 6;
        $nextObjectId = 7;
        foreach ($streams as $stream) {
            $pageObjectIds[] = $nextObjectId++;
            $contentObjectIds[] = $nextObjectId++;
        }
        $kids = implode(' ', array_map(fn (int $id) => $id . ' 0 R', $pageObjectIds));
        $objects = [
            '<< /Type /Catalog /Pages 2 0 R >>',
            '<< /Type /Pages /Kids [' . $kids . '] /Count ' . count($streams) . ' >>',
            '<< /Type /Font /Subtype /Type1 /BaseFont /Helvetica >>',
            '<< /Type /Font /Subtype /Type1 /BaseFont /Helvetica-Bold >>',
        ];
        $objects[$logoMaskObjectId - 1] = '<< /Type /XObject /Subtype /Image /Width ' . $logo['width'] . ' /Height ' . $logo['height'] . ' /ColorSpace /DeviceGray /BitsPerComponent 8 /Filter /FlateDecode /Length ' . strlen($logo['alpha']) . ' >>' . "\nstream\n" . $logo['alpha'] . "\nendstream";
        $objects[$logoObjectId - 1] = '<< /Type /XObject /Subtype /Image /Width ' . $logo['width'] . ' /Height ' . $logo['height'] . ' /ColorSpace /DeviceRGB /BitsPerComponent 8 /SMask ' . $logoMaskObjectId . ' 0 R /Filter /FlateDecode /Length ' . strlen($logo['rgb']) . ' >>' . "\nstream\n" . $logo['rgb'] . "\nendstream";
        foreach ($streams as $index => $stream) {
            $objects[$pageObjectIds[$index] - 1] = '<< /Type /Page /Parent 2 0 R /MediaBox [0 0 612 792] /Resources << /Font << /F1 3 0 R /F2 4 0 R >> /XObject << /Im1 ' . $logoObjectId . ' 0 R >> >> /Contents ' . $contentObjectIds[$index] . ' 0 R >>';
            $objects[$contentObjectIds[$index] - 1] = '<< /Length ' . strlen($stream) . " >>\nstream\n" . $stream . "\nendstream";
        }
        $pdf = "%PDF-1.4\n%DSAM\n";
        $offsets = [0];
        foreach ($objects as $index => $object) {
            $offsets[] = strlen($pdf);
            $pdf .= ($index + 1) . " 0 obj\n" . $object . "\nendobj\n";
        }
        $xref = strlen($pdf);
        $pdf .= "xref\n0 " . (count($objects) + 1) . "\n0000000000 65535 f \n";
        for ($i = 1; $i <= count($objects); $i++) {
            $pdf .= sprintf('%010d 00000 n %s', $offsets[$i], "\n");
        }
        $pdf .= "trailer\n<< /Size " . (count($objects) + 1) . " /Root 1 0 R >>\nstartxref\n" . $xref . "\n%%EOF";

        return $pdf;
    }
}

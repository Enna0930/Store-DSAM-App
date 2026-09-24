@php
    $pricing = $item?->pricing ?? $quote->pricing;
    $pricingTiers = $item?->pricingTiers ?? $quote->pricingTiers->whereNull('quote_request_item_id')->values();
    $defaultQuantity = (int) preg_replace('/[^0-9]/', '', (string) ($item?->target_quantity ?? $quote->target_quantity));
@endphp
<form method="POST" action="{{ route('quote-requests.pricing.save', $quote) }}" class="mt-3 space-y-3">
    @csrf
    @if ($item)
        <input type="hidden" name="item_id" value="{{ $item->id }}">
    @endif
    <div class="grid gap-3 sm:grid-cols-3">
        @foreach ([1 => 'Tier 1 quantity', 2 => 'Tier 2 quantity', 3 => 'Tier 3 quantity'] as $tier => $label)
            <label class="text-xs font-semibold text-slate-600">{{ $label }}
                <input name="quantity_{{ $tier }}" type="number" step="1" min="1" value="{{ old('quantity_' . $tier, $pricingTiers->get($tier - 1)?->quantity ?? (($tier === 1 ? $defaultQuantity : 0) ?: ($tier * 10000))) }}" class="mt-1 w-full rounded border border-slate-300 px-3 py-2 text-sm" required>
            </label>
        @endforeach
    </div>
    <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ([
            'material_cost' => 'Material',
            'printing_cost' => 'Printing',
            'tooling_cost' => 'Tooling / cylinder',
            'labor_cost' => 'Labor',
            'delivery_cost' => 'Delivery',
            'overhead_cost' => 'Overhead',
            'electricity_cost' => 'Electricity',
            'waste_cost' => 'Waste / reject allowance',
        ] as $field => $label)
            <label class="text-xs font-semibold text-slate-600">{{ $label }} (PHP)
                <input name="{{ $field }}" type="number" step="0.01" min="0" value="{{ old($field, $pricing?->$field ?? 0) }}" class="mt-1 w-full rounded border border-slate-300 px-3 py-2 text-sm" required>
            </label>
        @endforeach
        <label class="text-xs font-semibold text-slate-600">Markup (%)
            <input name="markup_percent" type="number" step="0.01" min="0" max="100" value="{{ old('markup_percent', $pricing?->markup_percent ?? 20) }}" class="mt-1 w-full rounded border border-slate-300 px-3 py-2 text-sm" required>
        </label>
    </div>
    <div class="grid gap-3 sm:grid-cols-3">
        @foreach ([1 => 'Tier 1 discount (%)', 2 => 'Tier 2 discount (%)', 3 => 'Tier 3 discount (%)'] as $tier => $label)
            <label class="text-xs font-semibold text-slate-600">{{ $label }}
                <input name="discount_{{ $tier }}" type="number" step="0.01" min="0" max="100" value="{{ old('discount_' . $tier, $pricingTiers->get($tier - 1)?->discount_percent ?? (($tier - 1) * 5)) }}" class="mt-1 w-full rounded border border-slate-300 px-3 py-2 text-sm" required>
            </label>
        @endforeach
    </div>
    <label class="block text-xs font-semibold text-slate-600">Estimator notes
        <textarea name="notes" rows="2" class="mt-1 w-full rounded border border-slate-300 px-3 py-2 text-sm" placeholder="Production assumptions, exclusions, or approval notes">{{ old('notes', $pricing?->notes) }}</textarea>
    </label>
    <div class="flex flex-col gap-3 rounded bg-[#051329] p-4 text-white sm:flex-row sm:items-center sm:justify-between">
        <div>
            <p class="text-xs uppercase tracking-wider text-slate-300">Saved estimate</p>
            <p class="mt-1 text-xl font-bold text-amber-300">{{ $pricingTiers->isNotEmpty() ? 'PHP ' . number_format((float) $pricingTiers->first()->total_price, 2) : 'Not calculated' }}</p>
            @if ($pricing)
                <p class="text-xs text-slate-300">Tier 1 starting price · Three quantity options below</p>
            @endif
        </div>
        <button type="submit" class="rounded bg-[#0a3d91] px-4 py-2 text-sm font-bold text-white hover:bg-blue-700">Save pricing{{ $item ? ' for Item ' . $item->item_number : '' }}</button>
    </div>
    @if ($pricingTiers->isNotEmpty())
        <div class="overflow-x-auto rounded border border-slate-200">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-100 uppercase tracking-wider text-slate-600"><tr><th class="px-3 py-2">Tier</th><th class="px-3 py-2">Quantity</th><th class="px-3 py-2">Discount</th><th class="px-3 py-2">Unit price</th><th class="px-3 py-2">Final price</th></tr></thead>
                <tbody>
                    @foreach ($pricingTiers as $tier)
                        <tr class="border-t border-slate-200"><td class="px-3 py-2 font-semibold">Tier {{ $tier->tier_number }}</td><td class="px-3 py-2">{{ number_format($tier->quantity) }}</td><td class="px-3 py-2">{{ number_format((float) $tier->discount_percent, 2) }}%</td><td class="px-3 py-2">PHP {{ number_format((float) $tier->unit_price, 2) }}</td><td class="px-3 py-2 font-bold text-[#002868]">PHP {{ number_format((float) $tier->total_price, 2) }}</td></tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</form>

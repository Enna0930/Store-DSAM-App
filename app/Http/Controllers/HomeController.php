<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function products()
    {
        return $this->productCollection();
    }

    public function productCollection()
    {
        return view('product-collection');
    }

    public function manufacturing()
    {
        return view('manufacturing');
    }

    public function newestInDsam()
    {
        return view('newest-in-dsam');
    }

    public function materials()
    {
        return view('materials');
    }

    public function requestAQuote()
    {
        return view('request-a-quote');
    }

    public function contact()
    {
        return view('contact');
    }

    public function industries()
    {
        return view('industries');
    }

    public function product(string $slug)
    {
        $products = [
            'milk-tea-carriers' => 'Milk Tea Carriers / Take Out Bags',
            'trashbag' => 'Trashbag (Rolled / Flat)',
            'icebag' => 'Icebag (Bluish / Trans)',
            'sando-bags' => 'Sando Bags (HDPE / LDPE)',
            'take-out-bags' => 'Take Out Bags',
            'pe-packaging-rolls' => 'PE Packaging & Rolls',
            'printed-film' => 'Printed Film (Banners)',
            'seedling-grow-bags' => 'Seedling Grow Bags',
            'courier-pouches' => 'Courier Pouches',
            'ham-bags' => 'Ham Bags',
        ];

$images = [
            'milk-tea-carriers' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAMJQdRNMPcloskxL7k85xA8tbl3Qr_WzHTnWABZLcbZ7R1y5TP4V7MIZHpSFpoW2nxhTC56wcyX0x9PuroNioHeuw4s02mSMy4jrljX1tDTaxXShdaZe9cDQGCWK8b7toBH9juuVF_r7AVX4EzBRTfOw1GzcoB2IezcBqnXpW_WgyOMWcDjxp_Exmo4O55MhoZAjr4GDHV5OJoXhLWRmx2rONymlVPkCGx56crk6fnYCr-z_3ClCFXdqGqfBMydz18tuM',
            'trashbag' => 'https://lh3.googleusercontent.com/aida/AEtjO1WoI6oXoi4d3mlnLQzJEcu3OFkL6sHcJbjen7lT1_HErOleDlpEGZfN9qpZsWuMzLD0z5mmrIoejF8kafG8Z57EIKLmBNV0Ok73CDyeIb2I8nMYrL7ICwqdY-qXRdukxKhVkcHX3VfjZaNyXoUnF--XpZsFCt1UBne1gcm2WxrTNv2tPyH6pRJ4PYiuYw2SaMWj-I9j_vQ5MSHApzSlkKMIJHlJc6Kogbo1uMpmYc4z_SaFWbtYbVTiUzuW',
            'icebag' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAE-y4uId6u4OJcYJik2mlUR_Ea4FopN-swzUztJkAP-JlU01Z0ZD0BXTmkxWyKVJlmMH1q01n8gWfe7RXhZcURdqEkAMrMb8emAEZPxvrX70_oz5qS0_rxdpGBXIa6-9NNQV43CM0gcbzZ8NFtzBXAKKKRFo7hkbjQ2kP_VRjCVxmRMkeBL185cnREI1U4NlJgwkP8uzVpaJcVNBSnzzVmNAXOkBmQJoRdXssRKN9IXvi5dVFmC8Ptww',
            'take-out-bags' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCLuFZewGrcvSX5GdsS08nmsHmkM5fX0jERGv661ppECJ50eNPSs1gS5uhea-WSdcAr6l-syaGJnmbPpe3StJzjccbmdp84mGdg3_Yha9C6JuVPRKnUlVpGH5KQPIjAIT9TMDBjQ3emFONpHVEShtlVmxVi-RZHrNfjZA4ulcxJcf1d8drYX-SApW377rvfusBTyHU2hRiKS4FhPs2R-trVNCzFXOqQWagRPEn1HNBqWvfORX4mutae2w',
            'pe-packaging-rolls' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBgCDXuMe-NH1VrXy6XWmAWndRcotpmPaoaNeLWaCZRXxKnOU2KGEpoCNaiF3846HOasDmZOg9UCpBqow9gSgbgbjaY65nf5dJQWKKWmUUwR-7VC2SWiccYYDs8vPHXV77Q49ns7o04j0TtV0lXI25iL51EQmRxQok4nRxCYZ61dP5YiyH1RrfaVFyE1qccN8FOBhKKFEYWTZeuvae5Ml2ug_r2TZL4Twgpag0RofGJH-q5U5B11oGV0doHPOYsPGkLgGQ',
            'printed-film' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDV0lK3YRf7V6OsIfvzS_Ave6WLwAn34aTBgA-1WvN5sfd3BVPjo4i7aYS-Y9GscjVtnQs3tI_tceydsj9LBcgX-mMpkekBvkkJkBivzI_-k_lx8WAkTuPzHxEnoCNcHy5n6BLZ8AC8T_ggBlmsJPCxduXl751SUQllaMiDylvfF_cEkP1uZN9xEe_LwWknNMe2EXaIBFf_WcyAMzQg3FaeYRRfsvduF3Zn72yo3ZCVXj0x4lKJdzI6lQ',
            'seedling-grow-bags' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCwYgRRZwG9b17WDdXVeHurog_QWv8XGNBhs6WNYsm6kSBGbP84thN31SDZW6Zfz_t3Sw7gptrh6HREzrcTHlxfPnjmFNqlSBeApAPR-O0PeVGt6n4Tajm06u9FvJy5kiEBsPOLCiWumBW0OEwHEVCcfCw33I70fhhxUiB_9cn2Vgs7EeJtojkwbW-CVoM0TSMPVSUOViRLuP7Q08xBbMmEazAmw6Ke-uM2n_9z4bqt9loEjdIwOmYPOA',
            'courier-pouches' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuD9vWOMmEHKjv9J0uXpgxyvSjTHAvvjRBdpkJ6_DnfJDDes9iaRzIqQwmStNv6KoScN2q376NeXO0_RF3Th6z1wteppXW9_BzcWo6T4kq8DoIIZiz9n6d6Ps2T2rW7CTGm5fSVfpPhdGg-Lr3YIbigN0jLsCr-yQB3yAxfM4xclvETpYNNS7cDts9ysvRyFREpTFmkQ6XRwf4BX15kpYYmV8N3kSY2Lds_ukjQcX7YchyucTv2qLZ9yqw',
            'ham-bags' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDg9VgylMNXJuZ_W5bJShdve5YPJv5K6f_IvmChaQl-1M29oQ8jUjOczXN2geizpgcKk4V8YpFMRLvADmcWdUJbqW5i319AEX9sRbIrg_W14wOFfYtym3mfiFmA6Vhp46VvU_MVIbFP8Q5Lku6srPe55BdaxoQDBQr20l9X_sZF7Wf6SlbpPO0m3iRMHMP2wUOaiZSGX9c1cnN6tantf7D9Lh7ejdNPzJTEcL1BPrcEGrs0IQNPxa14Sw',
        ];

        abort_unless(isset($products[$slug]), 404);

        return view('product', [
            'product' => ['slug' => $slug, 'name' => $products[$slug], 'image' => $images[$slug]],
        ]);
    }

    public function generate(Request $request)
    {
        $request->validate([
            'business_type' => ['required', 'string', 'max:255'],
        ]);

        return 'Generated successfully';
    }
}







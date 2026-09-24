<!DOCTYPE html><html class="scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1.0" name="viewport"><meta name="csrf-token" content="{{ csrf_token() }}"><link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"><link href="https://fonts.googleapis.com" rel="preconnect"><link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"><link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=JetBrains+Mono:wght@400;500&amp;family=Plus+Jakarta+Sans:wght@600;700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"><style>@layer base { html, body { margin: 0; padding: 0; } body { overscroll-behavior: none; } main > :first-child { margin-top: 0 !important; } main > :last-child { margin-bottom: 0 !important; } } ::-webkit-scrollbar { display: none; }</style><script src="https://cdn.tailwindcss.com"></script><script id="tailwind-config">tailwind.config = { darkMode: "class", theme: { extend: { "colors": { "background": "#f7f9fc", "on-surface-variant": "#434652", "surface-subtle": "#E9ECEF", "border-technical": "#D9E2EC", "primary-container": "#0a3d91", "surface-container-high": "#e6e8eb", "on-tertiary-fixed-variant": "#5d4201", "on-secondary-container": "#4d5d7e", "tertiary-fixed-dim": "#e9c176", "on-primary-fixed-variant": "#144296", "surface-bright": "#f7f9fc", "inverse-surface": "#2d3133", "surface-container-lowest": "#ffffff", "on-secondary-fixed-variant": "#364766", "surface-container-low": "#f2f4f7", "on-error-container": "#93000a", "on-surface": "#191c1e", "primary-fixed-dim": "#b1c5ff", "primary": "#002868", "on-tertiary-container": "#cfa961", "outline": "#747783", "on-primary-fixed": "#001947", "surface-container": "#eceef1", "secondary-container": "#c7d7fd", "inverse-primary": "#b1c5ff", "status-success": "#1B873F", "surface": "#f7f9fc", "on-primary-container": "#8dadff", "on-primary": "#ffffff", "tertiary-fixed": "#ffdea5", "surface-variant": "#e0e3e6", "on-tertiary": "#ffffff", "tertiary-container": "#573e00", "surface-dim": "#d8dadd", "on-secondary-fixed": "#081b38", "on-tertiary-fixed": "#261900", "error-container": "#ffdad6", "secondary-fixed-dim": "#b6c7ec", "surface-container-highest": "#e0e3e6", "secondary": "#4e5e7f", "on-background": "#191c1e", "secondary-fixed": "#d7e2ff", "surface-dark": "#051329", "primary-fixed": "dae2ff", "outline-variant": "#c4c6d3", "on-secondary": "#ffffff", "inverse-on-surface": "#eff1f4", "error": "#ba1a1a", "surface-tint": "#345baf", "on-error": "#ffffff", "tertiary": "#3b2900" }, "borderRadius": { "DEFAULT": "0.125rem", "lg": "0.25rem", "xl": "0.5rem", "full": "0.75rem" }, "spacing": { "space-xs": "0.25rem", "space-md": "1rem", "space-xl": "2.5rem", "margin": "2rem", "space-lg": "1.5rem", "space-sm": "0.5rem", "gutter": "1.5rem" }, "fontFamily": { "headline-sm": [ "Plus Jakarta Sans" ], "display-lg-mobile": [ "Plus Jakarta Sans" ], "headline-lg": [ "Plus Jakarta Sans" ], "body-lg": [ "Inter" ], "display-lg": [ "Plus Jakarta Sans" ], "body-sm": [ "Inter" ], "tech-data": [ "JetBrains Mono" ], "headline-md": [ "Plus Jakarta Sans" ], "body-md": [ "Inter" ], "headline-xl": [ "Plus Jakarta Sans" ], "headline-xl-mobile": [ "Plus Jakarta Sans" ], "label-caps": [ "Plus Jakarta Sans" ] }, "fontSize": { "headline-sm": [ "20px", { "lineHeight": "28px", "fontWeight": "600" } ], "display-lg-mobile": [ "36px", { "lineHeight": "44px", "letterSpacing": "-0.01em", "fontWeight": "700" } ], "headline-lg": [ "32px", { "lineHeight": "40px", "letterSpacing": "-0.01em", "fontWeight": "600" } ], "body-lg": [ "18px", { "lineHeight": "28px", "fontWeight": "400" } ], "display-lg": [ "56px", { "lineHeight": "64px", "letterSpacing": "-0.02em", "fontWeight": "700" } ], "body-sm": [ "13px", { "lineHeight": "20px", "fontWeight": "400" } ], "tech-data": [ "12px", { "lineHeight": "18px", "letterSpacing": "0.02em", "fontWeight": "500" } ], "headline-md": [ "24px", { "lineHeight": "32px", "fontWeight": "600" } ], "body-md": [ "15px", { "lineHeight": "24px", "fontWeight": "400" } ], "headline-xl": [ "40px", { "lineHeight": "48px", "letterSpacing": "-0.015em", "fontWeight": "700" } ], "headline-xl-mobile": [ "28px", { "lineHeight": "36px", "fontWeight": "700" } ], "label-caps": [ "11px", { "lineHeight": "16px", "letterSpacing": "0.08em", "fontWeight": "700" } ] } } } };</script><link href="{{ asset('css/app.css') }}" rel="stylesheet"><script src="{{ asset('js/app.js') }}" defer></script></head><body class="bg-surface font-body-md text-body-md text-on-surface">@include('partials.site-header')<main class="w-full bg-surface"><div class="flex flex-col w-full">
<!-- BREADCRUMB & PRODUCT SELECTOR BAR -->
<section class="w-full bg-surface-container-low px-margin py-space-sm">
<div class="max-w-7xl mx-auto flex flex-col md:flex-row md:items-center justify-between gap-space-sm">
<div class="flex items-center flex-wrap gap-space-xs text-body-sm font-body-sm text-on-surface-variant">
<a class="hover:text-primary transition-colors flex items-center gap-1" data-path="home" href="{{ route('product-collection') }}">
<span class="material-symbols-outlined text-[16px]">home</span>Home
        </a>
<span class="text-outline-variant">/</span>
<a class="hover:text-primary transition-colors" data-path="products" href="{{ route('product-collection') }}">Products Catalog</a>
<span class="text-outline-variant">/</span>
<span class="text-primary font-semibold">{{ $product['name'] }}</span>
</div>
<!-- Quick Switcher Dropdown Menu -->
<div class="flex items-center gap-space-xs">
<span class="text-tech-data font-tech-data text-on-surface-variant uppercase tracking-wider hidden sm:inline">Product Catalog:</span>
<div class="relative inline-block text-left" id="productMenuWrapper">
<button class="inline-flex items-center justify-between gap-space-sm bg-surface-container-lowest px-space-md py-1.5 rounded-DEFAULT text-body-sm font-semibold text-primary shadow-sm hover:bg-surface-subtle transition-all" id="productSwitcherBtn" type="button">
<span class="flex items-center gap-1.5">
<span class="w-2 h-2 rounded-full bg-status-success inline-block"></span>
<span class="">{{ $product['name'] }}</span>
</span>
<span class="material-symbols-outlined text-sm transition-transform duration-200" id="switcherChevron">expand_more</span>
</button>
<!-- Dropdown items -->
<div class="hidden absolute right-0 mt-1 w-72 bg-surface-container-lowest rounded-DEFAULT shadow-xl z-40 py-1" id="productDropdown">
<div class="px-3 py-1.5 bg-surface-subtle text-tech-data font-tech-data text-on-surface-variant uppercase tracking-wider font-bold">DSAM 10 Core Lines</div>
<a class="flex items-center justify-between px-3 py-2 text-body-sm font-semibold text-primary bg-secondary-fixed/40 transition-colors" href="{{ route('product-collection') }}">
<span class="">Milk Tea Carriers / Take Out Bags</span>
<span class="material-symbols-outlined text-xs text-primary">check</span>
</a>
<a class="block px-3 py-2 text-body-sm text-on-surface hover:bg-surface-container-low transition-colors" href="{{ route('product.show', ['slug' => 'trashbag']) }}">Trashbag (Rolled / Flat Pack)</a>
<a class="block px-3 py-2 text-body-sm text-on-surface hover:bg-surface-container-low transition-colors" href="{{ route('product.show', ['slug' => 'icebag']) }}">Icebag (Bluish &amp; Transparent)</a>
<a class="block px-3 py-2 text-body-sm text-on-surface hover:bg-surface-container-low transition-colors" href="{{ route('product.show', ['slug' => 'sando-bags']) }}">Sando Bags (HDPE / LDPE)</a>
<a class="block px-3 py-2 text-body-sm text-on-surface hover:bg-surface-container-low transition-colors" href="{{ route('product-collection') }}">PE Packaging &amp; Continuous Rolls</a>
<a class="block px-3 py-2 text-body-sm text-on-surface hover:bg-surface-container-low transition-colors" href="{{ route('product-collection') }}">Printed Film (Advertising Banners)</a>
<a class="block px-3 py-2 text-body-sm text-on-surface hover:bg-surface-container-low transition-colors" href="{{ route('product-collection') }}">Agricultural Seedling Grow Bags</a>
<a class="block px-3 py-2 text-body-sm text-on-surface hover:bg-surface-container-low transition-colors" href="{{ route('product-collection') }}">E-Commerce Courier Pouches</a>
<a class="block px-3 py-2 text-body-sm text-on-surface hover:bg-surface-container-low transition-colors" href="{{ route('product-collection') }}">Heavy-Duty Ham Bags</a>
<a class="block px-3 py-2 text-body-sm text-on-surface hover:bg-surface-container-low transition-colors" href="{{ route('product-collection') }}">Custom Print Contract Packaging</a>
</div>
</div>
</div>
</div>
</section>
<!-- FACTORY SPECIFICATION SUB-HEADER BANNER -->
<section class="w-full bg-surface-container-lowest px-margin py-3 shadow-sm">
<div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between gap-3 text-tech-data font-tech-data">
<div class="flex items-center gap-space-sm flex-wrap">
<span class="px-2 py-0.5 rounded-DEFAULT bg-primary-container text-on-primary font-bold uppercase tracking-wider text-[11px]">
          DIRECT FACTORY SPECIFICATION • SKU: DSAM-PRD-01
        </span>
<span class="px-2 py-0.5 rounded-DEFAULT bg-tertiary-fixed text-on-tertiary-fixed font-semibold uppercase tracking-wider text-[11px]">
          100% VIRGIN FOOD-GRADE PE / HDPE / LDPE
        </span>
<span class="text-outline hidden lg:inline">•</span>
<span class="text-on-surface-variant hidden lg:inline">FACILITY ID: LAGUNA-PLANT-EXP03</span>
</div>
<div class="flex items-center gap-space-md text-on-surface-variant">
<span class="flex items-center gap-1 text-[11px] text-status-success font-semibold">
<span class="material-symbols-outlined text-[14px]">verified</span> FDA FOOD CONTACT COMPLIANT
        </span>
<span class="flex items-center gap-1 text-[11px]">
<span class="material-symbols-outlined text-[14px] text-tertiary-container">precision_manufacturing</span> ISO STANDARDS COMPLIANT
        </span>
</div>
</div>
</section>
<!-- MAIN PRODUCT HERO & CONFIGURATOR (TWO-COLUMN ARCHITECTURAL LAYOUT) -->
<section class="w-full px-margin py-space-xl">
<div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-gutter">
<!-- LEFT COLUMN: Product Technical Gallery & Visual Specs (7 cols) -->
<div class="lg:col-span-7 flex flex-col gap-space-md">
<!-- Main Interactive Product Display Card -->
<div class="relative bg-surface-container-lowest rounded-DEFAULT p-space-md shadow-sm overflow-hidden group">
<!-- Live Technical Overlay Badges -->
<div class="absolute top-4 left-4 z-20 flex flex-col gap-1.5">
<span class="inline-flex items-center gap-1 bg-surface-dark/85 backdrop-blur text-surface-bright px-2.5 py-1 rounded-DEFAULT text-tech-data font-tech-data">
<span class="w-1.5 h-1.5 rounded-full bg-tertiary-fixed animate-ping"></span>
              REINFORCED TWIN-CUP COMPARTMENT
            </span>
<span class="inline-flex items-center gap-1 bg-primary/90 text-on-primary px-2 py-0.5 rounded-DEFAULT text-[10px] font-tech-data">
              TENSILE YIELD ≥ 28 MPa
            </span>
</div>
<div class="absolute top-4 right-4 z-20 flex items-center gap-2">
<button class="w-8 h-8 rounded-DEFAULT bg-surface-container-lowest/90 hover:bg-surface-container-lowest text-on-surface shadow flex items-center justify-center transition-transform hover:scale-105" id="zoomBtn" title="Inspect Blueprint">
<span class="material-symbols-outlined text-base">zoom_in</span>
</button>
<span class="bg-surface-container-lowest/90 px-2 py-1 rounded-DEFAULT text-[11px] font-tech-data text-primary font-semibold shadow">
              CALIBRATED DIE-CUT
            </span>
</div>
<!-- Hero Image Container with Blueprint Dimension Guides -->
<div class="relative w-full aspect-[4/3] bg-surface-container-low rounded-DEFAULT overflow-hidden flex items-center justify-center">
<img alt="DSAM {{ $product['name'] }}" class="w-full h-full object-contain transition-transform duration-300 group-hover:scale-105" id="mainProductImage" src="{{ $product['image'] }}">
<!-- Blueprint Coordinate Crosshairs & Dimension Labels -->
<div class="absolute inset-x-8 bottom-3 flex items-center justify-between text-tech-data font-tech-data text-on-surface-variant/90 pointer-events-none">
<div class="flex items-center gap-1 bg-surface-container-lowest/80 px-2 py-0.5 rounded shadow-sm">
<span class="material-symbols-outlined text-[13px] text-primary">straighten</span>
<span class="">Width: 300mm ± 1.0mm</span>
</div>
<div class="flex items-center gap-1 bg-surface-container-lowest/80 px-2 py-0.5 rounded shadow-sm">
<span class="material-symbols-outlined text-[13px] text-primary">height</span>
<span class="">Gusset: 80mm Expander</span>
</div>
<div class="flex items-center gap-1 bg-surface-container-lowest/80 px-2 py-0.5 rounded shadow-sm">
<span class="material-symbols-outlined text-[13px] text-status-success">verified_user</span>
<span class="">Burst Seal Weld Line</span>
</div>
</div>
</div>
</div>
<!-- Thumbnail Gallery Strip with Plant Context -->
<div class="grid grid-cols-4 gap-2"><button class="relative aspect-[4/3] rounded overflow-hidden border-2 border-primary" onclick="document.querySelector('#mainProductImage').src = 'https://lh3.googleusercontent.com/aida/AEtjO1UVA3WjeVpiJtGbjnBTJNSdvveg0twGOd5VXYUVtbQdbdr66eobSH5avV0y5zsktCHzECjJYZqkA84ZXVs719fRteqDjO8XYgeFYcWefTQlQ-Is07H7H4dCd0CYPlVmBQk1NtIRl4WX37G-20rbDAB0Yv8odZXorE6WLgOWjiusdVKfvxE49-i5cxQ6iwXmIwnCZTwF4c8h4-WmQB6iTlsAyg2NzvGJiQAtWp29QLcH56B932qAhs1pynYb'; document.querySelectorAll('.lg\\:col-span-7 &gt; div.grid.grid-cols-4 button').forEach(b =&gt; { b.className = 'relative aspect-[4/3] rounded overflow-hidden border border-border-technical hover:opacity-90'; }); this.className = 'relative aspect-[4/3] rounded overflow-hidden border-2 border-primary';"><img src="https://lh3.googleusercontent.com/aida/AEtjO1UVA3WjeVpiJtGbjnBTJNSdvveg0twGOd5VXYUVtbQdbdr66eobSH5avV0y5zsktCHzECjJYZqkA84ZXVs719fRteqDjO8XYgeFYcWefTQlQ-Is07H7H4dCd0CYPlVmBQk1NtIRl4WX37G-20rbDAB0Yv8odZXorE6WLgOWjiusdVKfvxE49-i5cxQ6iwXmIwnCZTwF4c8h4-WmQB6iTlsAyg2NzvGJiQAtWp29QLcH56B932qAhs1pynYb" alt="Dual Cup Staged View" class="w-full h-full object-cover"><span class="absolute bottom-0 inset-x-0 bg-primary/90 text-white text-[10px] text-center font-mono py-0.5">Dual Cup Staged</span></button><button class="relative aspect-[4/3] rounded overflow-hidden border border-border-technical hover:opacity-90" onclick="document.querySelector('#mainProductImage').src = 'https://lh3.googleusercontent.com/aida/AEtjO1WoI6oXoi4d3mlnLQzJEcu3OFkL6sHcJbjen7lT1_HErOleDlpEGZfN9qpZsWuMzLD0z5mmrIoejF8kafG8Z57EIKLmBNV0Ok73CDyeIb2I8nMYrL7ICwqdY-qXRdukxKhVkcHX3VfjZaNyXoUnF--XpZsFCt1UBne1gcm2WxrTNv2tPyH6pRJ4PYiuYw2SaMWj-I9j_vQ5MSHApzSlkKMIJHlJc6Kogbo1uMpmYc4z_SaFWbtYbVTiUzuW'; document.querySelectorAll('.lg\\:col-span-7 &gt; div.grid.grid-cols-4 button').forEach(b =&gt; { b.className = 'relative aspect-[4/3] rounded overflow-hidden border border-border-technical hover:opacity-90'; }); this.className = 'relative aspect-[4/3] rounded overflow-hidden border-2 border-primary';"><img src="https://lh3.googleusercontent.com/aida/AEtjO1WoI6oXoi4d3mlnLQzJEcu3OFkL6sHcJbjen7lT1_HErOleDlpEGZfN9qpZsWuMzLD0z5mmrIoejF8kafG8Z57EIKLmBNV0Ok73CDyeIb2I8nMYrL7ICwqdY-qXRdukxKhVkcHX3VfjZaNyXoUnF--XpZsFCt1UBne1gcm2WxrTNv2tPyH6pRJ4PYiuYw2SaMWj-I9j_vQ5MSHApzSlkKMIJHlJc6Kogbo1uMpmYc4z_SaFWbtYbVTiUzuW" alt="Die-Cut Carrier Stack" class="w-full h-full object-cover"><span class="absolute bottom-0 inset-x-0 bg-slate-900/80 text-white text-[10px] text-center font-mono py-0.5">Die-Cut Stack</span></button><button class="relative aspect-[4/3] rounded overflow-hidden border border-border-technical hover:opacity-90" onclick="document.querySelector('#mainProductImage').src = 'https://lh3.googleusercontent.com/aida/AEtjO1WoI6oXoi4d3mlnLQzJEcu3OFkL6sHcJbjen7lT1_HErOleDlpEGZfN9qpZsWuMzLD0z5mmrIoejF8kafG8Z57EIKLmBNV0Ok73CDyeIb2I8nMYrL7ICwqdY-qXRdukxKhVkcHX3VfjZaNyXoUnF--XpZsFCt1UBne1gcm2WxrTNv2tPyH6pRJ4PYiuYw2SaMWj-I9j_vQ5MSHApzSlkKMIJHlJc6Kogbo1uMpmYc4z_SaFWbtYbVTiUzuW'; document.querySelectorAll('.lg\\:col-span-7 &gt; div.grid.grid-cols-4 button').forEach(b =&gt; { b.className = 'relative aspect-[4/3] rounded overflow-hidden border border-border-technical hover:opacity-90'; }); this.className = 'relative aspect-[4/3] rounded overflow-hidden border-2 border-primary';"><img src="https://lh3.googleusercontent.com/aida/AEtjO1WoI6oXoi4d3mlnLQzJEcu3OFkL6sHcJbjen7lT1_HErOleDlpEGZfN9qpZsWuMzLD0z5mmrIoejF8kafG8Z57EIKLmBNV0Ok73CDyeIb2I8nMYrL7ICwqdY-qXRdukxKhVkcHX3VfjZaNyXoUnF--XpZsFCt1UBne1gcm2WxrTNv2tPyH6pRJ4PYiuYw2SaMWj-I9j_vQ5MSHApzSlkKMIJHlJc6Kogbo1uMpmYc4z_SaFWbtYbVTiUzuW" alt="Flat-Pack Bundle" class="w-full h-full object-cover"><span class="absolute bottom-0 inset-x-0 bg-slate-900/80 text-white text-[10px] text-center font-mono py-0.5">Flat Bundle</span></button><button class="relative aspect-[4/3] rounded overflow-hidden border border-border-technical hover:opacity-90" onclick="document.querySelector('#mainProductImage').src = 'https://lh3.googleusercontent.com/aida/AEtjO1UVA3WjeVpiJtGbjnBTJNSdvveg0twGOd5VXYUVtbQdbdr66eobSH5avV0y5zsktCHzECjJYZqkA84ZXVs719fRteqDjO8XYgeFYcWefTQlQ-Is07H7H4dCd0CYPlVmBQk1NtIRl4WX37G-20rbDAB0Yv8odZXorE6WLgOWjiusdVKfvxE49-i5cxQ6iwXmIwnCZTwF4c8h4-WmQB6iTlsAyg2NzvGJiQAtWp29QLcH56B932qAhs1pynYb'; document.querySelectorAll('.lg\\:col-span-7 &gt; div.grid.grid-cols-4 button').forEach(b =&gt; { b.className = 'relative aspect-[4/3] rounded overflow-hidden border border-border-technical hover:opacity-90'; }); this.className = 'relative aspect-[4/3] rounded overflow-hidden border-2 border-primary';"><img src="https://lh3.googleusercontent.com/aida/AEtjO1UVA3WjeVpiJtGbjnBTJNSdvveg0twGOd5VXYUVtbQdbdr66eobSH5avV0y5zsktCHzECjJYZqkA84ZXVs719fRteqDjO8XYgeFYcWefTQlQ-Is07H7H4dCd0CYPlVmBQk1NtIRl4WX37G-20rbDAB0Yv8odZXorE6WLgOWjiusdVKfvxE49-i5cxQ6iwXmIwnCZTwF4c8h4-WmQB6iTlsAyg2NzvGJiQAtWp29QLcH56B932qAhs1pynYb" alt="Clear Gusset Detail" class="w-full h-full object-cover"><span class="absolute bottom-0 inset-x-0 bg-slate-900/80 text-white text-[10px] text-center font-mono py-0.5">Gusset Detail</span></button></div>
<!-- Technical Badges & Direct Operational Callouts Strip -->
<div class="grid grid-cols-2 sm:grid-cols-4 gap-2 text-tech-data font-tech-data">
<div class="bg-surface-container-lowest p-2.5 rounded-DEFAULT shadow-sm flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-lg">straighten</span>
<div>
<p class="font-bold text-on-surface leading-tight">±0.5mm</p>
<p class="text-[10px] text-on-surface-variant">Cut Precision</p>
</div>
</div>
<div class="bg-surface-container-lowest p-2.5 rounded-DEFAULT shadow-sm flex items-center gap-2">
<span class="material-symbols-outlined text-primary-container text-lg">palette</span>
<div>
<p class="font-bold text-on-surface leading-tight">6 Colors</p>
<p class="text-[10px] text-on-surface-variant">Rotogravure Press</p>
</div>
</div>
<div class="bg-surface-container-lowest p-2.5 rounded-DEFAULT shadow-sm flex items-center gap-2">
<span class="material-symbols-outlined text-status-success text-lg">water_drop</span>
<div>
<p class="font-bold text-on-surface leading-tight">Zero-Leak</p>
<p class="text-[10px] text-on-surface-variant">Heat Weld Bottom</p>
</div>
</div>
<div class="bg-surface-container-lowest p-2.5 rounded-DEFAULT shadow-sm flex items-center gap-2">
<span class="material-symbols-outlined text-tertiary-container text-lg">local_shipping</span>
<div>
<p class="font-bold text-on-surface leading-tight">Laguna Plant</p>
<p class="text-[10px] text-on-surface-variant">Direct Dispatch</p>
</div>
</div>
</div>
<!-- Material Formulation & Resin Property Callout -->
<div class="bg-surface-container-high/60 rounded-DEFAULT p-space-md shadow-sm">
<div class="flex items-center justify-between mb-2">
<span class="font-label-caps text-label-caps uppercase tracking-wider text-primary font-bold">Polymer Integrity &amp; Extrusion Metrics</span>
<span class="text-tech-data font-tech-data text-[11px] text-status-success font-semibold">100% VIRGIN PELLET ONLY</span>
</div>
<div class="grid grid-cols-3 gap-3 text-body-sm font-body-sm">
<div class="bg-surface-container-lowest p-2 rounded-DEFAULT shadow-sm">
<span class="text-tech-data font-tech-data text-on-surface-variant block text-[11px]">Melt Flow Index:</span>
<span class="font-headline-sm text-[16px] text-primary font-bold">0.85 – 1.2</span>
<span class="text-[11px] text-on-surface-variant">g/10min (190°C)</span>
</div>
<div class="bg-surface-container-lowest p-2 rounded-DEFAULT shadow-sm">
<span class="text-tech-data font-tech-data text-on-surface-variant block text-[11px]">Tensile at Break:</span>
<span class="font-headline-sm text-[16px] text-primary font-bold">≥ 32.5</span>
<span class="text-[11px] text-on-surface-variant">MPa (MD Axis)</span>
</div>
<div class="bg-surface-container-lowest p-2 rounded-DEFAULT shadow-sm">
<span class="text-tech-data font-tech-data text-on-surface-variant block text-[11px]">Elongation Ratio:</span>
<span class="font-headline-sm text-[16px] text-primary font-bold">480%</span>
<span class="text-[11px] text-on-surface-variant">Anti-Tear Peak</span>
</div>
</div>
</div>
</div>
<!-- RIGHT COLUMN: Engineering Specs & B2B Quotation Builder (5 cols) -->
<div class="lg:col-span-5 flex flex-col gap-space-md">
<!-- Product Header Card -->
<div class="bg-surface-container-lowest rounded-DEFAULT p-space-md shadow-sm">
<div class="flex items-center gap-space-xs mb-1">
<span class="bg-secondary-fixed text-on-secondary-fixed text-[10px] font-label-caps px-2 py-0.5 rounded font-bold uppercase tracking-wider">
              BEVERAGE SERVICE LINE
            </span>
<span class="bg-surface-container text-on-surface-variant text-[10px] font-tech-data px-2 py-0.5 rounded">
              HS Code: 3923.21.00
            </span>
</div>
<h1 class="font-headline-lg text-headline-lg text-primary tracking-tight font-bold">
            {{ $product['name'] }}
          </h1>
<p class="font-headline-sm text-[15px] text-secondary font-semibold mt-1">
            Twin-Cup High-Volume Restaurant &amp; Milk Tea Franchise Takeaway Packaging
          </p>
<p class="font-body-md text-body-md text-on-surface-variant mt-2 leading-relaxed">
            Industrial blown-film twin cup carry bags engineered for commercial cafe delivery, high-throughput tea shops, and food aggregators. Features center divider weld to prevent cup collision and side gusset expansion for stable base seating.
          </p>
<!-- Key Performance Feature Badges -->
<div class="flex flex-wrap gap-1.5 mt-3">
<span class="inline-flex items-center gap-1 bg-surface-container-low px-2 py-1 rounded text-body-sm text-[12px] text-on-surface font-medium">
<span class="material-symbols-outlined text-[15px] text-status-success">check_circle</span> Food Grade Certified
            </span>
<span class="inline-flex items-center gap-1 bg-surface-container-low px-2 py-1 rounded text-body-sm text-[12px] text-on-surface font-medium">
<span class="material-symbols-outlined text-[15px] text-primary">recycling</span> 100% Recyclable PE
            </span>
<span class="inline-flex items-center gap-1 bg-surface-container-low px-2 py-1 rounded text-body-sm text-[12px] text-on-surface font-medium">
<span class="material-symbols-outlined text-[15px] text-primary">bolt</span> Anti-Static Surface
            </span>
<span class="inline-flex items-center gap-1 bg-surface-container-low px-2 py-1 rounded text-body-sm text-[12px] text-on-surface font-medium">
<span class="material-symbols-outlined text-[15px] text-tertiary-container">water_drop</span> Anti-Spill Divider
            </span>
</div>
</div>
<!-- Quick Specification Technical Grid -->
<div class="bg-surface-container-lowest rounded-DEFAULT p-space-md shadow-sm">
<h2 class="font-label-caps text-label-caps uppercase tracking-wider text-primary font-bold mb-3 flex items-center justify-between">
<span class="">Production Parameters</span>
<span class="text-tech-data font-tech-data text-on-surface-variant font-normal">TOLERANCE: ±3%</span>
</h2>
<div class="space-y-2 text-body-sm font-body-sm">
<div class="flex justify-between py-1 bg-surface-container-low/50 px-2 rounded-DEFAULT">
<span class="text-on-surface-variant font-medium">Standard Resin</span>
<span class="font-tech-data font-semibold text-primary">HDPE / LDPE / LLDPE Virgin Blend</span>
</div>
<div class="flex justify-between py-1 px-2 rounded-DEFAULT">
<span class="text-on-surface-variant font-medium">Micron Gauge</span>
<span class="font-tech-data font-semibold text-primary">25 – 45 μm (Bespoke to 120 μm)</span>
</div>
<div class="flex justify-between py-1 bg-surface-container-low/50 px-2 rounded-DEFAULT">
<span class="text-on-surface-variant font-medium">Capacity Rating</span>
<span class="font-tech-data font-semibold text-primary">2× (12oz to 22oz) • Max 1.8kg</span>
</div>
<div class="flex justify-between py-1 px-2 rounded-DEFAULT">
<span class="text-on-surface-variant font-medium">Print Options</span>
<span class="font-tech-data font-semibold text-primary">1 to 6 Colors Rotogravure</span>
</div>
<div class="flex justify-between py-1 bg-surface-container-low/50 px-2 rounded-DEFAULT">
<span class="text-on-surface-variant font-medium">Standard Packing</span>
<span class="font-tech-data font-semibold text-primary">100 pcs/pack • 2,000 pcs/box</span>
</div>
<div class="flex justify-between py-1 px-2 rounded-DEFAULT">
<span class="text-on-surface-variant font-medium">Production Lead Time</span>
<span class="font-tech-data font-semibold text-status-success">3–5 Days (Plain) / 7–10 Days (Print)</span>
</div>
</div>
</div>
<!-- Interactive Spec Configurator & Quotation Estimator Widget -->
<div class="bg-surface-container-high/40 rounded-DEFAULT p-space-md shadow-sm">
<div class="flex items-center justify-between mb-3">
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-primary text-xl">tune</span>
<h3 class="font-headline-sm text-[16px] text-primary font-bold">Interactive Specification Builder</h3>
</div>
<span class="text-tech-data font-tech-data text-tertiary-container font-semibold">B2B QUOTE WIDGET</span>
</div>
<form class="space-y-space-sm" id="specBuilderForm" onsubmit="event.preventDefault();">
<!-- Parameter 1: Carrier Format -->
<div>
<label class="block text-body-sm font-semibold text-on-surface mb-1">1. Select Carrier Format / Cup Capacity</label>
<div class="grid grid-cols-3 gap-2 text-body-sm">
<button class="spec-btn px-2 py-2 rounded-DEFAULT bg-surface-container-lowest text-center font-medium shadow-sm hover:bg-surface-subtle transition-all" onclick="selectOption(this, 'carrier')" type="button">
<span class="block text-[11px] font-tech-data text-on-surface-variant">Single Cup</span>
<span class="font-semibold text-on-surface text-[12px]">1 Carrier</span>
</button>
<button class="spec-btn active-spec px-2 py-2 rounded-DEFAULT bg-primary text-on-primary text-center font-medium shadow-sm transition-all" onclick="selectOption(this, 'carrier')" type="button">
<span class="block text-[11px] font-tech-data opacity-80">Double (Std)</span>
<span class="font-semibold text-[12px]">2 Carriers</span>
</button>
<button class="spec-btn px-2 py-2 rounded-DEFAULT bg-surface-container-lowest text-center font-medium shadow-sm hover:bg-surface-subtle transition-all" onclick="selectOption(this, 'carrier')" type="button">
<span class="block text-[11px] font-tech-data text-on-surface-variant">Quad Cup</span>
<span class="font-semibold text-on-surface text-[12px]">4 Carriers</span>
</button>
</div>
</div>
<!-- Parameter 2: Material Resin Blend -->
<div>
<label class="block text-body-sm font-semibold text-on-surface mb-1">2. Polymer Formulation</label>
<div class="grid grid-cols-3 gap-2 text-body-sm">
<button class="spec-btn active-spec px-2 py-2 rounded-DEFAULT bg-primary text-on-primary text-center font-medium shadow-sm transition-all" onclick="selectOption(this, 'resin')" type="button">
<span class="block text-[11px] font-tech-data opacity-80">Virgin HDPE</span>
<span class="font-semibold text-[12px]">Matte / Rigid</span>
</button>
<button class="spec-btn px-2 py-2 rounded-DEFAULT bg-surface-container-lowest text-center font-medium shadow-sm hover:bg-surface-subtle transition-all" onclick="selectOption(this, 'resin')" type="button">
<span class="block text-[11px] font-tech-data text-on-surface-variant">LDPE Blend</span>
<span class="font-semibold text-on-surface text-[12px]">Gloss / Flexible</span>
</button>
<button class="spec-btn px-2 py-2 rounded-DEFAULT bg-surface-container-lowest text-center font-medium shadow-sm hover:bg-surface-subtle transition-all" onclick="selectOption(this, 'resin')" type="button">
<span class="block text-[11px] font-tech-data text-on-surface-variant">Oxo-Bio</span>
<span class="font-semibold text-on-surface text-[12px]">Eco Degrade</span>
</button>
</div>
</div>
<!-- Parameter 3: Print Cylinders -->
<div>
<label class="block text-body-sm font-semibold text-on-surface mb-1">3. Custom Branding &amp; Print Finish</label>
<div class="grid grid-cols-3 gap-2 text-body-sm">
<button class="spec-btn active-spec px-2 py-2 rounded-DEFAULT bg-primary text-on-primary text-center font-medium shadow-sm transition-all" onclick="selectOption(this, 'print')" type="button">
<span class="block text-[11px] font-tech-data opacity-80">Natural Frost</span>
<span class="font-semibold text-[12px]">Plain / No Print</span>
</button>
<button class="spec-btn px-2 py-2 rounded-DEFAULT bg-surface-container-lowest text-center font-medium shadow-sm hover:bg-surface-subtle transition-all" onclick="selectOption(this, 'print')" type="button">
<span class="block text-[11px] font-tech-data text-on-surface-variant">1-2 Colors</span>
<span class="font-semibold text-on-surface text-[12px]">Spot Flexo</span>
</button>
<button class="spec-btn px-2 py-2 rounded-DEFAULT bg-surface-container-lowest text-center font-medium shadow-sm hover:bg-surface-subtle transition-all" onclick="selectOption(this, 'print')" type="button">
<span class="block text-[11px] font-tech-data text-on-surface-variant">3-6 Colors</span>
<span class="font-semibold text-on-surface text-[12px]">Rotogravure</span>
</button>
</div>
</div>
<!-- Parameter 4: Wholesale Quantity Tier -->
<div>
<label class="block text-body-sm font-semibold text-on-surface mb-1">4. Target Order Volume</label>
<div class="grid grid-cols-3 gap-2 text-body-sm">
<button class="spec-btn px-2 py-2 rounded-DEFAULT bg-surface-container-lowest text-center font-medium shadow-sm hover:bg-surface-subtle transition-all" onclick="selectOption(this, 'qty')" type="button">
<span class="block text-[11px] font-tech-data text-on-surface-variant">Wholesale</span>
<span class="font-semibold text-on-surface text-[12px]">10,000 pcs</span>
</button>
<button class="spec-btn active-spec px-2 py-2 rounded-DEFAULT bg-primary text-on-primary text-center font-medium shadow-sm transition-all" onclick="selectOption(this, 'qty')" type="button">
<span class="block text-[11px] font-tech-data opacity-80">Franchise Tier</span>
<span class="font-semibold text-[12px]">50,000 pcs</span>
</button>
<button class="spec-btn px-2 py-2 rounded-DEFAULT bg-surface-container-lowest text-center font-medium shadow-sm hover:bg-surface-subtle transition-all" onclick="selectOption(this, 'qty')" type="button">
<span class="block text-[11px] font-tech-data text-on-surface-variant">Enterprise</span>
<span class="font-semibold text-on-surface text-[12px]">100,000+ pcs</span>
</button>
</div>
</div>
<!-- Summary Bar -->
<div class="bg-surface-container-lowest p-2.5 rounded-DEFAULT shadow-sm flex items-center justify-between text-tech-data font-tech-data">
<span class="text-on-surface-variant">Estimated Daily Plant Throughput:</span>
<span class="font-bold text-primary text-[13px]">120,000 pcs / 24hrs</span>
</div>
<!-- Call to Actions -->
<div class="flex flex-col gap-2 pt-1">
<a class="w-full flex items-center justify-center gap-2 bg-primary-container hover:bg-primary text-on-primary py-3 px-4 rounded-DEFAULT font-headline-sm text-[15px] font-bold tracking-wide shadow-md transition-all hover:translate-y-[-1px]" data-path="request-a-quote" href="{{ route('request-a-quote') }}">
<span class="">REQUEST FACTORY QUOTATION FOR THIS PRODUCT</span>
<span class="material-symbols-outlined text-base">arrow_forward</span>
</a>

</div>
</form>
</div>
</div>
</div>
</section>
<!-- COMPREHENSIVE TECHNICAL TABBED DATA SECTION -->

<!-- EXPLORE RELATED DSAM PACKAGING SOLUTIONS CAROUSEL -->
<section class="w-full px-margin py-space-xl">
<div class="max-w-7xl mx-auto">
<div class="flex flex-col md:flex-row md:items-end justify-between mb-space-md">
<div>
<span class="font-label-caps text-label-caps uppercase tracking-wider text-primary font-bold block mb-1">
            INTEGRATED PACKAGING FLEET
          </span>
<h2 class="font-headline-lg text-headline-lg text-primary font-bold">
            Explore Related DSAM Packaging Solutions
          </h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-1">
            Extruded, converted, and printed directly at our San Pedro, Laguna industrial manufacturing facility.
          </p>
</div>
<a class="mt-3 md:mt-0 inline-flex items-center gap-1 font-body-sm font-semibold text-primary hover:text-primary-container transition-colors" data-path="products" href="{{ route('product-collection') }}">
<span class="">View All 10 Product Categories</span>
<span class="material-symbols-outlined text-sm">arrow_forward</span>
</a>
</div>
<!-- 4 High-Authority Product Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-gutter">
<!-- Related 1: Sando Bags -->
<div class="bg-surface-container-lowest rounded-DEFAULT overflow-hidden shadow-sm hover:shadow-md transition-all flex flex-col group">
<div class="relative aspect-[4/3] bg-surface-container-low overflow-hidden">
<img alt="DSAM Sando Bags" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBxW5YEj2jYWXmnosv75iDjYPGnYe2s0bRppMh8tp5vj2HvofcHeX6eauqTkaTUIjdiBiALoM9fUafuw0DFREKa-2OM1M5xojiLK06P-7sgwS1KQW8x_YL0yvzELywvD-bXcVQWnicBxB9Cuud7QsynvP-LNXsLg9tkid08TIdL5vaw9cbGjzDrGPHLnVMt1HLgu4hNxhMJ8VgxBvYnh-3UWjPy9fdkaimBF4fm7vHZMnsQYFJopwh0dqbTJbDklvXZ9yg">
<span class="absolute top-2 left-2 bg-surface-dark/80 text-surface-bright text-[10px] font-tech-data px-2 py-0.5 rounded">RETAIL STD</span>
</div>
<div class="p-space-md flex flex-col flex-1 justify-between">
<div>
<h3 class="font-headline-sm text-[16px] text-primary font-bold leading-tight">Sando Bags (HDPE/LDPE)</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">
                Singlet carry grocery handles with high gusset yield for retail and supermarkets.
              </p>
<p class="font-tech-data text-tech-data text-on-surface font-semibold mt-2">Sizes: Tiny • S • M • L • XL</p>
</div>
<div class="pt-space-md">
<a class="inline-flex items-center gap-1 text-primary font-semibold text-body-sm hover:underline" data-path="products" href="{{ route('product.show', ['slug' => 'sando-bags']) }}">
<span class="">View Product Details</span>
<span class="material-symbols-outlined text-sm">arrow_forward</span>
</a>
</div>
</div>
</div>
<!-- Related 2: Trashbag -->
<div class="bg-surface-container-lowest rounded-DEFAULT overflow-hidden shadow-sm hover:shadow-md transition-all flex flex-col group">
<div class="relative aspect-[4/3] bg-surface-container-low overflow-hidden">
<img alt="DSAM Industrial Trash Bags" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" src="https://lh3.googleusercontent.com/aida/AEtjO1UsSKAodDxy00mE5oOQcOiedLIaApM4Yv3jmZkIbLxKDbhDPK5elmpUBEugxrT3dy39KrBL_0pivdMIlOgSpOhPKmSsy7xlmlR8eI7mB6mHYUdPMj722q8PjAoJA8yDMX9MytGcL7z_K6gomTH_b_efwNW5gLAhy2VptxuneocWDWagOeLxvfXRFY_a3Xs2J5BLNqZ08STbjlFp2RhxeFimyxsNNBwUBLlxGU2hrO6N_yxzFwLqYy_cQz90">
<span class="absolute top-2 left-2 bg-surface-dark/80 text-surface-bright text-[10px] font-tech-data px-2 py-0.5 rounded">HEAVY LINER</span>
</div>
<div class="p-space-md flex flex-col flex-1 justify-between">
<div>
<h3 class="font-headline-sm text-[16px] text-primary font-bold leading-tight">Trashbag (Rolled / Flat)</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">
                Industrial heavy-duty waste liners engineered with star-seal bottom for janitorial.
              </p>
<p class="font-tech-data text-tech-data text-on-surface font-semibold mt-2">Gauges: 30 – 80 Microns</p>
</div>
<div class="pt-space-md">
<a class="inline-flex items-center gap-1 text-primary font-semibold text-body-sm hover:underline" data-path="products" href="{{ route('product.show', ['slug' => 'trashbag']) }}">
<span class="">View Product Details</span>
<span class="material-symbols-outlined text-sm">arrow_forward</span>
</a>
</div>
</div>
</div>
<!-- Related 3: Icebag -->
<div class="bg-surface-container-lowest rounded-DEFAULT overflow-hidden shadow-sm hover:shadow-md transition-all flex flex-col group">
<div class="relative aspect-[4/3] bg-surface-container-low overflow-hidden">
<img alt="DSAM Bluish Tube Ice Bags" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" src="https://lh3.googleusercontent.com/aida/AEtjO1XOrr-1OWmZOse2-W_balwW8McxEUw4s40HGWzQ5Bug2aEO1uxOThhfOGVlYld-Tmo3ijw_FkulY_RFgieXOERCoRZm33eaU074TBfJbDhmmzH2cxPa2gfOQMwBsxH6rfVQQWVCO5bvC39l324TOhMviQz0OmDPCDynIlCx6UM-6yy3muzPasJHcKOq0o-4C8-vpAROdDKpy-xD6C903L-VDpkSGlLbdK4IZ060jSaneu2ZNF00yKu4Hyo">
<span class="absolute top-2 left-2 bg-primary text-on-primary text-[10px] font-tech-data px-2 py-0.5 rounded">COLD CHAIN</span>
</div>
<div class="p-space-md flex flex-col flex-1 justify-between">
<div>
<h3 class="font-headline-sm text-[16px] text-primary font-bold leading-tight">Icebag (Bluish &amp; Trans)</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">
                Sub-zero impact resistant PE bags for commercial tube ice and cold storage logistics.
              </p>
<p class="font-tech-data text-tech-data text-on-surface font-semibold mt-2">Capacities: 1kg • 2kg • 5kg Tube</p>
</div>
<div class="pt-space-md">
<a class="inline-flex items-center gap-1 text-primary font-semibold text-body-sm hover:underline" data-path="products" href="{{ route('product.show', ['slug' => 'icebag']) }}">
<span class="">View Product Details</span>
<span class="material-symbols-outlined text-sm">arrow_forward</span>
</a>
</div>
</div>
</div>
<!-- Related 4: Ham Bags -->
<div class="bg-surface-container-lowest rounded-DEFAULT overflow-hidden shadow-sm hover:shadow-md transition-all flex flex-col group">
<div class="relative aspect-[4/3] bg-surface-container-low overflow-hidden">
<img alt="DSAM Festive Ham Bags" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" src="https://lh3.googleusercontent.com/aida/AEtjO1XTp1A5yHKQaTdmY9RV6LWhSwVm2Dkkng131ACNT2fPQX0redB0_6UIVALDwfaDYeBbLb_g-sCRWyDXfJNJzq4zX7z_HYA_wHpHFdghfR3Os6EWuR5P5kX_xY8y6M8y8Ixa4qhh0deM5Y6DmZ_6pVitC7paYEK9EbhXsbRlnDKp4EzU7-eSXLu3g6fDFY41L5OmR0lXEA6-bO7uDeZCicXrzSjXat0b9L2bF4V5BpobK6RtxIGo-u7LGC2w">
<span class="absolute top-2 left-2 bg-tertiary-container text-on-tertiary text-[10px] font-tech-data px-2 py-0.5 rounded">ROTOGRAVURE</span>
</div>
<div class="p-space-md flex flex-col flex-1 justify-between">
<div>
<h3 class="font-headline-sm text-[16px] text-primary font-bold leading-tight">Heavy-Duty Ham Bags</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">
                Holiday season food packaging with reinforced oval handle and multi-color artwork.
              </p>
<p class="font-tech-data text-tech-data text-on-surface font-semibold mt-2">Print: Up to 6 Colors + Varnish</p>
</div>
<div class="pt-space-md">
<a class="inline-flex items-center gap-1 text-primary font-semibold text-body-sm hover:underline" data-path="products" href="{{ route('product.show', ['slug' => 'ham-bags']) }}">
<span class="">View Product Details</span>
<span class="material-symbols-outlined text-sm">arrow_forward</span>
</a>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- PRE-FOOTER FAST-TRACK PROCUREMENT BANNER -->

</div>
<script>
  // Technical Tab Switcher
  function showTab(tabId, btn) {
    document.querySelectorAll('.tab-panel').forEach(panel => panel.classList.add('hidden'));
    document.getElementById(tabId).classList.remove('hidden');

    document.querySelectorAll('.tech-tab').forEach(b => {
      b.classList.remove('active-tab', 'bg-surface-container-lowest', 'text-primary', 'shadow-sm');
      b.classList.add('text-on-surface-variant');
    });

    btn.classList.add('active-tab', 'bg-surface-container-lowest', 'text-primary', 'shadow-sm');
    btn.classList.remove('text-on-surface-variant');
  }

  // Gallery Thumbnail Image Switcher
  function switchImage(src, thumbBtn) {
    const mainImg = document.getElementById('mainProductImage');
    if (mainImg) {
      mainImg.src = src;
    }
    document.querySelectorAll('.gallery-thumb').forEach(t => {
      t.classList.add('opacity-75');
      t.classList.remove('active-thumb', 'opacity-100');
    });
    thumbBtn.classList.remove('opacity-75');
    thumbBtn.classList.add('active-thumb', 'opacity-100');
  }

  // Product Switcher Menu Toggle
  const switcherBtn = document.getElementById('productSwitcherBtn');
  const dropdown = document.getElementById('productDropdown');
  const chevron = document.getElementById('switcherChevron');

  if (switcherBtn && dropdown) {
    switcherBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      dropdown.classList.toggle('hidden');
      chevron.classList.toggle('rotate-180');
    });

    document.addEventListener('click', () => {
      dropdown.classList.add('hidden');
      chevron.classList.remove('rotate-180');
    });
  }

  // Spec Configurator Selection Helper
  function selectOption(button, group) {
    const parent = button.parentElement;
    parent.querySelectorAll('.spec-btn').forEach(btn => {
      btn.classList.remove('active-spec', 'bg-primary', 'text-on-primary');
      btn.classList.add('bg-surface-container-lowest', 'text-on-surface');
      const sub = btn.querySelector('.font-tech-data');
      if (sub) sub.classList.remove('opacity-80');
    });

    button.classList.add('active-spec', 'bg-primary', 'text-on-primary');
    button.classList.remove('bg-surface-container-lowest', 'text-on-surface');
    const subtext = button.querySelector('.font-tech-data');
    if (subtext) subtext.classList.add('opacity-80');
  }

  // Image Zoom Simulation
  const zoomBtn = document.getElementById('zoomBtn');
  if (zoomBtn) {
    zoomBtn.addEventListener('click', () => {
      const img = document.getElementById('mainProductImage');
      if (img.classList.contains('scale-125')) {
        img.classList.remove('scale-125');
        zoomBtn.querySelector('span').textContent = 'zoom_in';
      } else {
        img.classList.add('scale-125');
        zoomBtn.querySelector('span').textContent = 'zoom_out';
      }
    });
  }
</script></main>@include('partials.site-footer')



</body></html>












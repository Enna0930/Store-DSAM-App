<!DOCTYPE html><html class="scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1.0" name="viewport"><meta name="csrf-token" content="{{ csrf_token() }}"><link href="https://fonts.googleapis.com" rel="preconnect"><link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"><link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=JetBrains+Mono:wght@400;500;600&amp;family=Plus+Jakarta+Sans:wght@500;600;700;800&amp;display=swap" rel="stylesheet"><link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"><style>@layer base{html,body{margin:0;padding:0;}body{overscroll-behavior:none;}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}</style><script src="https://cdn.tailwindcss.com"></script><script id="tailwind-config">tailwind.config={darkMode:"class",theme:{extend:{colors:{"border-technical":"#D9E2EC","on-primary":"#ffffff","on-error":"#ffffff","inverse-surface":"#2d3133","primary-fixed-dim":"#b1c5ff","on-secondary":"#ffffff","surface":"#f7f9fc","on-background":"#191c1e","tertiary-container":"#573e00","surface-container":"#eceef1","on-tertiary-container":"#cfa961","on-surface-variant":"#434652","surface-dim":"#d8dadd","surface-variant":"#e0e3e6","on-secondary-fixed-variant":"#364766","inverse-on-surface":"#eff1f4","surface-tint":"#345baf","status-success":"#1B873F","on-primary-fixed":"#001947","tertiary-fixed-dim":"#e9c176","tertiary":"#3b2900","primary":"#002868","secondary-container":"#c7d7fd","on-tertiary":"#ffffff","surface-container-highest":"#e0e3e6","surface-subtle":"#E9ECEF","surface-container-high":"#e6e8eb","on-surface":"#191c1e","outline":"#747783","on-primary-fixed-variant":"#144296","primary-fixed":"#dae2ff","background":"#f7f9fc","secondary":"#4e5e7f","surface-dark":"#051329","on-tertiary-fixed":"#261900","error-container":"#ffdad6","surface-bright":"#f7f9fc","on-primary-container":"#8dadff","on-error-container":"#93000a","error":"#ba1a1a","primary-container":"#0a3d91","outline-variant":"#c4c6d3","surface-container-lowest":"#ffffff","on-secondary-fixed":"#081b38","on-tertiary-fixed-variant":"#5d4201","inverse-primary":"#b1c5ff","secondary-fixed":"#d7e2ff","on-secondary-container":"#4d5d7e","secondary-fixed-dim":"#b6c7ec","surface-container-low":"#f2f4f7","tertiary-fixed":"#ffdea5"},borderRadius:{DEFAULT:"0.125rem",lg:"0.25rem",xl:"0.5rem",full:"0.75rem"},spacing:{"space-xl":"2.5rem",margin:"2rem","space-lg":"1.5rem",gutter:"1.5rem","space-xs":"0.25rem","space-md":"1rem","space-sm":"0.5rem"},fontFamily:{"body-md":["Inter"],"headline-xl-mobile":["Plus Jakarta Sans"],"headline-sm":["Plus Jakarta Sans"],"headline-xl":["Plus Jakarta Sans"],"label-caps":["Plus Jakarta Sans"],"body-sm":["Inter"],"tech-data":["JetBrains Mono"],"display-lg-mobile":["Plus Jakarta Sans"],"body-lg":["Inter"],"headline-lg":["Plus Jakarta Sans"],"display-lg":["Plus Jakarta Sans"],"headline-md":["Plus Jakarta Sans"]},fontSize:{"body-md":["15px",{lineHeight:"24px",fontWeight:"400"}],"headline-xl-mobile":["28px",{lineHeight:"36px",fontWeight:"700"}],"headline-sm":["20px",{lineHeight:"28px",fontWeight:"600"}],"headline-xl":["40px",{lineHeight:"48px",letterSpacing:"-0.015em",fontWeight:"700"}],"label-caps":["11px",{lineHeight:"16px",letterSpacing:"0.08em",fontWeight:"700"}],"body-sm":["13px",{lineHeight:"20px",fontWeight:"400"}],"tech-data":["12px",{lineHeight:"18px",letterSpacing:"0.02em",fontWeight:"500"}],"display-lg-mobile":["36px",{lineHeight:"44px",letterSpacing:"-0.01em",fontWeight:"700"}],"body-lg":["18px",{lineHeight:"28px",fontWeight:"400"}],"headline-lg":["32px",{lineHeight:"40px",letterSpacing:"-0.01em",fontWeight:"600"}],"display-lg":["56px",{lineHeight:"64px",letterSpacing:"-0.02em",fontWeight:"700"}],"headline-md":["24px",{lineHeight:"32px",fontWeight:"600"}]}}}}</script><link href="{{ asset('css/app.css') }}" rel="stylesheet"><script src="{{ asset('js/app.js') }}" defer></script></head><body class="bg-surface font-body-md text-body-md text-on-surface antialiased">@include('partials.site-header')<main class="w-full bg-surface min-h-screen"><div class="flex flex-col w-full">
<!-- BREADCRUMBS & TOP METRICS HEADER -->
<section class="w-full px-6 lg:px-12 pt-5 pb-10 bg-surface-dark text-on-primary">
<div class="max-w-7xl mx-auto flex flex-col gap-6">
<!-- Breadcrumb row -->
<div class="flex items-center gap-2 font-tech-data text-tech-data text-surface-subtle">
<a class="hover:text-on-primary transition-colors" data-path="home" href="{{ route('home') }}">Home</a>
<span class="text-white/50">/</span>
<span class="text-surface-subtle">Commercial Sectors</span>
<span class="text-white/50">/</span>
<span class="text-on-primary font-semibold">Packaging Across Industries</span>
</div>
<!-- Hero Header Block (Direct Inspiration from Image) -->
<div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 pb-2">
<div class="max-w-3xl flex flex-col gap-3">
<div class="flex items-center gap-3">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded bg-tertiary text-on-tertiary font-label-caps text-label-caps uppercase tracking-wider">
<span class="w-2 h-2 rounded-full bg-tertiary-fixed"></span>
              COMMERCIAL SECTORS
            </span>
<span class="font-tech-data text-tech-data text-surface-subtle uppercase tracking-widest hidden sm:inline">
              SAN PEDRO, LAGUNA FACTORY DIRECT
            </span>
</div>
<h1 class="font-display-lg text-headline-xl lg:text-display-lg text-on-primary tracking-tight font-bold">
            Packaging Across Industries
          </h1>
<p class="font-body-lg text-body-lg text-surface-subtle leading-relaxed">
            Supplying critical supply-chain partners with reliable, food-grade, and heavy-gauge polymer containment across the Philippines' most demanding commercial operations.
          </p>
</div>
<div class="flex items-center gap-3">
<div class="px-4 py-2.5 rounded-lg bg-primary-container/70 border border-tertiary-fixed/40 text-on-primary font-label-caps text-label-caps uppercase tracking-wider flex items-center gap-2 shadow-sm">
<span class="material-symbols-outlined text-base text-tertiary-fixed-dim">verified</span>
            ENTERPRISE B2B CONTRACTS
          </div>
<a class="px-5 py-2.5 rounded-lg bg-primary-container text-on-primary font-headline-sm text-body-sm font-bold shadow-sm hover:bg-primary transition-all uppercase tracking-wider" data-path="request-a-quote" href="{{ route('request-a-quote') }}">
            Fast-Track RFQ
          </a>
</div>
</div>
<!-- Quick KPI Strip -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 pt-4">
<div class="bg-surface-container-lowest p-4 rounded-xl shadow-sm flex flex-col gap-1">
<span class="font-label-caps text-label-caps uppercase text-primary tracking-wider">Capacity Throughput</span>
<span class="font-headline-lg text-headline-md font-bold text-primary">40+ MT / Day</span>
<span class="font-tech-data text-tech-data text-secondary">Continuous blown extrusion lines</span>
</div>
<div class="bg-surface-container-lowest p-4 rounded-xl shadow-sm flex flex-col gap-1">
<span class="font-label-caps text-label-caps uppercase text-primary tracking-wider">Polymer Integrity</span>
<span class="font-headline-lg text-headline-md font-bold text-primary">100% Virgin</span>
<span class="font-tech-data text-tech-data text-secondary">FDA food-contact grade resins</span>
</div>
<div class="bg-surface-container-lowest p-4 rounded-xl shadow-sm flex flex-col gap-1">
<span class="font-label-caps text-label-caps uppercase text-primary tracking-wider">Sector Coverage</span>
<span class="font-headline-lg text-headline-md font-bold text-primary">6 Core Sectors</span>
<span class="font-tech-data text-tech-data text-secondary">Custom dies &amp; multi-color print</span>
</div>
<div class="bg-surface-container-lowest p-4 rounded-xl shadow-sm flex flex-col gap-1">
<span class="font-label-caps text-label-caps uppercase text-primary tracking-wider">Plant Response</span>
<span class="font-headline-lg text-headline-md font-bold text-status-success">&lt; 24h Engineered</span>
<span class="font-tech-data text-tech-data text-secondary">Direct San Pedro desk estimate</span>
</div>
</div>
</div>
</section>
<!-- QUICK SECTOR NAVIGATION FILTER -->
<section class="w-full bg-surface-container px-6 lg:px-12 py-3 shadow-inner">
<div class="max-w-7xl mx-auto flex items-center justify-between overflow-x-auto gap-2 no-scrollbar">
<div class="flex items-center gap-1.5 shrink-0" id="filter-buttons">
<button class="filter-tab active px-4 py-2 rounded-lg bg-primary text-on-primary font-headline-sm text-body-sm font-semibold transition-all" onclick="filterSector('all')">
          All Sectors (6)
        </button>
<button class="filter-tab px-4 py-2 rounded-lg bg-surface-container-lowest text-on-surface hover:bg-secondary-container/50 font-headline-sm text-body-sm font-medium transition-all" onclick="filterSector('food')">
          Food &amp; Beverage
        </button>
<button class="filter-tab px-4 py-2 rounded-lg bg-surface-container-lowest text-on-surface hover:bg-secondary-container/50 font-headline-sm text-body-sm font-medium transition-all" onclick="filterSector('takeout')">
          Restaurants &amp; QSR
        </button>
<button class="filter-tab px-4 py-2 rounded-lg bg-surface-container-lowest text-on-surface hover:bg-secondary-container/50 font-headline-sm text-body-sm font-medium transition-all" onclick="filterSector('retail')">
          Retail &amp; Apparel
        </button>
<button class="filter-tab px-4 py-2 rounded-lg bg-surface-container-lowest text-on-surface hover:bg-secondary-container/50 font-headline-sm text-body-sm font-medium transition-all" onclick="filterSector('ecommerce')">
          Logistics &amp; Courier
        </button>
<button class="filter-tab px-4 py-2 rounded-lg bg-surface-container-lowest text-on-surface hover:bg-secondary-container/50 font-headline-sm text-body-sm font-medium transition-all" onclick="filterSector('agriculture')">
          Agriculture &amp; Produce
        </button>
<button class="filter-tab px-4 py-2 rounded-lg bg-surface-container-lowest text-on-surface hover:bg-secondary-container/50 font-headline-sm text-body-sm font-medium transition-all" onclick="filterSector('industrial')">
          Industrial &amp; Chemicals
        </button>
</div>
<div class="hidden lg:flex items-center gap-2 font-tech-data text-tech-data text-secondary shrink-0 pl-4">
<span class="w-2 h-2 rounded-full bg-status-success animate-pulse"></span>
        Laguna Daily Dispatch Active
      </div>
</div>
</section>
<!-- 6 CORE SECTORS SHOWCASE (INSPIRED BY REFERENCE IMAGE GRID) -->
<section class="w-full bg-surface px-6 lg:px-12 py-16">
<div class="max-w-7xl mx-auto flex flex-col gap-12">
<div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
<div>
<span class="font-label-caps text-label-caps text-tertiary-container uppercase tracking-widest font-bold block mb-1">
            Manufacturing Lineup &amp; Application Matrices
          </span>
<h2 class="font-headline-lg text-headline-lg font-bold text-primary tracking-tight">
            Commercial Supply-Chain Portfolios
          </h2>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant max-w-md">
          Each sector portfolio is engineered for high mechanical tensile resilience, strict batch gauge tolerances, and certified food-contact compliance.
        </p>
</div>
<!-- Main Sector Grid (6 Detailed Visual Cards) -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="sector-grid">
<!-- CARD 01: Food & Beverage Processing -->
<div class="sector-card group flex flex-col bg-surface-container-lowest rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300" data-sector="food">
<div class="relative h-60 w-full overflow-hidden bg-surface-dark">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 opacity-90" data-alt="Industrial food packaging manufacturing clean room in the Philippines with workers in sanitary white protective gowns, hairnets, and nitrile gloves operating modern automated plastic blown film extrusion lines, producing clean clear poly bags with cold ice blue and crisp clinical factory lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBZDax_iOosM_AVb4AMMmXkPUMfbJoWrOezlzQvecjGj0Z3UuQQaB1Z-5SW4s3Aucu1PValwhMexRx89mHGsZSfP-feQarCqQtWKOtdZhWCiQFYpOCKdKiHyJdvjlQ9DShsKVCbELMs37GtCli2Ci1cQf1yfr7m86yzLBT7OtkR5UTdVULqE6HxDqMqKj8ZTe9OJDzQLIIfW-yvnTJ2WUymqI1quTJIsxmUdldehynmF872vUBXQAkIew">
<div class="absolute inset-0 bg-gradient-to-t from-surface-dark/95 via-surface-dark/40 to-transparent"></div>
<div class="absolute top-4 left-4 flex items-center gap-2">
<span class="px-2.5 py-1 rounded bg-surface-dark/80 backdrop-blur text-tertiary-fixed-dim font-tech-data text-tech-data tracking-wider font-semibold">
                01 / SECTOR
              </span>
<span class="px-2 py-0.5 rounded bg-status-success/90 text-on-primary font-label-caps text-label-caps uppercase">
                FDA COMPLIANT
              </span>
</div>
<div class="absolute bottom-4 left-4 right-4">
<h3 class="font-headline-md text-headline-md text-on-secondary font-bold leading-tight">
                Food &amp; Beverage Processing
              </h3>
</div>
</div>
<div class="p-6 flex flex-col flex-1 justify-between gap-6">
<div class="flex flex-col gap-4">
<p class="font-body-md text-body-md text-on-surface-variant">
                FDA-grade liners, barrier wraps, and thermo-sealed ice bags for industrial commercial processors and cold-storage operations.
              </p>
<!-- Technical Application Matrix -->
<div class="bg-surface-container-low p-4 rounded-xl flex flex-col gap-2.5">
<span class="font-label-caps text-label-caps uppercase text-secondary tracking-wider font-semibold">Key Applications</span>
<ul class="font-body-sm text-body-sm text-on-surface flex flex-col gap-1.5">
<li class="flex items-center gap-2">
<span class="material-symbols-outlined text-sm text-primary">check_circle</span>
<span class="">Blast-freezing meat &amp; seafood liners (-20°C crack resistant)</span>
</li>
<li class="flex items-center gap-2">
<span class="material-symbols-outlined text-sm text-primary">check_circle</span>
<span class="">Bulk milk &amp; dairy dry-ingredient box liners</span>
</li>
<li class="flex items-center gap-2">
<span class="material-symbols-outlined text-sm text-primary">check_circle</span>
<span class="">Commercial heavy-gauge ice bags (bluish tint &amp; clear)</span>
</li>
</ul>
</div>
<!-- Product Specs Chipset -->
<div class="flex flex-wrap gap-1.5 font-tech-data text-tech-data">
<span class="px-2 py-1 rounded bg-secondary-container/40 text-on-secondary-fixed-variant">Virgin LLDPE/HDPE</span>
<span class="px-2 py-1 rounded bg-secondary-container/40 text-on-secondary-fixed-variant">30 - 120 Microns</span>
<span class="px-2 py-1 rounded bg-secondary-container/40 text-on-secondary-fixed-variant">Leak-Tested Seals</span>
</div>
</div>
<div class="pt-2 flex items-center justify-between border-t border-surface-container-high/40">
<div class="flex flex-col">
<span class="font-label-caps text-label-caps text-secondary uppercase">Standard MOQ</span>
<span class="font-tech-data text-tech-data font-bold text-primary">20,000 Pcs / Contract</span>
</div>
<a class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg bg-primary-container text-on-primary font-headline-sm text-body-sm font-semibold hover:bg-primary transition-colors" data-path="request-a-quote" href="{{ route('request-a-quote') }}">
<span class="">Request F&amp;B Quote</span>
<span class="material-symbols-outlined text-base">arrow_forward</span>
</a>
</div>
</div>
</div>
<!-- CARD 02: Restaurants & Takeout Chains -->
<div class="sector-card group flex flex-col bg-surface-container-lowest rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300" data-sector="takeout">
<div class="relative h-60 w-full overflow-hidden bg-surface-dark">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 opacity-90" data-alt="Commercial restaurant commissary kitchen and takeout staging area with neat stacks of customized branded milk tea double cup carrier bags and high load takeaway bags with kraft boxes, clean commercial hospitality lighting in warm natural ambient tones" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBGdyeNA4C3gPyB2_S5vE2OK_aBItTuVD6MmWMQX9tZs1Pi1SeXpvT33vm2L551DGWXnZkjOB4xx33Vcfm3_kSMmP6w3HGv_osXhTEDjPnjnJz0UH6jLOz5b7tKm8bfZ9AoQrW6bCL2fJqXB9JEwTjC8tbc5cKLkaISlFjYKyBHpJNqrY5ubtEfM0eqdNg88S3-6wFQ03UisVBJAjVbOUhnacHnNmeOSiXRblCe3Kdhq-Tmb33BnJ-SNA">
<div class="absolute inset-0 bg-gradient-to-t from-surface-dark/95 via-surface-dark/40 to-transparent"></div>
<div class="absolute top-4 left-4 flex items-center gap-2">
<span class="px-2.5 py-1 rounded bg-surface-dark/80 backdrop-blur text-tertiary-fixed-dim font-tech-data text-tech-data tracking-wider font-semibold">
                02 / SECTOR
              </span>
<span class="px-2 py-0.5 rounded bg-tertiary-container text-on-tertiary-container font-label-caps text-label-caps uppercase">
                6-COLOR PRINT
              </span>
</div>
<div class="absolute bottom-4 left-4 right-4">
<h3 class="font-headline-md text-headline-md text-on-secondary font-bold leading-tight">
                Restaurants &amp; Takeout Chains
              </h3>
</div>
</div>
<div class="p-6 flex flex-col flex-1 justify-between gap-6">
<div class="flex flex-col gap-4">
<p class="font-body-md text-body-md text-on-surface-variant">
                Custom-printed milk tea carriers, heavy bottom takeout bags, and grease-resistant food liners.
              </p>
<!-- Technical Application Matrix -->
<div class="bg-surface-container-low p-4 rounded-xl flex flex-col gap-2.5">
<span class="font-label-caps text-label-caps uppercase text-secondary tracking-wider font-semibold">Key Applications</span>
<ul class="font-body-sm text-body-sm text-on-surface flex flex-col gap-1.5">
<li class="flex items-center gap-2">
<span class="material-symbols-outlined text-sm text-primary">check_circle</span>
<span class="">Anti-tilt single &amp; double milk tea beverage carriers</span>
</li>
<li class="flex items-center gap-2">
<span class="material-symbols-outlined text-sm text-primary">check_circle</span>
<span class="">Extra-wide gusset delivery bags for soup bowls &amp; bento</span>
</li>
<li class="flex items-center gap-2">
<span class="material-symbols-outlined text-sm text-primary">check_circle</span>
<span class="">Custom brand rotogravure printing up to 6 colors</span>
</li>
</ul>
</div>
<!-- Product Specs Chipset -->
<div class="flex flex-wrap gap-1.5 font-tech-data text-tech-data">
<span class="px-2 py-1 rounded bg-secondary-container/40 text-on-secondary-fixed-variant">Reinforced Die-Cuts</span>
<span class="px-2 py-1 rounded bg-secondary-container/40 text-on-secondary-fixed-variant">Zero-Spill Gusset</span>
<span class="px-2 py-1 rounded bg-secondary-container/40 text-on-secondary-fixed-variant">Food-Safe Inks</span>
</div>
</div>
<div class="pt-2 flex items-center justify-between border-t border-surface-container-high/40">
<div class="flex flex-col">
<span class="font-label-caps text-label-caps text-secondary uppercase">Standard MOQ</span>
<span class="font-tech-data text-tech-data font-bold text-primary">20,000 Pcs / Run</span>
</div>
<a class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg bg-primary-container text-on-primary font-headline-sm text-body-sm font-semibold hover:bg-primary transition-colors" data-path="request-a-quote" href="{{ route('request-a-quote') }}">
<span class="">Get Sample Pack</span>
<span class="material-symbols-outlined text-base">arrow_forward</span>
</a>
</div>
</div>
</div>
<!-- CARD 03: Retail & Department Apparel -->
<div class="sector-card group flex flex-col bg-surface-container-lowest rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300" data-sector="retail">
<div class="relative h-60 w-full overflow-hidden bg-surface-dark">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 opacity-90" data-alt="High-end modern apparel retail store interior with clothing racks, mannequins, and pristine stacks of transparent garment polybags with self-adhesive seals and branded boutique plastic sando bags in a bright minimalist department store setting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDchTRBu3mszSjnP7K56ilbVys7OHBNi5MEsr_gv2OE1OETo4989033VYxcufffSbztDRkK16Nx-TIqmhmX0vqSImGIbADbFCqj49yO0D8ryzIdhWztF5N-ZIinw7LuQ6nKAYgPr1XKDIrZCjds6wv5wPGEP8NhodjljkE_Nx03BQHeQrIQdhrCfc3fvFDAykV8aybzHbqbZzSB0gG0eJmeDMEGj1CkPzU4c6QSJrH56HN9Z_mLFWEvRQ">
<div class="absolute inset-0 bg-gradient-to-t from-surface-dark/95 via-surface-dark/40 to-transparent"></div>
<div class="absolute top-4 left-4 flex items-center gap-2">
<span class="px-2.5 py-1 rounded bg-surface-dark/80 backdrop-blur text-tertiary-fixed-dim font-tech-data text-tech-data tracking-wider font-semibold">
                03 / SECTOR
              </span>
<span class="px-2 py-0.5 rounded bg-surface-tint/90 text-on-primary font-label-caps text-label-caps uppercase">
                HIGH CLARITY
              </span>
</div>
<div class="absolute bottom-4 left-4 right-4">
<h3 class="font-headline-md text-headline-md text-on-secondary font-bold leading-tight">
                Retail &amp; Department Apparel
              </h3>
</div>
</div>
<div class="p-6 flex flex-col flex-1 justify-between gap-6">
<div class="flex flex-col gap-4">
<p class="font-body-md text-body-md text-on-surface-variant">
                High-clarity display polybags with self-seal adhesive tape and branded boutique carriers.
              </p>
<!-- Technical Application Matrix -->
<div class="bg-surface-container-low p-4 rounded-xl flex flex-col gap-2.5">
<span class="font-label-caps text-label-caps uppercase text-secondary tracking-wider font-semibold">Key Applications</span>
<ul class="font-body-sm text-body-sm text-on-surface flex flex-col gap-1.5">
<li class="flex items-center gap-2">
<span class="material-symbols-outlined text-sm text-primary">check_circle</span>
<span class="">Self-adhesive garment packaging bags with air vent holes</span>
</li>
<li class="flex items-center gap-2">
<span class="material-symbols-outlined text-sm text-primary">check_circle</span>
<span class="">Sando checkout bags (standard sizes Tiny to Jumbo XL)</span>
</li>
<li class="flex items-center gap-2">
<span class="material-symbols-outlined text-sm text-primary">check_circle</span>
<span class="">Punch-out handle boutique retail shopping bags</span>
</li>
</ul>
</div>
<!-- Product Specs Chipset -->
<div class="flex flex-wrap gap-1.5 font-tech-data text-tech-data">
<span class="px-2 py-1 rounded bg-secondary-container/40 text-on-secondary-fixed-variant">Ultra-Clear PP / HDPE</span>
<span class="px-2 py-1 rounded bg-secondary-container/40 text-on-secondary-fixed-variant">Permanent/Resealable</span>
<span class="px-2 py-1 rounded bg-secondary-container/40 text-on-secondary-fixed-variant">Micro-Perforations</span>
</div>
</div>
<div class="pt-2 flex items-center justify-between border-t border-surface-container-high/40">
<div class="flex flex-col">
<span class="font-label-caps text-label-caps text-secondary uppercase">Standard MOQ</span>
<span class="font-tech-data text-tech-data font-bold text-primary">20,000 Pcs / Contract</span>
</div>
<a class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg bg-primary-container text-on-primary font-headline-sm text-body-sm font-semibold hover:bg-primary transition-colors" data-path="request-a-quote" href="{{ route('request-a-quote') }}">
<span class="">View Retail Specs</span>
<span class="material-symbols-outlined text-base">arrow_forward</span>
</a>
</div>
</div>
</div>
<!-- CARD 04: E-Commerce & Courier Logistics -->
<div class="sector-card group flex flex-col bg-surface-container-lowest rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300" data-sector="ecommerce">
<div class="relative h-60 w-full overflow-hidden bg-surface-dark">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 opacity-90" data-alt="High volume automated e-commerce sorting logistics distribution center with conveyor belts moving sealed grey and white poly mailers with shipping barcodes and tamper-evident packaging under crisp industrial facility overhead LED lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBksm7s1_j_yqpHCQBw3N5Ib5Q5LmCAxBXX2nXrJ2reALnUdphRUu-yllIJKz6eIwDzfj5DYB46InowzFXLeINZwfRGzrEeJYyy2ERYghX03qcKLEyVwXJMjN2c7nIdpW4J4lvO3i22KiWsolWHMZ4GN8XvB86PZjtcxyKtxF3pvEOixRXxaTRFafiJDeCpn5fnGfxdowyPaCO4tMSjpLZs-7nsnwvqSO2QzaMshl-tNEB-dUSGthfyqA">
<div class="absolute inset-0 bg-gradient-to-t from-surface-dark/95 via-surface-dark/40 to-transparent"></div>
<div class="absolute top-4 left-4 flex items-center gap-2">
<span class="px-2.5 py-1 rounded bg-surface-dark/80 backdrop-blur text-tertiary-fixed-dim font-tech-data text-tech-data tracking-wider font-semibold">
                04 / SECTOR
              </span>
<span class="px-2 py-0.5 rounded bg-status-success/90 text-on-primary font-label-caps text-label-caps uppercase">
                SECURITY TAMPER-PROOF
              </span>
</div>
<div class="absolute bottom-4 left-4 right-4">
<h3 class="font-headline-md text-headline-md text-on-secondary font-bold leading-tight">
                E-Commerce &amp; Courier Logistics
              </h3>
</div>
</div>
<div class="p-6 flex flex-col flex-1 justify-between gap-6">
<div class="flex flex-col gap-4">
<p class="font-body-md text-body-md text-on-surface-variant">
                High-security tamper-evident mailing bags with destructive hot-melt adhesive and opaque barrier.
              </p>
<!-- Technical Application Matrix -->
<div class="bg-surface-container-low p-4 rounded-xl flex flex-col gap-2.5">
<span class="font-label-caps text-label-caps uppercase text-secondary tracking-wider font-semibold">Key Applications</span>
<ul class="font-body-sm text-body-sm text-on-surface flex flex-col gap-1.5">
<li class="flex items-center gap-2">
<span class="material-symbols-outlined text-sm text-primary">check_circle</span>
<span class="">Co-extruded grey/white shipping poly mailers with waybill pocket</span>
</li>
<li class="flex items-center gap-2">
<span class="material-symbols-outlined text-sm text-primary">check_circle</span>
<span class="">100% Blackout internal opaque layer for total parcel confidentiality</span>
</li>
<li class="flex items-center gap-2">
<span class="material-symbols-outlined text-sm text-primary">check_circle</span>
<span class="">High-bond hot-melt adhesive with destructive release film</span>
</li>
</ul>
</div>
<!-- Product Specs Chipset -->
<div class="flex flex-wrap gap-1.5 font-tech-data text-tech-data">
<span class="px-2 py-1 rounded bg-secondary-container/40 text-on-secondary-fixed-variant">3-Layer Co-Ex</span>
<span class="px-2 py-1 rounded bg-secondary-container/40 text-on-secondary-fixed-variant">Hot-Melt Destructive</span>
<span class="px-2 py-1 rounded bg-secondary-container/40 text-on-secondary-fixed-variant">Barcoded POD Pockets</span>
</div>
</div>
<div class="pt-2 flex items-center justify-between border-t border-surface-container-high/40">
<div class="flex flex-col">
<span class="font-label-caps text-label-caps text-secondary uppercase">Standard MOQ</span>
<span class="font-tech-data text-tech-data font-bold text-primary">20,000 Pcs / Size</span>
</div>
<a class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg bg-primary-container text-on-primary font-headline-sm text-body-sm font-semibold hover:bg-primary transition-colors" data-path="request-a-quote" href="{{ route('request-a-quote') }}">
<span class="">Courier Pouches</span>
<span class="material-symbols-outlined text-base">arrow_forward</span>
</a>
</div>
</div>
</div>
<!-- CARD 05: Agriculture & Fresh Produce -->
<div class="sector-card group flex flex-col bg-surface-container-lowest rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300" data-sector="agriculture">
<div class="relative h-60 w-full overflow-hidden bg-surface-dark">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 opacity-90" data-alt="Agricultural distribution warehouse in the Philippines with stacked crates of fresh tropical produce, green bananas, and nursery seedling plants in heavy black UV-treated polymer grow bags, bathed in warm natural ventilation and morning sunbeam light" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCpDmPZSN39QuC60B5ewQ9YmaJW1VJn0bZgMLegAOXrLbvWk5DnMdHTGXscV8zI5iY8_yuFHmWXG62eQuLl3tvAtHFgy_yYG9PwSj2Pg2T7YsCZHm4ImnhSBWgYBCv1LfR-eUh_U87krdAYexaDX8ph2ZRs94Jov5xw9jmCx7IqRLRUkrhXGCQwWvii2qvKV37zKwmpum20-Fs96IvA_e7WvzSMf96-cRMvY7LgPqYCzYKpcOHGxXadcw">
<div class="absolute inset-0 bg-gradient-to-t from-surface-dark/95 via-surface-dark/40 to-transparent"></div>
<div class="absolute top-4 left-4 flex items-center gap-2">
<span class="px-2.5 py-1 rounded bg-surface-dark/80 backdrop-blur text-tertiary-fixed-dim font-tech-data text-tech-data tracking-wider font-semibold">
                05 / SECTOR
              </span>
<span class="px-2 py-0.5 rounded bg-tertiary-fixed-dim text-on-tertiary-fixed font-label-caps text-label-caps uppercase">
                UV-STABILIZED
              </span>
</div>
<div class="absolute bottom-4 left-4 right-4">
<h3 class="font-headline-md text-headline-md text-on-secondary font-bold leading-tight">
                Agriculture &amp; Fresh Produce
              </h3>
</div>
</div>
<div class="p-6 flex flex-col flex-1 justify-between gap-6">
<div class="flex flex-col gap-4">
<p class="font-body-md text-body-md text-on-surface-variant">
                Vented and micro-perforated bulk produce liners engineered for humidity control and freight handling.
              </p>
<!-- Technical Application Matrix -->
<div class="bg-surface-container-low p-4 rounded-xl flex flex-col gap-2.5">
<span class="font-label-caps text-label-caps uppercase text-secondary tracking-wider font-semibold">Key Applications</span>
<ul class="font-body-sm text-body-sm text-on-surface flex flex-col gap-1.5">
<li class="flex items-center gap-2">
<span class="material-symbols-outlined text-sm text-primary">check_circle</span>
<span class="">UV-treated poly seedling nursery bags with drainage holes</span>
</li>
<li class="flex items-center gap-2">
<span class="material-symbols-outlined text-sm text-primary">check_circle</span>
<span class="">Micro-perforated banana &amp; mango export corrugated box liners</span>
</li>
<li class="flex items-center gap-2">
<span class="material-symbols-outlined text-sm text-primary">check_circle</span>
<span class="">Anti-fog humidity-control fresh vegetable field packaging</span>
</li>
</ul>
</div>
<!-- Product Specs Chipset -->
<div class="flex flex-wrap gap-1.5 font-tech-data text-tech-data">
<span class="px-2 py-1 rounded bg-secondary-container/40 text-on-secondary-fixed-variant">12-24 Mo UV Life</span>
<span class="px-2 py-1 rounded bg-secondary-container/40 text-on-secondary-fixed-variant">Drainage Punch Matrix</span>
<span class="px-2 py-1 rounded bg-secondary-container/40 text-on-secondary-fixed-variant">Ethylene Slowing</span>
</div>
</div>
<div class="pt-2 flex items-center justify-between border-t border-surface-container-high/40">
<div class="flex flex-col">
<span class="font-label-caps text-label-caps text-secondary uppercase">Standard MOQ</span>
<span class="font-tech-data text-tech-data font-bold text-primary">20,000 Pcs / Run</span>
</div>
<a class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg bg-primary-container text-on-primary font-headline-sm text-body-sm font-semibold hover:bg-primary transition-colors" data-path="request-a-quote" href="{{ route('request-a-quote') }}">
<span class="">Agri Specs</span>
<span class="material-symbols-outlined text-base">arrow_forward</span>
</a>
</div>
</div>
</div>
<!-- CARD 06: Industrial & Chemicals -->
<div class="sector-card group flex flex-col bg-surface-container-lowest rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300" data-sector="industrial">
<div class="relative h-60 w-full overflow-hidden bg-surface-dark">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 opacity-90" data-alt="Heavy industrial manufacturing facility with rows of pallets loaded with chemical resin sacks, black heavy-gauge industrial waste bags, and stretch wrapped pallet hoods in an expansive industrial warehouse with forklift traffic and safety yellow line markings" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCdv7c8riUzFO1Bx-22KqU5dQZ7jt5qI852uXQD85aAqP3n7mvVe_KiI7l0bShQEirktzq9fxNG61A2qNrdSXXXYDRlSB7aXCyyLHsDTeUCuw1dfuE232ge1V8eMJsxz7S3S8x8K5F3uva6EP9p9d9P6oBl2xXDkbugFMtgqvQGhjQVeFyhKUUjF44nm53fX2xZwF051QGPZeyxy805lrZLwfaI88vHoRjQ5LtlMfsMldx45JiTOKHXQw">
<div class="absolute inset-0 bg-gradient-to-t from-surface-dark/95 via-surface-dark/40 to-transparent"></div>
<div class="absolute top-4 left-4 flex items-center gap-2">
<span class="px-2.5 py-1 rounded bg-surface-dark/80 backdrop-blur text-tertiary-fixed-dim font-tech-data text-tech-data tracking-wider font-semibold">
                06 / SECTOR
              </span>
<span class="px-2 py-0.5 rounded bg-primary-container text-on-primary font-label-caps text-label-caps uppercase">
                HEAVY GAUGE 7 MIL
              </span>
</div>
<div class="absolute bottom-4 left-4 right-4">
<h3 class="font-headline-md text-headline-md text-on-secondary font-bold leading-tight">
                Industrial &amp; Chemicals
              </h3>
</div>
</div>
<div class="p-6 flex flex-col flex-1 justify-between gap-6">
<div class="flex flex-col gap-4">
<p class="font-body-md text-body-md text-on-surface-variant">
                Anti-static, heavy gauge resin bags, pallet covers, and moisture-shield box liners.
              </p>
<!-- Technical Application Matrix -->
<div class="bg-surface-container-low p-4 rounded-xl flex flex-col gap-2.5">
<span class="font-label-caps text-label-caps uppercase text-secondary tracking-wider font-semibold">Key Applications</span>
<ul class="font-body-sm text-body-sm text-on-surface flex flex-col gap-1.5">
<li class="flex items-center gap-2">
<span class="material-symbols-outlined text-sm text-primary">check_circle</span>
<span class="">Heavy-duty black industrial garbage bags (up to 120 microns)</span>
</li>
<li class="flex items-center gap-2">
<span class="material-symbols-outlined text-sm text-primary">check_circle</span>
<span class="">Pallet gusseted dust hoods &amp; heat-shrink transit shrouds</span>
</li>
<li class="flex items-center gap-2">
<span class="material-symbols-outlined text-sm text-primary">check_circle</span>
<span class="">Layflat continuous centerfold tubing for metal parts &amp; lumber</span>
</li>
</ul>
</div>
<!-- Product Specs Chipset -->
<div class="flex flex-wrap gap-1.5 font-tech-data text-tech-data">
<span class="px-2 py-1 rounded bg-secondary-container/40 text-on-secondary-fixed-variant">High Tensile ASTM D882</span>
<span class="px-2 py-1 rounded bg-secondary-container/40 text-on-secondary-fixed-variant">Anti-Static Additive</span>
<span class="px-2 py-1 rounded bg-secondary-container/40 text-on-secondary-fixed-variant">Heavy Puncture Proof</span>
</div>
</div>
<div class="pt-2 flex items-center justify-between border-t border-surface-container-high/40">
<div class="flex flex-col">
<span class="font-label-caps text-label-caps text-secondary uppercase">Standard MOQ</span>
<span class="font-tech-data text-tech-data font-bold text-primary">500 kg / 5,000 Rolls</span>
</div>
<a class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg bg-primary-container text-on-primary font-headline-sm text-body-sm font-semibold hover:bg-primary transition-colors" data-path="request-a-quote" href="{{ route('request-a-quote') }}">
<span class="">Industrial Specs</span>
<span class="material-symbols-outlined text-base">arrow_forward</span>
</a>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- INTERACTIVE SPECIFICATION & RESIN SELECTOR CALCULATOR -->

<!-- DIRECT FACTORY ADVANTAGE (DSAM VS RESELLERS) -->
<section class="w-full px-6 lg:px-12 py-16 border-t border-b border-surface-container-highest bg-surface-container-highest">
<div class="max-w-7xl mx-auto flex flex-col gap-12">
<div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
<div>
<span class="font-label-caps text-label-caps text-tertiary-container uppercase tracking-widest font-bold block mb-1">
            Commercial Supply-Chain Stability
          </span>
<h2 class="font-headline-lg text-headline-lg font-bold text-primary tracking-tight">
            Direct Manufacturer Procurement vs. Resellers
          </h2>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant max-w-md">
          Why corporate procurement directors, commissary managers, and warehouse operations consolidate with DSAM.
        </p>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
<!-- Benefit 1 -->
<div class="bg-surface-container-lowest border border-surface-container-high/40 p-6 rounded-2xl shadow-sm flex flex-col gap-3 transition-all duration-300 hover:shadow-md">
<div class="w-12 h-12 rounded-xl bg-primary-container text-on-primary flex items-center justify-center shadow-sm">
<span class="material-symbols-outlined text-2xl text-on-primary">trending_down</span>
</div>
<h3 class="font-headline-sm text-headline-sm font-bold text-primary">
            15% - 30% Margin Savings
          </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
            Eliminate distributor brokerages and third-party markup. Procure directly from our active extrusion and conversion floors in San Pedro, Laguna.
          </p>
</div>
<!-- Benefit 2 -->
<div class="bg-surface-container-lowest border border-surface-container-high/40 p-6 rounded-2xl shadow-sm flex flex-col gap-3 transition-all duration-300 hover:shadow-md">
<div class="w-12 h-12 rounded-xl bg-primary-container text-on-primary flex items-center justify-center shadow-sm">
<span class="material-symbols-outlined text-2xl text-on-primary">straighten</span>
</div>
<h3 class="font-headline-sm text-headline-sm font-bold text-primary">
            ±0.002mm Gauge Accuracy
          </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
            Eliminate bag bursting and film tearing. We test tensile yield strength across every masterbatch run using calibrated digital micrometer QA.
          </p>
</div>
<!-- Benefit 3 -->
<div class="bg-surface-container-lowest border border-surface-container-high/40 p-6 rounded-2xl shadow-sm flex flex-col gap-3 transition-all duration-300 hover:shadow-md">
<div class="w-12 h-12 rounded-xl bg-primary-container text-on-primary flex items-center justify-center shadow-sm">
<span class="material-symbols-outlined text-2xl text-on-primary">science</span>
</div>
<h3 class="font-headline-sm text-headline-sm font-bold text-primary">
            Certified Virgin Resins
          </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
            Zero filler compromise. Every shipment is supplied with a certified Certificate of Analysis (COA) guaranteeing food-contact sanitary approval.
          </p>
</div>
<!-- Benefit 4 -->
<div class="bg-surface-container-lowest border border-surface-container-high/40 p-6 rounded-2xl shadow-sm flex flex-col gap-3 transition-all duration-300 hover:shadow-md">
<div class="w-12 h-12 rounded-xl bg-primary-container text-on-primary flex items-center justify-center shadow-sm">
<span class="material-symbols-outlined text-2xl text-on-primary">local_shipping</span>
</div>
<h3 class="font-headline-sm text-headline-sm font-bold text-primary">
            Laguna &amp; NCR Logistics
          </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
            Dedicated DSAM transport trucks dispatch daily across Greater Manila, Laguna Technopark, Cavite export zones, and Batangas distribution hubs.
          </p>
</div>
</div>
</div>
</section>
<!-- BOTTOM PROCUREMENT FAST-TRACK CALLOUT -->
<section class="w-full bg-primary px-6 lg:px-12 py-16 text-on-primary">
<div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center justify-between gap-8 bg-primary-container rounded-3xl p-8 lg:p-12 shadow-xl">
<div class="flex flex-col gap-4 max-w-2xl">
<span class="inline-flex items-center gap-2 font-label-caps text-label-caps text-tertiary-fixed-dim uppercase tracking-wider">
<span class="w-2 h-2 rounded-full bg-status-success"></span>
          DIRECT FACTORY QUOTATION DESK
        </span>
<h2 class="font-headline-lg text-headline-lg font-bold leading-tight">
          Have a High-Volume Packaging Requirement?
        </h2>
<p class="font-body-md text-body-md text-surface-container-highest/90 leading-relaxed">
          Send us your required dimensions (length, width, gusset), gauge microns, and estimated monthly usage. Our San Pedro plant engineers deliver formal commercial proposals within 24 hours.
        </p>
</div>
<div class="flex flex-col sm:flex-row lg:flex-col gap-3 shrink-0 w-full sm:w-auto">
<a class="px-8 py-4 rounded-xl bg-surface-container-lowest text-primary font-headline-sm text-body-md font-bold shadow-lg hover:bg-surface transition-all uppercase tracking-wider text-center" data-path="request-a-quote" href="{{ route('request-a-quote') }}">
          Request a Quote (B2B Fast-Track)
        </a>
<a class="px-8 py-3.5 rounded-xl bg-surface-dark/30 hover:bg-surface-dark/50 text-on-primary font-tech-data text-tech-data font-semibold transition-all text-center flex items-center justify-center gap-2" href="tel:09178339142">
<span class="material-symbols-outlined text-base text-tertiary-fixed-dim">call</span>
<span class="">Plant Direct: 0917 833 9142</span>
</a>
</div>
</div>
</section>
</div>
<script>
  // Sector Filter functionality
  function filterSector(sectorKey) {
    // Update active tab style
    const tabs = document.querySelectorAll('.filter-tab');
    tabs.forEach(tab => {
      tab.classList.remove('bg-primary', 'text-on-primary');
      tab.classList.add('bg-surface-container-lowest', 'text-on-surface');
    });

    const clickedTab = event.currentTarget;
    clickedTab.classList.remove('bg-surface-container-lowest', 'text-on-surface');
    clickedTab.classList.add('bg-primary', 'text-on-primary');

    // Filter cards
    const cards = document.querySelectorAll('.sector-card');
    cards.forEach(card => {
      if (sectorKey === 'all' || card.getAttribute('data-sector') === sectorKey) {
        card.style.display = 'flex';
      } else {
        card.style.display = 'none';
      }
    });
  }

  // Volume state tracker
  let currentVolume = 'pilot';
  function setVolume(vol, btn) {
    currentVolume = vol;
    const btns = document.querySelectorAll('.vol-btn');
    btns.forEach(b => {
      b.classList.remove('bg-primary-container', 'text-on-primary');
      b.classList.add('bg-surface-dark', 'text-surface-variant');
    });
    btn.classList.remove('bg-surface-dark', 'text-surface-variant');
    btn.classList.add('bg-primary-container', 'text-on-primary');
    calculateSpec();
  }

  // Calculation Matrix
  function calculateSpec() {
    const sector = document.getElementById('calc-sector').value;
    const perf = document.getElementById('calc-perf').value;
    
    const resinEl = document.getElementById('res-resin');
    const gaugeEl = document.getElementById('res-gauge');
    const lineEl = document.getElementById('res-line');
    const leadEl = document.getElementById('res-lead');

    // Adjust based on combination
    if (sector === 'food' || perf === 'freezer') {
      resinEl.innerText = "Virgin FDA LLDPE / HDPE Cold-Crack Blend";
      gaugeEl.innerText = "50 - 75 Microns (±0.002)";
      lineEl.innerText = "Blown Clean Extrusion Cell #2";
    } else if (sector === 'takeout' || perf === 'grease') {
      resinEl.innerText = "High-Density Virgin HDPE + Masterbatch Colors";
      gaugeEl.innerText = "25 - 40 Microns (Tensile High)";
      lineEl.innerText = "6-Color Rotogravure + Gusset Line";
    } else if (sector === 'retail' || perf === 'clarity') {
      resinEl.innerText = "Optical Cast PP / Crystal Clear Virgin LDPE";
      gaugeEl.innerText = "35 - 50 Microns (High Gloss)";
      lineEl.innerText = "Slit Sealer & Perforation Cell";
    } else if (sector === 'logistics' || perf === 'tamper') {
      resinEl.innerText = "3-Layer Co-Extruded White/Black Opaque PE";
      gaugeEl.innerText = "60 - 70 Microns (Destructive Hot-Melt)";
      lineEl.innerText = "Automated Pouch & Waybill In-Line";
    } else if (sector === 'agriculture' || perf === 'uv') {
      resinEl.innerText = "Carbon Black & HALS 12-24Mo UV Stabilized PE";
      gaugeEl.innerText = "75 - 100 Microns (UV Resistant)";
      lineEl.innerText = "Punch Matrix Extrusion Floor";
    } else {
      resinEl.innerText = "Heavy-Duty High-Molecular Virgin HDPE / LLDPE";
      gaugeEl.innerText = "80 - 150 Microns (7 Mil Industrial)";
      lineEl.innerText = "Heavy Continuous Blown Extrusion #6";
    }

    if (currentVolume === 'pilot') {
      leadEl.innerText = "3 - 5 Business Days";
    } else if (currentVolume === 'commercial') {
      leadEl.innerText = "5 - 7 Business Days";
    } else {
      leadEl.innerText = "7 - 10 Days (Staggered Fleet Delivery)";
    }
  }
</script></main>@include('partials.site-footer')

</body></html>






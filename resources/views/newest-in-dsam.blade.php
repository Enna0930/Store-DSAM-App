<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Newest in DSAM | Flexible Packaging Facility</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="bg-surface font-body-md text-on-surface antialiased min-h-screen flex flex-col">
    @include('partials.site-header')

    <main class="flex-grow">
        <section class="relative overflow-hidden bg-[#071b3a] text-white py-10 lg:py-14">
            <div class="absolute inset-0 opacity-30 bg-[radial-gradient(rgba(255,255,255,0.3)_1px,transparent_1px)] [background-size:24px_24px]"></div>
            <div class="relative z-10 max-w-7xl mx-auto px-gutter grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                <div class="lg:col-span-6 space-y-6">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-white/10 border border-white/15 rounded font-tech-data text-[11px] uppercase tracking-widest text-tertiary-fixed font-bold">
                        <span class="w-2 h-2 rounded-full bg-status-success"></span>
                        <span class="text-[#fad58b]">NEW DSAM FACILITY</span>
                    </div>
                    <div class="space-y-4">
                        <h1 class="text-3xl lg:text-5xl font-bold tracking-tight leading-tight"><span class="text-[#fad58b]">Flexible Packaging</span><br><span class="text-white">Expansion Project</span></h1>
                        <p class="text-white/85 text-lg leading-relaxed max-w-2xl">A new production capability for high-volume film conversion, bag making, slitting, laminating, and supporting plant operations.</p>
                    </div>
                    <div class="flex flex-wrap gap-3 font-tech-data text-xs uppercase tracking-wider">
                        <span class="px-3 py-2 border border-white/15 bg-white/10 rounded">San Pedro, Laguna</span>
                        <span class="px-3 py-2 border border-white/15 bg-white/10 rounded">Integrated Production</span>
                        <span class="px-3 py-2 border border-white/15 bg-white/10 rounded">Flexible Packaging</span>
                    </div>
                </div>
                <div class="lg:col-span-6">
                    @php
                        $heroProducts = [
                            ['image' => 'laminated-snack-pouches.jpg', 'alt' => 'Colorful laminated snack pouches', 'label' => 'Laminated Packaging', 'title' => 'Snack Food Pouches', 'detail' => 'Solventless lamination and printed film'],
                            ['image' => 'laminated-ham-pouch.jpg', 'alt' => 'Laminated ham packaging pouch', 'label' => 'Food Packaging', 'title' => 'Ham & Meat Pouches', 'detail' => 'Barrier film, lamination, and bag making'],
                            ['image' => 'laminated-meat-pouches.jpg', 'alt' => 'Printed laminated meat packaging pouches', 'label' => 'Printed Pouches', 'title' => 'Retail Meat Packaging', 'detail' => 'Rotogravure printing and pouch conversion'],
                            ['image' => 'laminated-pork-tempura.jpg', 'alt' => 'Printed pork tempura packaging', 'label' => 'Custom Brand Packaging', 'title' => 'Pork Tempura Pouches', 'detail' => 'Custom print, lamination, and sealing'],
                        ];
                    @endphp
                    <div class="newest-hero-carousel relative rounded-xl overflow-hidden border border-white/15 bg-white/5 shadow-2xl" data-carousel-interval="3000">
                        @foreach ($heroProducts as $index => $product)
                            <figure class="newest-hero-slide {{ $index === 0 ? '' : 'hidden' }} relative flex h-[370px] flex-col bg-white lg:h-[460px]" data-carousel-slide>
                                <img src="{{ asset('images/flexible-packaging/products/' . $product['image']) }}" alt="{{ $product['alt'] }}" class="h-[245px] w-full flex-none object-contain bg-white p-3 lg:h-[320px] lg:p-4" loading="eager">
                                <figcaption class="relative inset-auto mx-3 mb-3 mt-auto rounded-lg border border-white/20 bg-[#061936] p-4 text-white shadow-2xl ring-1 ring-black/30 sm:mx-4 sm:mb-4">
                                    <div class="flex items-center justify-between gap-3">
                                        <div>
                                            <span class="inline-block rounded bg-[#fad58b] px-2 py-1 font-tech-data text-[10px] uppercase tracking-widest text-[#061936] font-bold">{{ $product['label'] }}</span>
                                            <h2 class="mt-2 text-lg font-bold leading-tight text-white">{{ $product['title'] }}</h2>
                                            <p class="mt-1 font-tech-data text-xs leading-relaxed text-white/85">{{ $product['detail'] }}</p>
                                        </div>
                                        <span class="material-symbols-outlined text-tertiary-fixed text-2xl">verified</span>
                                    </div>
                                </figcaption>
                            </figure>
                        @endforeach
                        <div class="absolute top-4 right-4 flex gap-1.5" aria-label="Product carousel slides">
                            @foreach ($heroProducts as $index => $product)
                                <span class="newest-hero-dot {{ $index === 0 ? 'bg-tertiary-fixed' : 'bg-white/40' }} h-1.5 w-6 rounded-full transition-colors" data-carousel-dot></span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-16 lg:py-20 bg-surface-container-low">
            <div class="max-w-7xl mx-auto px-gutter">
                <div class="max-w-3xl mb-10">
                    <span class="font-tech-data text-xs uppercase tracking-widest text-primary font-bold">FACILITY EQUIPMENT</span>
                    <h2 class="text-3xl lg:text-4xl font-bold text-primary mt-2">Machines supporting the new production line</h2>
                    <p class="text-on-surface-variant mt-3 leading-relaxed">The equipment shown below is based on the supplied flexible-packaging machine proposal. Each station supports a defined conversion, finishing, or plant-support function.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                    @php
                        $machines = [
                            ['name' => 'Prolami-SL Solventless Laminator', 'role' => 'Lamination', 'image' => 'solventless-laminator.png', 'description' => 'Joins film layers into stronger barrier structures for laminated packaging and pouches.', 'outputs' => 'Laminated film, barrier packaging, pouch stock'],
                            ['name' => 'WSD-600C Automatic Bag Making Machine', 'role' => 'Bag Making', 'image' => 'automatic-bag-making.jpeg', 'description' => 'Automates bag forming, sealing, and cutting for repeatable high-volume output.', 'outputs' => 'Flat bags, liners, custom converted bags'],
                            ['name' => 'IS-1300E Slitting Machine', 'role' => 'Slitting & Rewinding', 'image' => 'slitting-is1300e.jpeg', 'description' => 'Converts master rolls into accurately sized rolls ready for printing, lamination, or bag making.', 'outputs' => 'Narrow film rolls, rollstock, slit reels'],
                            ['name' => 'RX-750-1070-C Three-Fold Bag Machine', 'role' => 'Garbage Bag Making', 'image' => 'three-fold-garbage-bag-machine.png', 'description' => 'Produces folded flat garbage bags with automated sealing and cutting.', 'outputs' => 'Flat garbage bags, waste liners, utility bags'],
                            ['name' => 'Pelletizer Machine', 'role' => 'Material Recovery', 'image' => 'pelletizer.png', 'description' => 'Processes suitable plastic scrap into reusable pelletized material for controlled production use.', 'outputs' => 'Plastic pellets, recovered resin feedstock'],
                            ['name' => 'Punch-Hole Machine', 'role' => 'Perforation', 'image' => 'punch-hole-machine.png', 'description' => 'Adds repeatable punched features for handles, ventilation, drainage, and specialized bag designs.', 'outputs' => 'Handle bags, grow bags, perforated film'],
                            ['name' => 'Lathe Machine', 'role' => 'Tooling Support', 'image' => 'lathe-machine.png', 'description' => 'Supports in-house fabrication and maintenance of cylindrical machine and tooling components.', 'outputs' => 'Tooling parts, shafts, maintenance components'],
                            ['name' => '20 HP Screw-Type Compressor', 'role' => 'Plant Utility', 'image' => 'screw-compressor.png', 'description' => 'Provides compressed air for reliable operation of production and automation equipment.', 'outputs' => 'Production-line pneumatic support'],
                        ];
                    @endphp
                    @foreach ($machines as $machine)
                        <article class="bg-surface-container-lowest border border-border-technical rounded-lg overflow-hidden shadow-sm flex flex-col">
                            <div class="h-56 bg-white flex items-center justify-center overflow-hidden">
                                <img src="{{ asset('images/flexible-packaging/' . $machine['image']) }}" alt="{{ $machine['name'] }}" class="w-full h-full object-contain">
                            </div>
                            <div class="p-5 flex flex-col flex-grow">
                                <span class="font-tech-data text-[10px] uppercase tracking-widest text-primary font-bold">{{ $machine['role'] }}</span>
                                <h3 class="text-lg font-bold text-primary mt-2">{{ $machine['name'] }}</h3>
                                <p class="text-sm text-on-surface-variant leading-relaxed mt-2">{{ $machine['description'] }}</p>
                                <div class="mt-auto pt-4 border-t border-border-technical mt-5">
                                    <span class="text-[11px] text-secondary uppercase tracking-wider font-bold">Can produce / support</span>
                                    <p class="text-sm text-on-surface mt-1">{{ $machine['outputs'] }}</p>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="py-16 lg:py-20 bg-surface">
            <div class="max-w-7xl mx-auto px-gutter grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
                <div class="lg:col-span-7">
                    <span class="font-tech-data text-xs uppercase tracking-widest text-primary font-bold">PRODUCT OUTPUTS</span>
                    <h2 class="text-3xl font-bold text-primary mt-2">What this facility enables DSAM to create</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-8">
                        @foreach (['Laminated flexible packaging', 'Custom flat and converted bags', 'Garbage bags and waste liners', 'Slit film rolls and rollstock', 'Perforated and punched bags', 'Barrier and multi-layer packaging'] as $product)
                            <div class="flex items-start gap-3 p-4 border border-border-technical rounded-lg bg-surface-container-lowest">
                                <span class="material-symbols-outlined text-status-success">check_circle</span>
                                <span class="font-semibold text-primary">{{ $product }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="lg:col-span-5 bg-[#071b3a] text-white rounded-xl p-7 shadow-xl">
                    <span class="font-tech-data text-xs uppercase tracking-widest text-tertiary-fixed font-bold">PROJECT CONTEXT</span>
                    <h2 class="text-2xl font-bold mt-2">Built for dependable conversion capacity</h2>
                    <p class="text-white/80 leading-relaxed mt-4">The new facility expands DSAM’s ability to move from film and rollstock into finished packaging with more in-house control over finishing, sizing, perforation, lamination, and plant support.</p>
                    <a href="{{ route('request-a-quote') }}" class="inline-flex items-center gap-2 mt-6 px-5 py-3 bg-tertiary-fixed text-on-tertiary-fixed font-bold rounded-lg hover:bg-tertiary-fixed-dim transition-colors">Discuss a packaging requirement <span class="material-symbols-outlined text-base">arrow_forward</span></a>
                </div>
            </div>
        </section>
    </main>

    @include('partials.site-footer')
</body>
</html>


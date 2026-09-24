<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DSAM Quotation Summary Reports</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-100 text-slate-900">
    <header class="bg-[#051329] text-white">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-6 px-6 py-4">
            <div>
                <p class="text-xs uppercase tracking-[0.18em] text-amber-300">DSAM Executive Command Gateway</p>
                <h1 class="text-xl font-bold">Quotation Summary Reports</h1>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.dashboard') }}" class="rounded border border-slate-500 px-3 py-2 text-sm font-semibold text-white hover:bg-white hover:text-[#051329]">Back to dashboard</a>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button class="rounded border border-slate-500 px-3 py-2 text-sm font-semibold text-white hover:bg-white hover:text-[#051329]" type="submit">Log out</button>
                </form>
            </div>
        </div>
    </header>

    <main class="mx-auto max-w-7xl px-6 py-10">
        <div class="mb-8">
            <span class="inline-flex rounded bg-emerald-100 px-3 py-1 text-xs font-bold uppercase tracking-wider text-emerald-800">Approved quotation monitoring</span>
            <h2 class="mt-3 text-3xl font-bold text-[#002868]">Quotation Summary Reports</h2>
            <p class="mt-2 max-w-3xl text-slate-600">Monitor GM-approved quotations and their total quoted value across daily, weekly, and monthly approval periods.</p>
        </div>

        <div class="mb-6 flex flex-wrap gap-2">
            @foreach (['daily' => 'Today', 'weekly' => 'This week', 'monthly' => 'This month'] as $key => $label)
                <a href="{{ route('admin.reports.quotations', ['period' => $key]) }}" class="rounded border px-4 py-2 text-sm font-bold {{ $period === $key ? 'border-[#0a3d91] bg-[#0a3d91] text-white' : 'border-slate-300 bg-white text-[#002868] hover:bg-blue-50' }}">{{ $label }}</a>
            @endforeach
        </div>

        <p class="mb-5 text-sm text-slate-600">Reporting period: <strong>{{ $from->format('M d, Y g:i A') }}</strong> to <strong>{{ $to->format('M d, Y g:i A') }}</strong></p>

        <section class="grid gap-5 md:grid-cols-3">
            <article class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm"><p class="text-xs font-bold uppercase tracking-wider text-slate-500">Approved quotations</p><p class="mt-2 text-3xl font-bold text-[#002868]">{{ number_format($quotes->count()) }}</p><p class="mt-2 text-sm text-slate-600">GM-approved quotation records in this period.</p></article>
            <article class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm"><p class="text-xs font-bold uppercase tracking-wider text-slate-500">Total quoted value</p><p class="mt-2 text-3xl font-bold text-emerald-700">PHP {{ number_format($totalValue, 2) }}</p><p class="mt-2 text-sm text-slate-600">Based on the saved Tier 1 quotation total.</p></article>
            <article class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm"><p class="text-xs font-bold uppercase tracking-wider text-slate-500">Total quoted quantity</p><p class="mt-2 text-3xl font-bold text-[#002868]">{{ number_format($totalQuantity) }}</p><p class="mt-2 text-sm text-slate-600">Units represented by the approved quotations.</p></article>
        </section>

        <section class="mt-8 rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
            <h3 class="text-lg font-bold text-[#002868]">Daily activity summary</h3>
            <div class="mt-4 overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="bg-slate-100 text-xs uppercase tracking-wider text-slate-600"><tr><th class="px-4 py-3">Date</th><th class="px-4 py-3">Approved quotations</th><th class="px-4 py-3">Quoted value</th></tr></thead>
                    <tbody>
                        @forelse ($dailySummary as $summary)
                            <tr class="border-t border-slate-200"><td class="px-4 py-3 font-semibold">{{ \Illuminate\Support\Carbon::parse($summary['date'])->format('M d, Y') }}</td><td class="px-4 py-3">{{ number_format($summary['count']) }}</td><td class="px-4 py-3 font-bold text-[#002868]">PHP {{ number_format($summary['value'], 2) }}</td></tr>
                        @empty
                            <tr><td class="px-4 py-5 text-slate-600" colspan="3">No approved quotations were recorded in this period.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

        <section class="mt-8 rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
            <h3 class="text-lg font-bold text-[#002868]">Approved quotation records</h3>
            <div class="mt-4 space-y-3">
                @forelse ($quotes as $quote)
                    <div class="flex flex-col gap-3 rounded border border-slate-200 bg-slate-50 p-4 sm:flex-row sm:items-center sm:justify-between">
                        @php
                            $reportQuantity = $quote->pricing ? (int) $quote->pricing->quantity : $quote->items->sum(fn ($item) => (int) ($item->pricing?->quantity ?? 0));
                            $reportValue = $quote->pricing ? (float) $quote->pricing->total_estimate : $quote->items->sum(fn ($item) => (float) ($item->pricing?->total_estimate ?? 0));
                        @endphp
                        <div><p class="font-semibold text-[#002868]">{{ $quote->reference }}</p><p class="text-sm text-slate-700">{{ $quote->client_name }} · {{ $quote->product_category }}</p><p class="text-xs text-slate-500">Approved {{ $quote->approved_at->format('M d, Y g:i A') }} · Total quoted quantity {{ number_format($reportQuantity) }}</p></div>
                        <div class="text-left sm:text-right"><p class="text-lg font-bold text-emerald-700">PHP {{ number_format($reportValue, 2) }}</p><a href="{{ route('quote-requests.pdf', $quote) }}" target="_blank" rel="noopener" title="Open the print-ready quotation in a new tab" class="inline-flex rounded bg-[#0a3d91] px-3 py-2 text-xs font-bold text-white hover:bg-[#002868]">View / Print approved quotation</a></div>
                    </div>
                @empty
                    <p class="text-sm text-slate-600">No approved quotations were recorded in this period.</p>
                @endforelse
            </div>
        </section>
    </main>
</body>
</html>

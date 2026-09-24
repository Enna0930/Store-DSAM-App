<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DSAM Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-100 text-slate-900">
    <header class="bg-[#051329] text-white">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between gap-6">
            <div>
                <p class="text-xs uppercase tracking-[0.18em] text-amber-300">DSAM Executive Command Gateway</p>
                <h1 class="text-xl font-bold">{{ $user->department }}</h1>
            </div>
            <div class="flex items-center gap-4">
                <div class="text-right">
                    <p class="text-sm font-semibold">{{ $user->name }}</p>
                    <p class="text-xs text-slate-300 uppercase tracking-wider">{{ str_replace('_', ' ', $user->role_level) }}</p>
                </div>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button class="rounded border border-slate-500 px-3 py-2 text-sm font-semibold text-white hover:bg-white hover:text-[#051329]" type="submit">Log out</button>
                </form>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6 py-10">
        @if (session('status'))
            <div class="mb-6 rounded border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-semibold text-emerald-800">{{ session('status') }}</div>
        @endif
        <div class="mb-8">
            <span class="inline-flex items-center gap-2 rounded bg-emerald-100 px-3 py-1 text-xs font-bold uppercase tracking-wider text-emerald-800">Approved admin session</span>
            <h2 class="mt-3 text-3xl font-bold text-[#002868]">{{ $user->department }} Administration</h2>
            <p class="mt-2 max-w-2xl text-slate-600">This workspace is restricted to approved DSAM personnel. Available controls follow your assigned department and role hierarchy.</p>
        </div>

        <section class="grid gap-5 md:grid-cols-3">
            <article class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-xs font-bold uppercase tracking-wider text-slate-500">Access level</p>
                <p class="mt-2 text-2xl font-bold text-[#002868]">{{ ucwords(str_replace('_', ' ', $user->role_level)) }}</p>
                <p class="mt-2 text-sm text-slate-600">Approved by the executive administration board.</p>
            </article>
            <article class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-xs font-bold uppercase tracking-wider text-slate-500">Department terminal</p>
                <p class="mt-2 text-2xl font-bold text-[#002868]">Active</p>
                <p class="mt-2 text-sm text-slate-600">San Pedro, Laguna Plant 01.</p>
            </article>
            <article class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-xs font-bold uppercase tracking-wider text-slate-500">Security</p>
                <p class="mt-2 text-2xl font-bold text-emerald-700">Verified</p>
                <p class="mt-2 text-sm text-slate-600">Authenticated session with encrypted credentials.</p>
            </article>
        </section>

        <section class="mt-8 rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
            <h3 class="text-lg font-bold text-[#002868]">Department controls</h3>
            <p id="dashboard-control-status" class="mt-2 hidden rounded border border-blue-100 bg-blue-50 px-3 py-2 text-sm text-blue-800"></p>
            <div class="mt-4 grid gap-3 sm:grid-cols-2 lg:grid-cols-4">
                <button type="button" data-dashboard-action="newest" class="dashboard-control rounded border border-slate-200 bg-slate-50 px-4 py-3 text-left text-sm font-semibold text-slate-700 hover:border-[#0a3d91] hover:bg-blue-50">Production telemetry</button>
                <button type="button" data-dashboard-action="quotation" class="dashboard-control rounded border border-slate-200 bg-slate-50 px-4 py-3 text-left text-sm font-semibold text-slate-700 hover:border-[#0a3d91] hover:bg-blue-50">Quotation queue</button>
                <button type="button" data-dashboard-action="department" class="dashboard-control rounded border border-slate-200 bg-slate-50 px-4 py-3 text-left text-sm font-semibold text-slate-700 hover:border-[#0a3d91] hover:bg-blue-50">Department requests</button>
                <a href="{{ route('admin.reports.quotations') }}" class="dashboard-control rounded border border-slate-200 bg-slate-50 px-4 py-3 text-left text-sm font-semibold text-slate-700 hover:border-[#0a3d91] hover:bg-blue-50">Quotation summary reports</a>
            </div>
        </section>

        @if ($canViewQuotes)
            <section id="quotation-requests" class="mt-8 hidden rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
                <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-[#002868]">Quotation requests</h3>
                        <p class="mt-1 text-sm text-slate-600">Client-submitted packaging requirements routed to quotation and production review.</p>
                    </div>
                    <span class="rounded bg-blue-50 px-3 py-1 text-xs font-bold uppercase tracking-wider text-[#0a3d91]">{{ $quoteRequests->count() }} recorded</span>
                </div>
                <div class="mt-4 space-y-3">
                    @forelse ($quoteRequests as $quote)
                        <article class="rounded border border-slate-200 bg-slate-50 p-4">
                            <div class="flex flex-col gap-3 lg:flex-row lg:items-start lg:justify-between">
                                <div>
                                    <div class="flex flex-wrap items-center gap-2">
                                        <p class="font-semibold text-slate-900">{{ $quote->reference }}</p>
                                        <span class="rounded {{ $quote->status === 'approved' ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-800' }} px-2 py-0.5 text-xs font-bold uppercase">{{ str_replace('_', ' ', $quote->status) }}</span>
                                    </div>
                                    <p class="mt-1 text-sm font-semibold text-[#002868]">{{ $quote->product_category }}</p>
                                    <p class="text-sm text-slate-600">{{ $quote->client_name }} · {{ $quote->client_email }} · {{ $quote->client_phone }}</p>
                                    <p class="mt-2 text-sm text-slate-700">Material: {{ $quote->material_type ?: 'Not specified' }} · Quantity: {{ $quote->target_quantity ?: 'Not specified' }} · Dimensions: {{ $quote->dimensions_size ?: 'Not specified' }}</p>
                                    @if ($quote->items->count() > 1)
                                        <div class="mt-3 rounded border border-slate-200 bg-white p-3">
                                            <p class="text-xs font-bold uppercase tracking-wider text-slate-500">{{ $quote->items->count() }} requested specification items</p>
                                            <div class="mt-2 space-y-2">
                                                @foreach ($quote->items as $item)
                                                    <div class="border-t border-slate-100 pt-2 text-xs text-slate-700"><span class="font-semibold text-[#002868]">Item {{ $item->item_number }}:</span> {{ $item->product_category }} · {{ $item->material_type ?: 'Material not specified' }} · Qty {{ $item->target_quantity ?: 'Not specified' }} · {{ $item->dimensions_size ?: 'Size not specified' }} · {{ $item->print_type ?: 'Print not specified' }}</div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex shrink-0 flex-col items-end gap-2">
                                    <time class="text-xs text-slate-500" datetime="{{ $quote->created_at->toIso8601String() }}">{{ $quote->created_at->format('M d, Y g:i A') }}</time>
                                </div>
                            </div>
                            @if ($quote->sample_file_path)
                                <div class="mt-4 border-t border-slate-200 pt-4">
                                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500">Client-uploaded reference</p>
                                    @if (preg_match('/\.(jpe?g|png)$/i', $quote->sample_file_path))
                                        <a href="{{ route('quote-requests.sample', $quote) }}" target="_blank" rel="noopener" class="mt-2 inline-block">
                                            <img src="{{ route('quote-requests.sample', $quote) }}" alt="Uploaded reference for {{ $quote->reference }}" class="max-h-64 max-w-full rounded border border-slate-300 object-contain">
                                        </a>
                                    @else
                                        <a href="{{ route('quote-requests.sample', $quote) }}" target="_blank" rel="noopener" class="mt-2 inline-flex items-center rounded border border-slate-300 bg-white px-3 py-2 text-sm font-semibold text-[#0a3d91] hover:bg-blue-50">View uploaded PDF reference</a>
                                    @endif
                                </div>
                            @endif
                            @if ($quote->items->count() > 1)
                                <div class="mt-4 space-y-3 border-t border-slate-200 pt-4">
                                    <p class="text-sm font-bold text-[#002868]">Quote each requested specification</p>
                                    @foreach ($quote->items as $item)
                                        <details class="rounded border border-slate-200 bg-white p-3">
                                            <summary data-quote-spec-toggle class="flex cursor-pointer list-none items-center justify-between gap-3 text-sm font-bold text-[#002868]">
                                                <span>Item {{ $item->item_number }} · {{ $item->product_category }}</span>
                                                <span class="rounded bg-blue-50 px-3 py-1 text-xs font-bold uppercase text-[#0a3d91]">{{ $item->pricing ? 'Priced' : 'Quote this spec' }}</span>
                                            </summary>
                                            @include('admin-quote-pricing-form', ['quote' => $quote, 'item' => $item])
                                        </details>
                                    @endforeach
                                </div>
                            @else
                                <details class="mt-4 border-t border-slate-200 pt-4" {{ $quote->pricing ? 'open' : '' }}>
                                    <summary class="cursor-pointer text-sm font-bold text-[#002868]">Pricing calculator</summary>
                                    @include('admin-quote-pricing-form', ['quote' => $quote, 'item' => null])
                                </details>
                            @endif

                            @if (($quote->items->count() > 1 && $quote->items->every(fn ($item) => $item->pricing && $item->pricingTiers->count() === 3)) || ($quote->items->count() <= 1 && $quote->pricingTiers->isNotEmpty()))
                                    <div class="mt-3 flex flex-wrap justify-end gap-2">
                                        <a class="inline-flex items-center gap-2 rounded bg-[#0a3d91] px-4 py-2 text-sm font-bold text-white hover:bg-[#002868]" href="{{ route('quote-requests.pdf', $quote) }}" target="_blank" rel="noopener" title="Open the print-ready quotation in a new tab"><span aria-hidden="true">PDF</span> View / Print Formal Quotation</a>
                                        @if ($quote->status !== 'approved' && ($user->username === 'sonnymata' || $user->role_level === 'executive'))
                                            <form method="POST" action="{{ route('quote-requests.approve', $quote) }}">
                                                @csrf
                                                <button class="inline-flex items-center gap-2 rounded bg-emerald-700 px-4 py-2 text-sm font-bold text-white hover:bg-emerald-800" type="submit">Approve quotation</button>
                                            </form>
                                        @elseif ($quote->status === 'approved')
                                            <span class="inline-flex items-center rounded bg-emerald-100 px-4 py-2 text-sm font-bold text-emerald-800">Approved {{ $quote->approved_at?->format('M d, Y') }}</span>
                                        @endif
                                    </div>
                            @endif
                            @if ($quote->other_notes)
                                <p class="mt-3 border-t border-slate-200 pt-3 text-sm text-slate-600">{{ $quote->other_notes }}</p>
                            @endif
                        </article>
                    @empty
                        <p class="text-sm text-slate-600">No quotation requests have been submitted yet.</p>
                    @endforelse
                </div>
            </section>
        @endif

        @if ($user->username === 'sonnymata' || $user->role_level === 'executive')
            <section id="department-requests" class="mt-8 hidden rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
                <h3 class="text-lg font-bold text-[#002868]">Pending account approvals</h3>
                <div class="mt-4 space-y-3">
                    @forelse ($pendingAccounts as $account)
                        <div data-pending-account data-created-at="{{ $account->created_at?->timestamp ?? 0 }}" data-account-name="{{ strtolower($account->name) }}" class="flex flex-col gap-3 rounded border border-slate-200 bg-slate-50 p-4 sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <p class="font-semibold">{{ $account->name }} <span class="text-slate-500">({{ $account->account_type }})</span></p>
                                <p class="text-sm text-slate-600">{{ $account->username ?? $account->email }} · {{ $account->department ?? 'Client account' }}</p>
                            </div>
                            <div class="flex flex-wrap items-center justify-end gap-2">
                                <form method="POST" action="{{ route('admin.approvals.approve', $account) }}">
                                    @csrf
                                    <button class="rounded bg-[#0a3d91] px-4 py-2 text-sm font-bold text-white hover:bg-[#002868]" type="submit">Approve account</button>
                                </form>
                                <form method="POST" action="{{ route('admin.approvals.disapprove', $account) }}" class="flex items-center gap-2">
                                    @csrf
                                    <input class="w-44 rounded border border-slate-300 px-2 py-2 text-xs" name="reason" placeholder="Reason (optional)" type="text">
                                    <button class="rounded border border-red-300 bg-white px-4 py-2 text-sm font-bold text-red-700 hover:bg-red-50" type="submit">Disapprove</button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-slate-600">No accounts are waiting for executive approval.</p>
                    @endforelse
                </div>
            </section>
        @endif
    </main>
    <script>
        document.querySelectorAll('[data-quote-spec-toggle]').forEach((summary) => {
            summary.addEventListener('click', (event) => {
                event.preventDefault();
                const details = summary.closest('details');
                if (details) details.open = !details.open;
            });
        });

        document.querySelectorAll('[data-dashboard-action]').forEach((control) => {
            control.addEventListener('click', () => {
                document.querySelectorAll('.dashboard-control').forEach((item) => item.classList.remove('border-[#0a3d91]', 'bg-blue-50'));
                control.classList.add('border-[#0a3d91]', 'bg-blue-50');

                const status = document.getElementById('dashboard-control-status');
                const departmentRequests = document.getElementById('department-requests');
                const quotationRequests = document.getElementById('quotation-requests');
                if (control.dataset.dashboardAction !== 'quotation') {
                    quotationRequests?.classList.add('hidden');
                }
                if (control.dataset.dashboardAction !== 'department') {
                    departmentRequests?.classList.add('hidden');
                }
                const accounts = document.querySelector('[data-pending-account]')?.parentElement;
                const items = accounts ? [...accounts.querySelectorAll('[data-pending-account]')] : [];

                if (control.dataset.dashboardAction === 'quotation') {
                    const target = document.getElementById('quotation-requests');
                    if (target) {
                        target.classList.remove('hidden');
                        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        status?.classList.add('hidden');
                    } else if (status) {
                        status.textContent = 'Quotation queue access is not assigned to this department.';
                        status.classList.remove('hidden');
                    }
                    return;
                }

                if (control.dataset.dashboardAction === 'department') {
                    const target = document.getElementById('department-requests');
                    if (target) {
                        target.classList.remove('hidden');
                        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        status?.classList.add('hidden');
                    } else if (status) {
                        status.textContent = 'Department approval requests are restricted to General Management / Executive.';
                        status.classList.remove('hidden');
                    }
                }

                if (!items.length) {
                    if (status) {
                        status.textContent = 'No pending account records are available for sorting in this department.';
                        status.classList.remove('hidden');
                    }
                    return;
                }

                if (control.dataset.dashboardAction === 'newest') {
                    items.sort((a, b) => Number(b.dataset.createdAt) - Number(a.dataset.createdAt));
                }

                if (control.dataset.dashboardAction === 'alphabetical') {
                    items.sort((a, b) => a.dataset.accountName.localeCompare(b.dataset.accountName));
                }

                items.forEach((item) => accounts.appendChild(item));
                status?.classList.add('hidden');
            });
        });
    </script>
</body>
</html>

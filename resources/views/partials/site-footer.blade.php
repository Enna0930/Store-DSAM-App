<footer class="site-footer w-full bg-[#061936] text-white border-t border-white/10">
    <div class="max-w-7xl mx-auto px-gutter pt-16 pb-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
            <div class="space-y-4">
                <div class="inline-flex items-center justify-center mb-2 w-[130px] h-[72px] bg-white rounded-lg shadow-sm p-2 overflow-hidden">
                    <img src="{{ asset('images/dsam-logo.png') }}" alt="DSAM Plastic Packaging Manufacturing Logo" class="w-full h-full object-contain">
                </div>
                <p class="font-body-sm text-body-sm text-surface-subtle leading-relaxed">Your reliable plastic packaging partner. Established Philippine manufacturing serving retail, food, agriculture, courier, and industrial sectors.</p>
                <div class="pt-2 space-y-2.5 font-tech-data text-tech-data text-surface-subtle">
                    <div class="flex items-start gap-2"><span class="material-symbols-outlined text-tertiary-fixed text-base mt-0.5">location_on</span><span>Cataquiz Ave., Cataquiz Subd. III, Brgy. Landayan, San Pedro, Laguna</span></div>
                    <div class="flex items-center gap-2"><span class="material-symbols-outlined text-tertiary-fixed text-base">call</span><span>0917 833 9142</span></div>
                    <div class="flex items-center gap-2"><span class="material-symbols-outlined text-tertiary-fixed text-base">mail</span><span>contact@dsam-packaging.com</span></div>
                </div>
            </div>

            <div class="space-y-4">
                <h4 class="font-headline-sm text-base font-bold text-white mb-5 tracking-tight border-b border-white/10 pb-2 flex items-center gap-2"><span class="material-symbols-outlined text-tertiary-fixed text-[18px]">precision_manufacturing</span>Company &amp; Capabilities</h4>
                <ul class="space-y-2 font-body-sm text-body-sm text-surface-subtle">
                    <li><a href="{{ route('home') }}" class="hover:text-tertiary-fixed transition-colors flex items-center gap-1.5"><span class="text-tertiary-fixed-dim font-bold">&gt;</span>About DSAM</a></li>
                    <li><a href="{{ route('manufacturing') }}" class="hover:text-tertiary-fixed transition-colors flex items-center gap-1.5"><span class="text-tertiary-fixed-dim font-bold">&gt;</span>Our Machine</a></li>
                    <li><a href="{{ route('materials') }}" class="hover:text-tertiary-fixed transition-colors flex items-center gap-1.5"><span class="text-tertiary-fixed-dim font-bold">&gt;</span>Quality &amp; Inspection</a></li>
                    <li><a href="{{ url('/newest-in-dsam') }}" class="hover:text-tertiary-fixed transition-colors flex items-center gap-1.5"><span class="text-tertiary-fixed-dim font-bold">&gt;</span>Newest in DSAM</a></li>
                </ul>
            </div>

            <div class="space-y-4">
                <h4 class="font-headline-sm text-base font-bold text-white mb-5 tracking-tight border-b border-white/10 pb-2 flex items-center gap-2"><span class="material-symbols-outlined text-tertiary-fixed text-[18px]">handshake</span>Direct B2B Procurement</h4>
                <div class="space-y-3">
                    <a href="{{ url('/request-a-quote') }}" class="p-3 bg-white/5 hover:bg-white/10 border border-white/10 rounded-lg flex items-center justify-between transition-colors group"><span class="font-tech-data text-tech-data text-white font-medium">Request a Formal Quote</span><span class="material-symbols-outlined text-tertiary-fixed text-base">description</span></a>
                    <div class="p-3 bg-surface-dark border border-white/15 rounded-lg space-y-1.5">
                        <div class="flex items-center gap-2 text-white font-semibold"><span class="material-symbols-outlined text-tertiary-fixed-dim text-sm">support_agent</span><span>Sales &amp; RFQ</span></div>
                        <a class="block text-surface-subtle hover:text-tertiary-fixed-dim transition-colors text-xs break-all" href="mailto:generaldirector@dsammanufacturing.com">generaldirector@dsammanufacturing.com</a>
                        <a class="block text-surface-subtle hover:text-tertiary-fixed-dim transition-colors text-xs break-all" href="mailto:production.staff@dsammanufacturing.com">production.staff@dsammanufacturing.com</a>
                        <a class="block text-surface-subtle hover:text-tertiary-fixed-dim transition-colors text-xs" href="tel:09178339142">0917 833 9142</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-8 border-t border-white/10 flex flex-col md:flex-row items-center justify-between gap-4 font-tech-data text-[12px] text-surface-subtle">
            <p>© 2026 DSAM Plastic Packaging Manufacturing. All Rights Reserved.</p>
            <div class="flex items-center gap-4"><span>Privacy Policy</span><span>•</span><span>Terms &amp; Specifications</span><span>•</span><span class="text-tertiary-fixed font-semibold">PHILIPPINE MANUFACTURER</span></div>
        </div>
    </div>
</footer>

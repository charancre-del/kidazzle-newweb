<?php
/**
 * WIMPER Chassis - The Lift Section
 *
 * @package wimper
 */
?>

<!-- SECTION: THE LIFT -->
<div class="max-w-6xl mx-auto px-4 py-24">
    <div class="mb-32">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-20 items-center">
            <div class="order-2 md:order-1">
                <div class="relative">
                    <div class="absolute inset-0 bg-gold/10 transform translate-x-4 translate-y-4"></div>
                    <div class="bg-navy p-12 text-white relative z-10">
                        <h3 class="text-2xl font-serif mb-8 text-white">Your Team's Lift: <span
                                class="text-gold">Light.</span></h3>
                        <p class="text-slate-400 text-sm mb-6">We handle the actuarial complexity. Your team handles
                            standard payroll processing.</p>
                        <ul class="space-y-6">
                            <li class="flex items-start">
                                <span class="text-gold font-bold mr-4 text-lg">01.</span>
                                <div>
                                    <strong class="text-white text-sm block mb-1">Data Ingestion</strong>
                                    <p class="text-xs text-slate-400 leading-relaxed">Send us a census file (CSV). That
                                        is your primary data entry task.</p>
                                </div>
                            </li>
                            <li class="flex items-start">
                                <span class="text-gold font-bold mr-4 text-lg">02.</span>
                                <div>
                                    <strong class="text-white text-sm block mb-1">The Handshake</strong>
                                    <p class="text-xs text-slate-400 leading-relaxed">One 30-minute integration call
                                        with your payroll provider (ADP, Paychex, etc.) where we lead the technical
                                        setup.</p>
                                </div>
                            </li>
                            <li class="flex items-start">
                                <span class="text-gold font-bold mr-4 text-lg">03.</span>
                                <div>
                                    <strong class="text-white text-sm block mb-1">The Routine</strong>
                                    <p class="text-xs text-slate-400 leading-relaxed">Processing the monthly deduction
                                        during your standard payroll cycle.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="order-1 md:order-2">
                <h2 class="text-4xl font-serif text-navy mb-6">We Make The Complex Simple.</h2>
                <p class="text-slate-600 leading-relaxed mb-6 text-lg">
                    Think of this like "Teaching Coding to Babies." The tax code is incredibly complex (Python/C++), but
                    the interface we give you is blocks and shapes.
                </p>
                <p class="text-slate-600 leading-relaxed mb-8 text-lg">
                    We have already built the Plan Documents, the Adjudication Logic, and the Compliance Shield. You
                    simply plug your payroll into our chassis. We handle the heavy actuarial lifting so your HR team
                    doesn't have to become tax experts.
                </p>
                <div class="flex items-center space-x-4">
                    <i class="fas fa-check-circle text-green-600 text-2xl"></i>
                    <span class="font-bold text-navy">Fully Managed Compliance Service</span>
                </div>
                <div class="mt-8">
                    <a href="<?php echo home_url('/contact'); ?>"
                        class="inline-flex items-center text-navy font-bold hover:text-gold transition border-b border-navy hover:border-gold pb-1">
                        Request Audit <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .text-navy {
        color: #020617;
    }

    .text-gold {
        color: #d4af37;
    }

    .bg-gold {
        background-color: #d4af37;
    }

    .bg-navy {
        background-color: #020617;
    }
</style>
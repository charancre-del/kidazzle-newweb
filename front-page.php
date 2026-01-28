<?php
/**
 * Front Page Template - WIMPER SPA
 *
 * @package wimper
 */

get_header();
?>

<!-- ================================================================================= -->
<!-- VIEW 1: HOME (THE VISION)                                                         -->
<!-- ================================================================================= -->
<div id="home" class="page-view active flex-grow">
    <!-- Hero -->
    <section class="hero-gradient text-white pt-52 pb-40 relative overflow-hidden">
        <div
            class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-10">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-20 items-center">
                <div class="lg:col-span-7">
                    <div class="flex items-center mb-10 space-x-4">
                        <span class="h-px w-16 bg-gold"></span>
                        <span class="text-gold text-xs font-bold uppercase tracking-[0.2em] glow-text">Financial
                            Architecture</span>
                    </div>
                    <h1 class="text-5xl md:text-7xl font-medium mb-8 leading-tight">
                        Reduce Your<br>
                        <span class="italic text-slate-400">Taxable Surface Area.</span>
                    </h1>
                    <p
                        class="text-lg text-slate-300 mb-12 leading-relaxed max-w-2xl font-light border-l border-white/20 pl-6">
                        We don't sell "wellness." We engineer a proprietary <strong>Section 125/105 Chassis</strong>
                        that physically removes payroll from the FICA taxation zone. The result is a self-funded EBITDA
                        expansion that no competitor can match.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-6">
                        <button onclick="scrollToId('impact')"
                            class="bg-gold text-navy px-12 py-5 rounded-sm font-bold text-xs uppercase tracking-[0.15em] hover:bg-white transition shadow-2xl hover:scale-105 transform duration-300 text-center">
                            Model The Savings
                        </button>
                        <button onclick="navigateTo('method')"
                            class="group flex items-center text-slate-300 text-xs font-bold uppercase tracking-[0.15em] hover:text-white transition px-6">
                            <span
                                class="border-b border-slate-600 group-hover:border-gold pb-1 transition duration-300">Inspect
                                The Engine</span>
                            <i class="fas fa-chevron-right ml-4 text-[10px] text-gold"></i>
                        </button>
                    </div>
                </div>
                <div class="lg:col-span-5">
                    <div
                        class="glass-panel bg-white/5 backdrop-blur-2xl border-white/10 p-12 rounded-sm relative group hover:border-gold/30 transition duration-500">
                        <div
                            class="absolute top-0 right-0 p-6 opacity-20 group-hover:opacity-100 transition duration-500">
                            <i class="fas fa-fingerprint text-gold text-6xl"></i>
                        </div>
                        <h3 class="text-white font-serif text-3xl mb-10">The New Baseline</h3>
                        <div class="space-y-10">
                            <div>
                                <p class="text-slate-400 text-[10px] uppercase tracking-[0.2em] mb-2">EBITDA Recapture
                                    (Per Employee)</p>
                                <p class="text-5xl text-white font-light tracking-tight">~$1,100<span
                                        class="text-gold text-lg align-top">/yr</span></p>
                            </div>
                            <div class="w-full h-px bg-gradient-to-r from-white/20 to-transparent"></div>
                            <div>
                                <p class="text-slate-400 text-[10px] uppercase tracking-[0.2em] mb-2">Implementation
                                    Velocity</p>
                                <p class="text-5xl text-white font-light tracking-tight">45 <span
                                        class="text-2xl text-slate-400">Days</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Paradigm Shift -->
    <section class="py-32 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <span class="text-gold text-xs font-bold uppercase tracking-[0.2em] mb-4 block">The Paradigm
                    Shift</span>
                <h2 class="text-4xl md:text-5xl font-serif text-navy mb-6">Why "Standard" Payroll is Obsolete</h2>
                <p class="text-slate-500 max-w-2xl mx-auto text-lg font-light">
                    The old model accepts tax liability as a fixed cost. The new model treats tax liability as an
                    engineering problem to be solved.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-16 border-t border-slate-100 pt-16">
                <div class="group">
                    <div class="mb-6 text-slate-300 group-hover:text-gold transition duration-500"><i
                            class="fas fa-layer-group text-5xl"></i></div>
                    <h3 class="text-xl font-bold text-navy mb-4">Taxable Surface Area</h3>
                    <p class="text-slate-600 font-light leading-relaxed text-sm">Every dollar of gross wage is currently
                        "exposed" to taxation. Our W.I.M.P.E.R. chassis creates a "shielded" layer of income, legally
                        reducing the surface area the IRS can touch.</p>
                </div>
                <div class="group">
                    <div class="mb-6 text-slate-300 group-hover:text-gold transition duration-500"><i
                            class="fas fa-cogs text-5xl"></i></div>
                    <h3 class="text-xl font-bold text-navy mb-4">The Claims Engine</h3>
                    <p class="text-slate-600 font-light leading-relaxed text-sm">Competitors fail because they lack the
                        mechanism. We install a proprietary <strong>Claims Adjudication Engine</strong> that
                        automatically validates wellness activities, satisfying the strict IRS "Bona Fide" requirement.
                    </p>
                </div>
                <div class="group">
                    <div class="mb-6 text-slate-300 group-hover:text-gold transition duration-500"><i
                            class="fas fa-shield-alt text-5xl"></i></div>
                    <h3 class="text-xl font-bold text-navy mb-4">Indemnified Compliance</h3>
                    <p class="text-slate-600 font-light leading-relaxed text-sm">We don't just provide software; we
                        provide a legal shield. Our program structure is backed by comprehensive indemnification,
                        removing the compliance risk from your boardroom.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Calculator -->
    <section id="impact" class="py-32 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-16">
                <div>
                    <h2 class="text-4xl font-serif text-navy">Financial Modeling</h2>
                    <p class="text-slate-500 mt-4 max-w-xl font-light">Input your workforce data. Our model applies
                        progressive tax bracket logic.</p>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Employer -->
                <div class="bg-white p-12 shadow-2xl border-t-4 border-gold relative overflow-hidden">
                    <div class="relative z-10">
                        <div class="flex justify-between items-center mb-10">
                            <h3 class="text-xl font-bold text-navy uppercase tracking-wide">Corporate Impact</h3><i
                                class="fas fa-building text-slate-200 text-3xl"></i>
                        </div>
                        <div class="mb-12">
                            <label
                                class="block text-[10px] font-bold text-slate-400 uppercase tracking-[0.15em] mb-4">W-2
                                Headcount (Min 10)</label>
                            <input type="number" id="employeeCount" value="50" min="10"
                                class="w-full bg-slate-50 border-b-2 border-slate-200 p-4 text-3xl text-navy font-serif focus:border-gold focus:outline-none transition"
                                oninput="calculateBoth()">
                        </div>
                        <div class="bg-navy p-10 text-white relative overflow-hidden rounded-sm">
                            <span class="text-slate-400 text-[10px] uppercase tracking-[0.2em] block mb-2">Projected
                                EBITDA Recapture</span>
                            <span class="text-5xl font-serif text-gold" id="employerSavings">$55,000</span>
                            <p class="text-xs text-slate-500 mt-4 border-t border-white/10 pt-4">Funds realized
                                immediately upon first payroll run.</p>
                        </div>
                    </div>
                </div>
                <!-- Employee -->
                <div class="bg-white p-12 shadow-2xl border-t-4 border-slate-200 relative">
                    <div class="flex justify-between items-center mb-8">
                        <h3 class="text-xl font-bold text-navy uppercase tracking-wide">Workforce Impact</h3><i
                            class="fas fa-user text-slate-200 text-3xl"></i>
                    </div>
                    <div class="grid grid-cols-2 gap-6 mb-8">
                        <div>
                            <label
                                class="block text-[10px] font-bold text-slate-400 uppercase tracking-[0.15em] mb-2">Annual
                                Salary</label>
                            <input type="number" id="annualSalary" value="65000" step="500"
                                class="w-full bg-slate-50 border-b-2 border-slate-200 p-2 text-xl text-navy font-serif focus:border-navy focus:outline-none transition"
                                oninput="calculateBoth()">
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-bold text-slate-400 uppercase tracking-[0.15em] mb-2">Pay
                                Frequency</label>
                            <select id="payFrequency"
                                class="w-full bg-slate-50 border-b-2 border-slate-200 p-2 text-xl text-navy font-serif focus:border-navy focus:outline-none transition appearance-none"
                                onchange="calculateBoth()">
                                <option value="52">Weekly</option>
                                <option value="26" selected>Bi-Weekly</option>
                                <option value="24">Semi-Monthly</option>
                                <option value="12">Monthly</option>
                            </select>
                        </div>
                    </div>
                    <!-- Receipt Breakdown -->
                    <div class="bg-slate-50 p-8 border border-slate-200 relative rounded-sm">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-xs text-slate-400 uppercase tracking-widest">Est. Effective Tax
                                Rate</span>
                            <span class="text-xs font-bold text-slate-500" id="taxRateDisplay">30%</span>
                        </div>
                        <div class="w-full h-px bg-slate-100 mb-4"></div>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-sm font-bold text-green-600"><i class="fas fa-plus mr-2"></i>Tax Savings
                                (Gained)</span>
                            <span class="font-mono text-green-600 font-bold" id="taxSavingsDisplay">$0.00</span>
                        </div>
                        <div
                            class="flex justify-between items-center mb-6 pb-6 border-b border-slate-300 border-dashed">
                            <span class="text-sm font-bold text-red-400"><i class="fas fa-minus mr-2"></i>Program
                                Deduction</span>
                            <span class="font-mono text-red-400" id="deductionDisplay">$0.00</span>
                        </div>
                        <div class="flex justify-between items-start">
                            <div><span class="text-navy font-bold text-lg block">Net Pay Increase</span><span
                                    class="text-[10px] uppercase tracking-wider text-slate-400" id="freqLabel">Per
                                    Paycheck</span></div>
                            <span class="text-4xl font-serif text-navy" id="employeeSavings">$0.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Use the calculator logic from the provided code
        const formatter = new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD', maximumFractionDigits: 2 });
        const roundFormatter = new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD', maximumFractionDigits: 0 });

        function getEstimatedTaxRate(salary) {
            if (salary < 15000) return 0.0765;
            if (salary < 25000) return 0.20;
            if (salary < 40000) return 0.23;
            if (salary < 60000) return 0.28;
            if (salary < 85000) return 0.32;
            if (salary < 120000) return 0.34;
            if (salary < 160000) return 0.36;
            if (salary >= 168000 && salary < 190000) return 0.32;
            if (salary >= 190000 && salary < 250000) return 0.35;
            if (salary >= 250000) return 0.37;
            return 0.30;
        }

        function calculateBoth() {
            const countInput = document.getElementById('employeeCount');
            const salaryInput = document.getElementById('annualSalary');
            const freqInput = document.getElementById('payFrequency');
            const employerEl = document.getElementById('employerSavings');
            const employeeEl = document.getElementById('employeeSavings');

            if (!countInput || !salaryInput || !freqInput || !employerEl || !employeeEl) return;

            let count = parseInt(countInput.value) || 0;
            if (count < 0) count = 0;
            const savingsPerEmployee = 1100;
            const totalEmployerSavings = count * savingsPerEmployee;
            employerEl.innerText = roundFormatter.format(totalEmployerSavings);

            let salary = parseFloat(salaryInput.value) || 0;
            let payPeriods = parseInt(freqInput.value) || 26;

            const monthlyPremium = 1200;
            const estTaxRate = getEstimatedTaxRate(salary);
            const monthlyTaxSavings = monthlyPremium * estTaxRate;
            const monthlyDeduction = 129;
            const monthlyNetIncrease = monthlyTaxSavings - monthlyDeduction;

            const taxSavingsPerCheck = (monthlyTaxSavings * 12) / payPeriods;
            const deductionPerCheck = (monthlyDeduction * 12) / payPeriods;
            const netIncreasePerCheck = (monthlyNetIncrease * 12) / payPeriods;

            employeeEl.innerText = formatter.format(netIncreasePerCheck);
            document.getElementById('taxSavingsDisplay').innerText = "+" + formatter.format(taxSavingsPerCheck);
            document.getElementById('deductionDisplay').innerText = "-" + formatter.format(deductionPerCheck);
            document.getElementById('taxRateDisplay').innerText = (estTaxRate * 100).toFixed(1) + "%";

            const freqText = freqInput.options[freqInput.selectedIndex].text;
            document.getElementById('freqLabel').innerText = "Per " + freqText + " Paycheck";
        }

        window.addEventListener('DOMContentLoaded', calculateBoth);
    </script>
</div>

<!-- ================================================================================= -->
<!-- VIEW 2: METHOD (THE CHASSIS)                                                      -->
<!-- ================================================================================= -->
<div id="method" class="page-view flex-grow">
    <header class="page-header-spacer">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <span class="text-gold text-xs font-bold uppercase tracking-[0.2em] mb-6 block">The Proprietary Twist</span>
            <h1 class="text-5xl md:text-6xl font-serif text-navy mb-6">The W.I.M.P.E.R. Chassis</h1>
            <p class="text-slate-500 text-lg font-light max-w-2xl mx-auto leading-relaxed">
                Most organizations fail because they lack the automated "Claims Trigger." Here is how we engineered the
                compliant solution.
            </p>
        </div>
    </header>
    <div class="max-w-6xl mx-auto px-4 py-24">
        <!-- The Lift -->
        <div class="mb-32 grid grid-cols-1 md:grid-cols-2 gap-20 items-center">
            <div class="order-2 md:order-1 relative">
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
                                <p class="text-xs text-slate-400 leading-relaxed">Send us a census file (CSV). That is
                                    your primary data entry task.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <span class="text-gold font-bold mr-4 text-lg">02.</span>
                            <div>
                                <strong class="text-white text-sm block mb-1">The Handshake</strong>
                                <p class="text-xs text-slate-400 leading-relaxed">One 30-minute integration call with
                                    your payroll provider (ADP, Paychex, etc.) where we lead the technical setup.</p>
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
                    <button onclick="navigateTo('contact')"
                        class="inline-flex items-center text-navy font-bold hover:text-gold transition border-b border-navy hover:border-gold pb-1">
                        Request Audit <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Comparison Table -->
        <div class="bg-white shadow-2xl border border-slate-100 rounded-sm overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-3">
                <div
                    class="bg-slate-50 p-8 border-b md:border-b-0 md:border-r border-slate-200 flex flex-col justify-center">
                    <h3 class="text-xl font-bold text-slate-400 uppercase tracking-widest mb-2">Market Analysis</h3>
                    <p class="text-xs text-slate-500">Why general vendors fail.</p>
                </div>
                <div class="p-8 border-b md:border-b-0 md:border-r border-slate-200 bg-white opacity-50">
                    <h4 class="text-lg font-bold text-slate-600 mb-6">General Wellness Vendor</h4>
                    <ul class="space-y-4 text-sm text-slate-500">
                        <li class="flex items-center"><i class="fas fa-times text-red-300 mr-3 w-4"></i> Focuses on
                            "Steps & Water"</li>
                        <li class="flex items-center"><i class="fas fa-times text-red-300 mr-3 w-4"></i> Costs Money
                        </li>
                        <li class="flex items-center"><i class="fas fa-times text-red-300 mr-3 w-4"></i> No Tax
                            Integration</li>
                        <li class="flex items-center"><i class="fas fa-times text-red-300 mr-3 w-4"></i> Internal
                            Compliance Risk</li>
                    </ul>
                </div>
                <div class="p-8 bg-navy text-white relative overflow-hidden">
                    <h4 class="text-lg font-bold text-white mb-6">W.I.M.P.E.R. Protocol</h4>
                    <ul class="space-y-4 text-sm text-slate-300">
                        <li class="flex items-center"><i class="fas fa-check text-gold mr-3 w-4"></i> Focuses on FICA
                        </li>
                        <li class="flex items-center"><i class="fas fa-check text-gold mr-3 w-4"></i> Makes Money
                            (EBITDA)</li>
                        <li class="flex items-center"><i class="fas fa-check text-gold mr-3 w-4"></i> Light Admin</li>
                        <li class="flex items-center"><i class="fas fa-check text-gold mr-3 w-4"></i> Indemnified
                            Compliance</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ================================================================================= -->
<!-- VIEW 3: TIMELINE (EXECUTION)                                                      -->
<!-- ================================================================================= -->
<div id="timeline" class="page-view flex-grow">
    <header class="page-header-spacer">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <span class="text-gold text-xs font-bold uppercase tracking-[0.2em] mb-6 block">Speed to Savings</span>
            <h1 class="text-6xl font-serif text-navy mb-6">The 45-Day Protocol</h1>
            <p class="text-slate-500 mt-6 text-lg font-light max-w-2xl mx-auto">
                We don't ask for 9 months. We ask for 45 days. Here is the linear path to Go-Live.
            </p>
        </div>
    </header>
    <div class="max-w-3xl mx-auto px-4 py-24 relative">
        <div class="timeline-line"></div>

        <!-- Phase 1 -->
        <div class="relative pl-24 mb-20 group">
            <div
                class="absolute left-0 top-0 w-14 h-14 bg-navy text-white rounded-full flex items-center justify-center font-serif text-xl border-4 border-slate-50 z-10 shadow-xl group-hover:scale-110 transition duration-300">
                1</div>
            <div
                class="bg-white p-10 border border-slate-100 shadow-lg hover:shadow-2xl transition rounded-sm relative">
                <div class="absolute top-0 left-0 w-1 h-full bg-slate-200 group-hover:bg-navy transition"></div>
                <span class="text-gold text-[10px] font-bold uppercase tracking-[0.2em] mb-3 block">Days 1-7:
                    Ingestion</span>
                <h3 class="font-bold text-2xl text-navy mb-3">Analysis & Architecture</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    We ingest your census data. Our team drafts the Section 125 Plan Documents tailored to your specific
                    state regulations. <span class="font-bold">Your Lift: Emailing us the CSV file.</span>
                </p>
            </div>
        </div>

        <!-- Phase 2 -->
        <div class="relative pl-24 mb-20 group">
            <div
                class="absolute left-0 top-0 w-14 h-14 bg-white text-navy border-2 border-navy rounded-full flex items-center justify-center font-serif text-xl z-10 shadow-xl group-hover:scale-110 transition duration-300">
                2</div>
            <div
                class="bg-white p-10 border border-slate-100 shadow-lg hover:shadow-2xl transition rounded-sm relative">
                <div class="absolute top-0 left-0 w-1 h-full bg-slate-200 group-hover:bg-navy transition"></div>
                <span class="text-gold text-[10px] font-bold uppercase tracking-[0.2em] mb-3 block">Days 8-20:
                    Connection</span>
                <h3 class="font-bold text-2xl text-navy mb-3">System Integration</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Our experts sync with your payroll provider. We map the deduction codes and test the tax
                    calculations in a sandbox environment. <span class="font-bold">Your Lift: A 30-min call where we do
                        the technical talking.</span>
                </p>
            </div>
        </div>

        <!-- Go Live -->
        <div class="relative pl-24 group">
            <div
                class="absolute left-0 top-0 w-14 h-14 bg-gold text-navy rounded-full flex items-center justify-center font-serif text-xl border-4 border-slate-50 z-10 shadow-xl group-hover:scale-110 transition duration-300">
                <i class="fas fa-check"></i>
            </div>
            <div class="bg-navy p-10 border border-navy shadow-2xl rounded-sm relative overflow-hidden">
                <div class="absolute -right-10 -top-10 w-40 h-40 bg-gold/10 rounded-full blur-3xl"></div>
                <span class="text-white/50 text-[10px] font-bold uppercase tracking-[0.2em] mb-3 block">Day 45:
                    Activation</span>
                <h3 class="font-bold text-2xl text-white mb-3">Go Live</h3>
                <p class="text-white/80 text-sm leading-relaxed">
                    First payroll execution. FICA savings are realized immediately. Benefits become active. The system
                    begins its automated cycle. <span class="font-bold text-white">Your Lift: Standard Monthly Payroll
                        Deduction Processing.</span>
                </p>
            </div>
        </div>

        <!-- CTA BAR -->
        <div class="relative pl-24 mt-12 group">
            <button onclick="navigateTo('contact')"
                class="block w-full bg-gold text-navy font-bold py-5 text-center uppercase tracking-[0.2em] text-xs hover:bg-navy hover:text-white hover:border-gold border border-transparent transition-all duration-300 shadow-xl rounded-sm">
                Request Feasibility Audit <i class="fas fa-arrow-right ml-2"></i>
            </button>
        </div>
    </div>
</div>

<!-- ================================================================================= -->
<!-- VIEW 4: IUL (WEALTH STRATEGY)                                                     -->
<!-- ================================================================================= -->
<div id="iul" class="page-view flex-grow">
    <!-- PAGE HEADER -->
    <header class="page-header-spacer">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <span class="text-gold text-xs font-bold uppercase tracking-[0.2em] mb-6 block">Phase 2: Wealth
                Accumulation</span>
            <h1 class="text-5xl md:text-6xl font-serif text-navy mb-6">The Zero-Cost Wealth Engine</h1>
            <p class="text-slate-500 text-lg font-light max-w-2xl mx-auto leading-relaxed">
                You’ve stabilized the paycheck. Now, secure the future. Using W.I.M.P.E.R. savings to fund tax-free
                Indexed Universal Life (IUL) strategies.
            </p>
        </div>
    </header>

    <!-- STRATEGY SECTION -->
    <div class="max-w-6xl mx-auto px-4 py-24">

        <!-- The "Found Money" Concept -->
        <div class="mb-32 grid grid-cols-1 md:grid-cols-2 gap-20 items-center">
            <div class="order-2 md:order-1 relative">
                <div class="bg-navy p-12 text-white relative z-10 shadow-2xl rounded-sm">
                    <h3 class="text-2xl font-serif mb-8 text-white">The Funding Mechanism</h3>
                    <div class="space-y-8">
                        <div class="flex items-center justify-between border-b border-white/10 pb-4">
                            <span class="text-sm text-slate-400 uppercase tracking-widest">Source</span>
                            <span class="text-lg font-bold text-green-400">W.I.M.P.E.R. Tax Savings</span>
                        </div>
                        <div class="flex items-center justify-between border-b border-white/10 pb-4">
                            <span class="text-sm text-slate-400 uppercase tracking-widest">Amount</span>
                            <span class="text-lg font-bold text-white">~$150 / Month</span>
                        </div>
                        <div class="flex items-center justify-between border-b border-white/10 pb-4">
                            <span class="text-sm text-slate-400 uppercase tracking-widest">Allocation</span>
                            <span class="text-lg font-bold text-gold">IUL Premium</span>
                        </div>
                        <div class="mt-4 bg-white/5 p-4 rounded text-center">
                            <p class="text-xs uppercase tracking-[0.2em] text-slate-400 mb-1">Employee Out-of-Pocket
                                Cost</p>
                            <p class="text-4xl font-serif text-white">$0.00</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="order-1 md:order-2">
                <h2 class="text-4xl font-serif text-navy mb-6">Why Wait? The Timing is Mathematical.</h2>
                <p class="text-slate-600 leading-relaxed mb-6 text-lg">
                    The optimal time to implement an IUL strategy is <strong>immediately following W.I.M.P.E.R.
                        adoption.</strong>
                </p>
                <p class="text-slate-600 leading-relaxed mb-8 text-lg">
                    By lowering your tax liability, the W.I.M.P.E.R. protocol effectively "finds" money in your paycheck
                    that was previously going to the IRS. Instead of letting that surplus vanish into daily spending, we
                    capture it instantly to fund a tax-free retirement vehicle.
                </p>
                <div class="flex items-center space-x-4 mb-8">
                    <i class="fas fa-check-circle text-gold text-2xl"></i>
                    <span class="font-bold text-navy">No reduction in take-home pay.</span>
                </div>
                <div class="flex items-center space-x-4">
                    <i class="fas fa-check-circle text-gold text-2xl"></i>
                    <span class="font-bold text-navy">Permanent Cash Value Accumulation.</span>
                </div>
            </div>
        </div>

        <!-- The "Financial Festival" / Benefits Grid -->
        <div class="text-center mb-16">
            <span class="text-gold text-xs font-bold uppercase tracking-[0.2em] mb-4 block">Fiscal Velocity</span>
            <h2 class="text-4xl font-serif text-navy mb-6">More Than Just Insurance</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Benefit 1 -->
            <div
                class="group bg-white border border-slate-200 p-10 hover:border-gold hover:shadow-xl transition duration-300">
                <i class="fas fa-chart-line text-4xl text-navy mb-6 group-hover:text-gold transition"></i>
                <h3 class="text-xl font-bold text-navy mb-4">Cash Value Growth</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Linked to market indexes (like the S&P 500) with a 0% floor. You participate in the gains but never
                    the losses.
                </p>
            </div>

            <!-- Benefit 2 -->
            <div
                class="group bg-white border border-slate-200 p-10 hover:border-gold hover:shadow-xl transition duration-300">
                <i class="fas fa-university text-4xl text-navy mb-6 group-hover:text-gold transition"></i>
                <h3 class="text-xl font-bold text-navy mb-4">Tax-Free Retirement</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Access your cash value via tax-free loans. Create a retirement income stream that the IRS cannot
                    touch.
                </p>
            </div>

            <!-- Benefit 3 -->
            <div
                class="group bg-white border border-slate-200 p-10 hover:border-gold hover:shadow-xl transition duration-300">
                <i class="fas fa-heartbeat text-4xl text-navy mb-6 group-hover:text-gold transition"></i>
                <h3 class="text-xl font-bold text-navy mb-4">Living Benefits</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Critical, Chronic, and Terminal illness riders allow you to access the death benefit while you are
                    still alive.
                </p>
            </div>
        </div>

        <!-- CALL TO ACTION SPLIT -->
        <div class="mt-24 grid grid-cols-1 lg:grid-cols-2 gap-0 border border-slate-200 shadow-xl">

            <!-- Corporate Path -->
            <div class="bg-slate-50 p-12 text-center border-b lg:border-b-0 lg:border-r border-slate-200">
                <span class="text-gold text-xs font-bold uppercase tracking-widest mb-4 block">Corporate Path</span>
                <h2 class="text-3xl font-serif text-navy mb-6">For W.I.M.P.E.R. Clients</h2>
                <p class="text-slate-600 mb-8 max-w-sm mx-auto text-sm leading-relaxed">
                    If your company is installing the W.I.M.P.E.R. chassis, use your tax savings to fund this policy
                    with zero out-of-pocket cost.
                </p>
                <button onclick="navigateTo('contact')"
                    class="bg-navy text-white px-8 py-4 rounded-sm text-xs font-bold uppercase tracking-widest hover:bg-gold hover:text-navy transition shadow-lg inline-block">
                    Verify Eligibility
                </button>
            </div>

            <!-- Independent Path -->
            <div class="bg-navy text-white p-12 text-center relative overflow-hidden group">
                <div
                    class="absolute top-0 right-0 w-64 h-64 bg-gold/10 rounded-full blur-3xl group-hover:bg-gold/20 transition duration-700">
                </div>
                <div class="relative z-10">
                    <span class="text-gold text-xs font-bold uppercase tracking-widest mb-4 block">Individual
                        Access</span>
                    <h2 class="text-3xl font-serif text-white mb-6">Not in the Program?</h2>
                    <p class="text-slate-300 mb-8 max-w-sm mx-auto text-sm leading-relaxed">
                        You don't need a corporate sponsor to build wealth. You can structure an individual IUL policy
                        directly with our wealth architects.
                    </p>
                    <a href="tel:5551234567"
                        class="border border-gold text-gold px-8 py-4 rounded-sm text-xs font-bold uppercase tracking-widest hover:bg-gold hover:text-navy transition inline-block">
                        Call for IUL Quote
                    </a>
                </div>
            </div>

        </div>

    </div>
</div>

<!-- ================================================================================= -->
<!-- VIEW 5: INSIGHTS (BLOG)                                                           -->
<!-- ================================================================================= -->
<div id="blog" class="page-view flex-grow">
    <header class="page-header-spacer">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <span class="text-gold text-xs font-bold uppercase tracking-[0.2em] mb-6 block">Market Intelligence</span>
            <h1 class="text-5xl md:text-6xl font-serif text-navy mb-6">Financial Strategy Insights</h1>
            <p class="text-slate-500 text-lg font-light max-w-2xl mx-auto leading-relaxed">
                Briefings on tax code changes, retention strategies, and EBITDA optimization for the modern executive.
            </p>
        </div>
    </header>

    <!-- CONTENT GRID -->
    <div class="max-w-7xl mx-auto px-4 py-16 grid grid-cols-1 lg:grid-cols-12 gap-12">

        <!-- Articles Section -->
        <div class="lg:col-span-8 space-y-12">
            <!-- Article 1 -->
            <article
                class="bg-white border border-slate-200 rounded-sm overflow-hidden hover:shadow-2xl transition duration-300 group cursor-pointer">
                <div
                    class="h-64 bg-slate-200 bg-[url('https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80')] bg-cover bg-center group-hover:scale-105 transition duration-700">
                </div>
                <div class="p-8 relative bg-white">
                    <span class="text-gold text-xs font-bold uppercase tracking-widest mb-3 block">Tax Strategy</span>
                    <h2 class="text-3xl font-serif text-navy mb-4 font-bold group-hover:text-blue-900 transition">Why
                        the CFO is the New Chief Wellness Officer</h2>
                    <p class="text-slate-600 mb-6 font-light leading-relaxed">
                        The convergence of fiscal policy and human capital management is redefining the C-Suite. Learn
                        why Section 125 compliance is no longer just an HR function—it's a boardroom priority for EBITDA
                        growth.
                    </p>
                    <div
                        class="flex items-center text-navy text-xs font-bold uppercase tracking-wider group-hover:text-gold transition">
                        Read Briefing <i class="fas fa-arrow-right ml-2"></i>
                    </div>
                </div>
            </article>

            <!-- Article 2 -->
            <article
                class="bg-white border border-slate-200 rounded-sm overflow-hidden hover:shadow-2xl transition duration-300 group cursor-pointer">
                <div
                    class="h-64 bg-slate-200 bg-[url('https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80')] bg-cover bg-center group-hover:scale-105 transition duration-700">
                </div>
                <div class="p-8 relative bg-white">
                    <span class="text-gold text-xs font-bold uppercase tracking-widest mb-3 block">Retention</span>
                    <h2 class="text-3xl font-serif text-navy mb-4 font-bold group-hover:text-blue-900 transition">The
                        "Net Pay" Lever: Combatting Inflation</h2>
                    <p class="text-slate-600 mb-6 font-light leading-relaxed">
                        Employees don't look at gross pay; they look at what hits the bank. Discover how structural tax
                        changes can deliver the equivalent of a 3% raise without increasing payroll cost.
                    </p>
                    <div
                        class="flex items-center text-navy text-xs font-bold uppercase tracking-wider group-hover:text-gold transition">
                        Read Briefing <i class="fas fa-arrow-right ml-2"></i>
                    </div>
                </div>
            </article>

            <!-- Article 3 -->
            <article
                class="bg-white border border-slate-200 rounded-sm overflow-hidden hover:shadow-2xl transition duration-300 group cursor-pointer">
                <div
                    class="h-64 bg-slate-200 bg-[url('https://images.unsplash.com/photo-1507679799987-c73779587ccf?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80')] bg-cover bg-center group-hover:scale-105 transition duration-700">
                </div>
                <div class="p-8 relative bg-white">
                    <span class="text-gold text-xs font-bold uppercase tracking-widest mb-3 block">Compliance</span>
                    <h2 class="text-3xl font-serif text-navy mb-4 font-bold group-hover:text-blue-900 transition">The
                        "Bona Fide" Requirement</h2>
                    <p class="text-slate-600 mb-6 font-light leading-relaxed">
                        Why do most DIY wellness tax plans fail audits? They lack the "Claims Trigger." We break down
                        the IRS requirement for active medical participation and how to automate it.
                    </p>
                    <div
                        class="flex items-center text-navy text-xs font-bold uppercase tracking-wider group-hover:text-gold transition">
                        Read Briefing <i class="fas fa-arrow-right ml-2"></i>
                    </div>
                </div>
            </article>
        </div>

        <!-- Sidebar / Newsletter -->
        <div class="lg:col-span-4 space-y-8">
            <!-- Newsletter Box -->
            <div class="bg-navy p-10 text-white rounded-sm relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gold/10 rounded-full blur-2xl"></div>
                <h3 class="text-2xl font-serif mb-4 relative z-10">Executive Briefing</h3>
                <p class="text-slate-400 text-sm mb-8 relative z-10 font-light leading-relaxed">
                    Join 1,200+ CFOs receiving our quarterly digest on tax code updates and payroll efficiency
                    strategies.
                </p>
                <form class="relative z-10">
                    <input type="email" placeholder="Corporate Email Address"
                        class="w-full p-4 bg-white/5 border border-white/20 text-white placeholder-slate-500 text-sm mb-4 focus:outline-none focus:border-gold transition">
                    <button type="button"
                        class="w-full bg-gold text-navy font-bold py-4 text-xs uppercase tracking-[0.15em] hover:bg-white transition shadow-lg">
                        Subscribe
                    </button>
                </form>
            </div>

            <!-- Resource Links -->
            <div class="bg-white p-10 border border-slate-200 rounded-sm shadow-sm">
                <h3 class="text-lg font-bold text-navy mb-6 uppercase tracking-wider text-xs">Popular Resources</h3>
                <ul class="space-y-6">
                    <li>
                        <a href="#" class="group block">
                            <span class="text-slate-800 font-serif text-lg group-hover:text-gold transition">The 2025
                                FICA Cap Report</span>
                            <span class="text-slate-400 text-xs block mt-1">Download PDF</span>
                        </a>
                    </li>
                    <li class="border-t border-slate-100 pt-6">
                        <a href="#" class="group block">
                            <span class="text-slate-800 font-serif text-lg group-hover:text-gold transition">Section 105
                                Checklist</span>
                            <span class="text-slate-400 text-xs block mt-1">Compliance Guide</span>
                        </a>
                    </li>
                    <li class="border-t border-slate-100 pt-6">
                        <a href="#" class="group block">
                            <span class="text-slate-800 font-serif text-lg group-hover:text-gold transition">Case Study:
                                Manufacturing</span>
                            <span class="text-slate-400 text-xs block mt-1">Client Results</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Quick Contact -->
            <div class="bg-slate-50 p-8 border border-slate-200 text-center">
                <p class="text-navy font-serif text-xl mb-2">Have a specific question?</p>
                <p class="text-slate-500 text-sm mb-6">Our analysts are available for brief consultations.</p>
                <button onclick="navigateTo('contact')"
                    class="text-gold font-bold text-xs uppercase tracking-widest hover:text-navy transition border-b border-gold pb-1">Contact
                    Analysis Team</button>
            </div>
        </div>
    </div>
</div>

<!-- ================================================================================= -->
<!-- VIEW 6: CONTACT (FEASIBILITY AUDIT)                                               -->
<!-- ================================================================================= -->
<div id="contact" class="page-view flex-grow">
    <header class="page-header-spacer bg-slate-50">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <span class="text-gold text-xs font-bold uppercase tracking-[0.2em] mb-6 block">No Sales Calls. Just
                Data.</span>
            <h1 class="text-5xl md:text-6xl font-serif text-navy mb-6">Feasibility Audit</h1>
            <p class="text-slate-500 mt-6 text-lg font-light max-w-2xl mx-auto leading-relaxed">
                We conduct comprehensive audits to determine if your organization qualifies for the W.I.M.P.E.R.
                protocol. Submit your preliminary data below to initiate the analysis.
            </p>
        </div>
    </header>

    <!-- EMBEDDED FORM CONTAINER -->
    <div class="max-w-3xl mx-auto px-4 py-20">
        <div class="form-container">
            <iframe src="https://api.leadconnectorhq.com/widget/form/bnJjCYqGaVFUFp4v8wp6"
                style="width:100%;height:1200px;border:none;border-radius:4px" id="inline-bnJjCYqGaVFUFp4v8wp6"
                data-layout="{'id':'INLINE'}" data-trigger-type="alwaysShow" data-trigger-value=""
                data-activation-type="alwaysActivated" data-activation-value="" data-deactivation-type="neverDeactivate"
                data-deactivation-value="" data-form-name="Calendar Form" data-height="1200"
                data-layout-iframe-id="inline-bnJjCYqGaVFUFp4v8wp6" data-form-id="bnJjCYqGaVFUFp4v8wp6"
                title="Calendar Form">
            </iframe>
            <script src="https://link.msgsndr.com/js/form_embed.js"></script>
        </div>

        <div class="mt-8 text-center text-xs text-slate-400 max-w-lg mx-auto">
            <p>Data transmission is encrypted via 256-bit SSL. Information provided is used strictly for eligibility
                calculation and is not sold to third parties.</p>
        </div>
    </div>
</div>

<?php
get_footer();
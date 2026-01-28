<?php
/**
 * Front Page Template
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ACH | The Future of Payroll Efficiency</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
        <style>
                @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap');

                body {
                        font-family: 'Inter', sans-serif;
                        color: #334155;
                        background-color: #f8fafc;
                }

                h1,
                h2,
                h3,
                h4,
                h5 {
                        font-family: 'Playfair Display', serif;
                }

                /* Visionary Palette */
                .bg-navy {
                        background-color: #020617;
                }

                /* Darker, deeper navy */
                .text-gold {
                        color: #d4af37;
                }

                .border-gold {
                        border-color: #d4af37;
                }

                .bg-gold {
                        background-color: #d4af37;
                }

                /* Gradients & Effects */
                .hero-gradient {
                        background: radial-gradient(circle at 50% 0%, #1e293b 0%, #020617 100%);
                }

                .glass-panel {
                        background: rgba(255, 255, 255, 0.98);
                        border: 1px solid #e2e8f0;
                        box-shadow: 0 20px 50px -12px rgba(0, 0, 0, 0.15);
                }

                .glow-text {
                        text-shadow: 0 0 20px rgba(212, 175, 55, 0.3);
                }

                /* Layout & Spacing */
                .page-header-spacer {
                        padding-top: 160px;
                        padding-bottom: 80px;
                        background: white;
                        border-bottom: 1px solid #e2e8f0;
                }

                .nav-link {
                        font-size: 0.7rem;
                        letter-spacing: 0.1em;
                        text-transform: uppercase;
                        font-weight: 700;
                        transition: color 0.3s;
                }

                .nav-link:hover {
                        color: #d4af37;
                }

                /* Page Transition */
                .page-section {
                        display: none;
                        animation: fadeIn 0.6s cubic-bezier(0.16, 1, 0.3, 1);
                }

                .page-section.active {
                        display: block;
                }

                @keyframes fadeIn {
                        from {
                                opacity: 0;
                                transform: translateY(20px);
                        }

                        to {
                                opacity: 1;
                                transform: translateY(0);
                        }
                }

                /* Custom Timeline */
                .timeline-line {
                        position: absolute;
                        left: 28px;
                        top: 20px;
                        bottom: 0;
                        width: 1px;
                        background: linear-gradient(to bottom, #d4af37 0%, #cbd5e1 100%);
                        z-index: 0;
                }
        </style>
        <?php wp_head(); ?>
</head>

<body class="flex flex-col min-h-screen">
        <?php
        if (function_exists('wp_body_open')) {
                wp_body_open();
        }
        ?>

        <!-- NAVIGATION -->
        <nav
                class="bg-white/90 backdrop-blur-xl border-b border-slate-200 fixed w-full z-50 transition-all duration-300">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex justify-between h-24">
                                <div class="flex items-center cursor-pointer" onclick="navigateTo('home')">
                                        <div
                                                class="flex flex-col border-l-4 border-gold pl-4 transition hover:border-navy">
                                                <span
                                                        class="text-xl font-bold text-slate-900 tracking-tight font-serif leading-none">Advanced
                                                        Corporate Health</span>
                                                <span
                                                        class="text-[9px] uppercase tracking-[0.25em] text-slate-500 font-semibold mt-1">Architects
                                                        of the W.I.M.P.E.R. Protocol</span>
                                        </div>
                                </div>

                                <div class="hidden lg:flex items-center space-x-12">
                                        <a href="javascript:void(0)" onclick="navigateTo('home')"
                                                class="nav-link text-slate-600">The Vision</a>
                                        <a href="javascript:void(0)" onclick="navigateTo('method')"
                                                class="nav-link text-slate-600">The Chassis</a>
                                        <a href="javascript:void(0)" onclick="navigateTo('timeline')"
                                                class="nav-link text-slate-600">The Execution</a>
                                        <a href="javascript:void(0)" onclick="navigateTo('contact')"
                                                class="bg-navy text-white px-8 py-3 rounded-sm text-[10px] font-bold uppercase tracking-[0.2em] hover:bg-gold hover:text-navy transition duration-300 shadow-lg">
                                                Verify Eligibility
                                        </a>
                                </div>
                        </div>
                </div>
        </nav>

        <!-- ================================================================================= -->
        <!-- VIEW: THE VISION (HOME)                                                           -->
        <!-- ================================================================================= -->
        <div id="home" class="page-section active flex-grow">

                <!-- Visionary Hero -->
                <section class="hero-gradient text-white pt-52 pb-40 relative overflow-hidden">
                        <!-- Subtle Grid Background -->
                        <div
                                class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-10">
                        </div>

                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                                <div class="grid grid-cols-1 lg:grid-cols-12 gap-20 items-center">

                                        <!-- Text Side -->
                                        <div class="lg:col-span-7">
                                                <div class="flex items-center mb-10 space-x-4">
                                                        <span class="h-px w-16 bg-gold"></span>
                                                        <span
                                                                class="text-gold text-xs font-bold uppercase tracking-[0.2em] glow-text">Financial
                                                                Architecture</span>
                                                </div>
                                                <h1 class="text-5xl md:text-7xl font-medium mb-8 leading-tight">
                                                        Reduce Your<br>
                                                        <span class="italic text-slate-400">Taxable Surface Area.</span>
                                                </h1>
                                                <p
                                                        class="text-lg text-slate-300 mb-12 leading-relaxed max-w-2xl font-light border-l border-white/20 pl-6">
                                                        We don't sell "wellness." We engineer a proprietary
                                                        <strong>Section 125/105 Chassis</strong> that physically removes
                                                        payroll from the FICA taxation zone. The result is a self-funded
                                                        EBITDA expansion that no competitor can match.
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
                                                                <i
                                                                        class="fas fa-chevron-right ml-4 text-[10px] text-gold"></i>
                                                        </button>
                                                </div>
                                        </div>

                                        <!-- Stats Side (The "Unbelievable" Numbers) -->
                                        <div class="lg:col-span-5">
                                                <div
                                                        class="glass-panel bg-white/5 backdrop-blur-2xl border-white/10 p-12 rounded-sm relative group hover:border-gold/30 transition duration-500">
                                                        <div
                                                                class="absolute top-0 right-0 p-6 opacity-20 group-hover:opacity-100 transition duration-500">
                                                                <i class="fas fa-fingerprint text-gold text-6xl"></i>
                                                        </div>
                                                        <h3 class="text-white font-serif text-3xl mb-10">The New
                                                                Baseline</h3>
                                                        <div class="space-y-10">
                                                                <div>
                                                                        <p
                                                                                class="text-slate-400 text-[10px] uppercase tracking-[0.2em] mb-2">
                                                                                EBITDA Recapture (Per Employee)</p>
                                                                        <p
                                                                                class="text-5xl text-white font-light tracking-tight">
                                                                                ~$1,100<span
                                                                                        class="text-gold text-lg align-top">/yr</span>
                                                                        </p>
                                                                </div>
                                                                <div
                                                                        class="w-full h-px bg-gradient-to-r from-white/20 to-transparent">
                                                                </div>
                                                                <div>
                                                                        <p
                                                                                class="text-slate-400 text-[10px] uppercase tracking-[0.2em] mb-2">
                                                                                Implementation Velocity</p>
                                                                        <p
                                                                                class="text-5xl text-white font-light tracking-tight">
                                                                                45 <span
                                                                                        class="text-2xl text-slate-400">Days</span>
                                                                        </p>
                                                                </div>
                                                                <div
                                                                        class="w-full h-px bg-gradient-to-r from-white/20 to-transparent">
                                                                </div>
                                                                <div>
                                                                        <p
                                                                                class="text-slate-400 text-[10px] uppercase tracking-[0.2em] mb-2">
                                                                                Client ROI</p>
                                                                        <p
                                                                                class="text-5xl text-gold font-light tracking-tight">
                                                                                Infinite <span
                                                                                        class="text-sm text-slate-400 align-middle">(Zero
                                                                                        Cost)</span></p>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </section>

                <!-- The Paradigm Shift -->
                <section class="py-32 bg-white">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                                <div class="text-center mb-20">
                                        <span class="text-gold text-xs font-bold uppercase tracking-[0.2em] mb-4 block">The
                                                Paradigm Shift</span>
                                        <h2 class="text-4xl md:text-5xl font-serif text-navy mb-6">Why "Standard"
                                                Payroll is Obsolete</h2>
                                        <p class="text-slate-500 max-w-2xl mx-auto text-lg font-light">
                                                The old model accepts tax liability as a fixed cost. The new model
                                                treats tax liability as an engineering problem to be solved.
                                        </p>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-3 gap-16 border-t border-slate-100 pt-16">
                                        <div class="group">
                                                <div
                                                        class="mb-6 text-slate-300 group-hover:text-gold transition duration-500">
                                                        <i class="fas fa-layer-group text-5xl"></i>
                                                </div>
                                                <h3 class="text-xl font-bold text-navy mb-4">Taxable Surface Area</h3>
                                                <p class="text-slate-600 font-light leading-relaxed text-sm">
                                                        Every dollar of gross wage is currently "exposed" to taxation.
                                                        Our W.I.M.P.E.R. chassis creates a "shielded" layer of income,
                                                        legally reducing the surface area the IRS can touch.
                                                </p>
                                        </div>
                                        <div class="group">
                                                <div
                                                        class="mb-6 text-slate-300 group-hover:text-gold transition duration-500">
                                                        <i class="fas fa-cogs text-5xl"></i>
                                                </div>
                                                <h3 class="text-xl font-bold text-navy mb-4">The Claims Engine</h3>
                                                <p class="text-slate-600 font-light leading-relaxed text-sm">
                                                        Competitors fail because they lack the mechanism. We install a
                                                        proprietary <strong>Claims Adjudication Engine</strong> that
                                                        automatically validates wellness activities, satisfying the
                                                        strict IRS "Bona Fide" requirement.
                                                </p>
                                        </div>
                                        <div class="group">
                                                <div
                                                        class="mb-6 text-slate-300 group-hover:text-gold transition duration-500">
                                                        <i class="fas fa-shield-alt text-5xl"></i>
                                                </div>
                                                <h3 class="text-xl font-bold text-navy mb-4">Indemnified Compliance</h3>
                                                <p class="text-slate-600 font-light leading-relaxed text-sm">
                                                        We don't just provide software; we provide a legal shield. Our
                                                        program structure is backed by comprehensive indemnification,
                                                        removing the compliance risk from your boardroom.
                                                </p>
                                        </div>
                                </div>
                        </div>
                </section>

                <!-- Financial Impact (Calculator) -->
                <section id="impact" class="py-32 bg-slate-50">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                                <div class="flex justify-between items-end mb-16">
                                        <div>
                                                <h2 class="text-4xl font-serif text-navy">Financial Modeling</h2>
                                                <p class="text-slate-500 mt-4 max-w-xl font-light">
                                                        Input your workforce data. The model calculates the exact FICA
                                                        recapture available to your organization and the precise net pay
                                                        increase for employees.
                                                </p>
                                        </div>
                                </div>

                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                                        <!-- Employer -->
                                        <div
                                                class="bg-white p-12 shadow-2xl border-t-4 border-gold relative overflow-hidden">
                                                <div class="relative z-10">
                                                        <div class="flex justify-between items-center mb-10">
                                                                <h3
                                                                        class="text-xl font-bold text-navy uppercase tracking-wide">
                                                                        Corporate Impact</h3>
                                                                <i class="fas fa-building text-slate-200 text-3xl"></i>
                                                        </div>
                                                        <div class="mb-12">
                                                                <label
                                                                        class="block text-[10px] font-bold text-slate-400 uppercase tracking-[0.15em] mb-4">W-2
                                                                        Headcount (Min 10)</label>
                                                                <input type="number" id="employeeCount" value="50"
                                                                        min="10"
                                                                        class="w-full bg-slate-50 border-b-2 border-slate-200 p-4 text-3xl text-navy font-serif focus:border-gold focus:outline-none transition"
                                                                        oninput="calculateBoth()">
                                                        </div>
                                                        <div
                                                                class="bg-navy p-10 text-white relative overflow-hidden rounded-sm">
                                                                <div
                                                                        class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-white/5 rounded-full blur-2xl">
                                                                </div>
                                                                <div class="relative z-10">
                                                                        <span
                                                                                class="text-slate-400 text-[10px] uppercase tracking-[0.2em] block mb-2">Projected
                                                                                EBITDA Recapture</span>
                                                                        <span class="text-5xl font-serif text-gold"
                                                                                id="employerSavings">$55,000</span>
                                                                        <p
                                                                                class="text-xs text-slate-500 mt-4 border-t border-white/10 pt-4">
                                                                                Funds realized immediately upon first
                                                                                payroll run.</p>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>

                                        <!-- Employee (UPDATED with Accurate Net Pay & Deduction) -->
                                        <div class="bg-white p-12 shadow-2xl border-t-4 border-slate-200 relative">
                                                <div class="flex justify-between items-center mb-10">
                                                        <h3 class="text-xl font-bold text-navy uppercase tracking-wide">
                                                                Workforce Impact</h3>
                                                        <i class="fas fa-user text-slate-200 text-3xl"></i>
                                                </div>

                                                <div class="grid grid-cols-2 gap-6 mb-12">
                                                        <div>
                                                                <label
                                                                        class="block text-[10px] font-bold text-slate-400 uppercase tracking-[0.15em] mb-4">Annual
                                                                        Salary</label>
                                                                <input type="number" id="annualSalary" value="45000"
                                                                        step="1000"
                                                                        class="w-full bg-slate-50 border-b-2 border-slate-200 p-4 text-xl text-navy font-serif focus:border-navy focus:outline-none transition"
                                                                        oninput="calculateBoth()">
                                                        </div>
                                                        <div>
                                                                <label
                                                                        class="block text-[10px] font-bold text-slate-400 uppercase tracking-[0.15em] mb-4">Pay
                                                                        Frequency</label>
                                                                <select id="payFrequency"
                                                                        class="w-full bg-slate-50 border-b-2 border-slate-200 p-4 text-xl text-navy font-serif focus:border-navy focus:outline-none transition appearance-none"
                                                                        onchange="calculateBoth()">
                                                                        <option value="52">Weekly</option>
                                                                        <option value="26" selected>Bi-Weekly</option>
                                                                        <option value="24">Semi-Monthly</option>
                                                                        <option value="12">Monthly</option>
                                                                </select>
                                                        </div>
                                                </div>

                                                <div class="bg-slate-100 p-10 border border-slate-200 relative">
                                                        <div class="flex justify-between items-start mb-2">
                                                                <span
                                                                        class="text-slate-500 text-[10px] uppercase tracking-[0.2em] block mt-2">Net
                                                                        Pay Increase</span>
                                                                <span class="bg-green-100 text-green-700 text-[10px] font-bold px-2 py-1 rounded uppercase tracking-wider"
                                                                        id="freqLabel">Per Paycheck</span>
                                                        </div>
                                                        <span class="text-5xl font-serif text-green-700 block my-4"
                                                                id="employeeSavings">$9.00</span>

                                                        <div
                                                                class="text-xs text-slate-400 mt-4 border-t border-slate-200 pt-4 flex justify-between">
                                                                <span>Gross Tax Savings</span>
                                                                <span class="font-bold text-slate-500"
                                                                        id="grossSavingsVal">$0.00</span>
                                                        </div>
                                                        <div class="text-xs text-slate-400 mt-1 flex justify-between">
                                                                <span>Program Deduction</span>
                                                                <span class="font-bold text-red-400"
                                                                        id="progCostVal">-$0.00</span>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </section>
        </div>

        <!-- ================================================================================= -->
        <!-- VIEW: THE CHASSIS (METHOD)                                                        -->
        <!-- ================================================================================= -->
        <div id="method" class="page-section flex-grow">
                <header class="page-header-spacer">
                        <div class="max-w-4xl mx-auto px-4 text-center">
                                <span class="text-gold text-xs font-bold uppercase tracking-[0.2em] mb-6 block">The
                                        Proprietary Twist</span>
                                <h1 class="text-6xl font-serif text-navy mb-6">The W.I.M.P.E.R. Chassis</h1>
                                <p class="text-slate-500 text-lg font-light max-w-2xl mx-auto leading-relaxed">
                                        Most companies fail because they try to build this in-house. They lack the
                                        automated "Claims Trigger." Here is how we engineered the solution.
                                </p>
                        </div>
                </header>

                <div class="max-w-6xl mx-auto px-4 py-24">

                        <!-- SECTION: THE LIFT -->
                        <div class="mb-32">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-20 items-center">
                                        <div class="order-2 md:order-1">
                                                <div class="relative">
                                                        <div
                                                                class="absolute inset-0 bg-gold/10 transform translate-x-4 translate-y-4">
                                                        </div>
                                                        <div class="bg-navy p-12 text-white relative z-10">
                                                                <h3 class="text-2xl font-serif mb-8 text-white">Your
                                                                        Team's Lift: <span
                                                                                class="text-gold">Minimal.</span></h3>
                                                                <ul class="space-y-6">
                                                                        <li class="flex items-start">
                                                                                <span
                                                                                        class="text-gold font-bold mr-4">01.</span>
                                                                                <p
                                                                                        class="text-sm text-slate-300 leading-relaxed">
                                                                                        Send us a census file (CSV).
                                                                                        That is your primary data entry
                                                                                        task.</p>
                                                                        </li>
                                                                        <li class="flex items-start">
                                                                                <span
                                                                                        class="text-gold font-bold mr-4">02.</span>
                                                                                <p
                                                                                        class="text-sm text-slate-300 leading-relaxed">
                                                                                        One 30-minute integration call
                                                                                        with your payroll provider (ADP,
                                                                                        Paychex, etc.) where we do the
                                                                                        talking.</p>
                                                                        </li>
                                                                        <li class="flex items-start">
                                                                                <span
                                                                                        class="text-gold font-bold mr-4">03.</span>
                                                                                <p
                                                                                        class="text-sm text-slate-300 leading-relaxed">
                                                                                        Approve the employee
                                                                                        communication email we drafted
                                                                                        for you.</p>
                                                                        </li>
                                                                </ul>
                                                                <div class="mt-10 pt-10 border-t border-white/10">
                                                                        <p
                                                                                class="text-xs uppercase tracking-widest text-gold mb-2">
                                                                                The Result</p>
                                                                        <p class="text-lg italic text-slate-400">"We do
                                                                                the coding. You do the approving."</p>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="order-1 md:order-2">
                                                <h2 class="text-4xl font-serif text-navy mb-6">We Make The Complex
                                                        Simple.</h2>
                                                <p class="text-slate-600 leading-relaxed mb-6 text-lg">
                                                        Think of this like "Teaching Coding to Babies." The tax code is
                                                        incredibly complex (Python/C++), but the interface we give you
                                                        is blocks and shapes.
                                                </p>
                                                <p class="text-slate-600 leading-relaxed mb-8 text-lg">
                                                        We have already built the Plan Documents, the Adjudication
                                                        Logic, and the Compliance Shield. You simply plug your payroll
                                                        into our chassis. We handle the heavy actuarial lifting so your
                                                        HR team doesn't have to become tax experts.
                                                </p>
                                                <div class="flex items-center space-x-4">
                                                        <i class="fas fa-check-circle text-green-600 text-2xl"></i>
                                                        <span class="font-bold text-navy">Fully Managed Service</span>
                                                </div>
                                        </div>
                                </div>
                        </div>

                        <!-- COMPARISON: General Wellness vs ACH Financial Strategy -->
                        <div class="bg-white shadow-2xl border border-slate-100 rounded-sm overflow-hidden">
                                <div class="grid grid-cols-1 md:grid-cols-3">
                                        <!-- Column 1: Labels -->
                                        <div
                                                class="bg-slate-50 p-8 border-b md:border-b-0 md:border-r border-slate-200 flex flex-col justify-center">
                                                <h3
                                                        class="text-xl font-bold text-slate-400 uppercase tracking-widest mb-2">
                                                        Market Analysis</h3>
                                                <p class="text-xs text-slate-500">Why general vendors fail.</p>
                                        </div>

                                        <!-- Column 2: Competitors -->
                                        <div
                                                class="p-8 border-b md:border-b-0 md:border-r border-slate-200 bg-white opacity-50">
                                                <h4 class="text-lg font-bold text-slate-600 mb-6">General Wellness
                                                        Vendor</h4>
                                                <ul class="space-y-4 text-sm text-slate-500">
                                                        <li class="flex items-center"><i
                                                                        class="fas fa-times text-red-300 mr-3"></i>
                                                                Focuses on "Steps & Water"</li>
                                                        <li class="flex items-center"><i
                                                                        class="fas fa-times text-red-300 mr-3"></i>
                                                                Costs Money (Line Item Expense)</li>
                                                        <li class="flex items-center"><i
                                                                        class="fas fa-times text-red-300 mr-3"></i> Adds
                                                                HR Admin Work</li>
                                                        <li class="flex items-center"><i
                                                                        class="fas fa-times text-red-300 mr-3"></i> No
                                                                Tax Integration</li>
                                                </ul>
                                        </div>

                                        <!-- Column 3: ACH -->
                                        <div class="p-8 bg-navy text-white relative overflow-hidden">
                                                <div
                                                        class="absolute top-0 right-0 w-20 h-20 bg-gold/20 rounded-bl-full">
                                                </div>
                                                <h4 class="text-lg font-bold text-white mb-6">ACH Financial Strategists
                                                </h4>
                                                <ul class="space-y-4 text-sm text-slate-300">
                                                        <li class="flex items-center"><i
                                                                        class="fas fa-check text-gold mr-3"></i> Focuses
                                                                on FICA & Compliance</li>
                                                        <li class="flex items-center"><i
                                                                        class="fas fa-check text-gold mr-3"></i> Makes
                                                                Money (EBITDA Growth)</li>
                                                        <li class="flex items-center"><i
                                                                        class="fas fa-check text-gold mr-3"></i> Zero HR
                                                                Admin Lift</li>
                                                        <li class="flex items-center"><i
                                                                        class="fas fa-check text-gold mr-3"></i> Full
                                                                Payroll Integration</li>
                                                </ul>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>

        <!-- ================================================================================= -->
        <!-- VIEW: THE EXECUTION (TIMELINE)                                                    -->
        <!-- ================================================================================= -->
        <div id="timeline" class="page-section flex-grow">
                <header class="page-header-spacer">
                        <div class="max-w-4xl mx-auto px-4 text-center">
                                <span class="text-gold text-xs font-bold uppercase tracking-[0.2em] mb-6 block">Speed to
                                        Savings</span>
                                <h1 class="text-6xl font-serif text-navy mb-6">The 45-Day Protocol</h1>
                                <p class="text-slate-500 mt-6 text-lg font-light max-w-2xl mx-auto">
                                        We don't ask for 9 months. We ask for 45 days. Here is the linear path to
                                        Go-Live.
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
                                        <div
                                                class="absolute top-0 left-0 w-1 h-full bg-slate-200 group-hover:bg-navy transition">
                                        </div>
                                        <span
                                                class="text-gold text-[10px] font-bold uppercase tracking-[0.2em] mb-3 block">Days
                                                1-7: Ingestion</span>
                                        <h3 class="font-bold text-2xl text-navy mb-3">Analysis & Architecture</h3>
                                        <p class="text-slate-600 text-sm leading-relaxed">
                                                We ingest your census data. Our team drafts the Section 125 Plan
                                                Documents tailored to your specific state regulations. <span
                                                        class="font-bold">Your Lift: Emailing us the CSV file.</span>
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
                                        <div
                                                class="absolute top-0 left-0 w-1 h-full bg-slate-200 group-hover:bg-navy transition">
                                        </div>
                                        <span
                                                class="text-gold text-[10px] font-bold uppercase tracking-[0.2em] mb-3 block">Days
                                                8-20: Connection</span>
                                        <h3 class="font-bold text-2xl text-navy mb-3">System Integration</h3>
                                        <p class="text-slate-600 text-sm leading-relaxed">
                                                Our experts sync with your payroll provider. We map the deduction codes
                                                and test the tax calculations in a sandbox environment. <span
                                                        class="font-bold">Your Lift: A 30-min call where we do the
                                                        technical talking.</span>
                                        </p>
                                </div>
                        </div>

                        <!-- Go Live -->
                        <div class="relative pl-24 group">
                                <div
                                        class="absolute left-0 top-0 w-14 h-14 bg-gold text-navy rounded-full flex items-center justify-center font-serif text-xl border-4 border-slate-50 z-10 shadow-xl group-hover:scale-110 transition duration-300">
                                        <i class="fas fa-check"></i></div>
                                <div
                                        class="bg-navy p-10 border border-navy shadow-2xl rounded-sm relative overflow-hidden">
                                        <div
                                                class="absolute -right-10 -top-10 w-40 h-40 bg-gold/10 rounded-full blur-3xl">
                                        </div>
                                        <span
                                                class="text-white/50 text-[10px] font-bold uppercase tracking-[0.2em] mb-3 block">Day
                                                45: Activation</span>
                                        <h3 class="font-bold text-2xl text-white mb-3">Go Live</h3>
                                        <p class="text-white/80 text-sm leading-relaxed">
                                                First payroll execution. FICA savings are realized immediately. Benefits
                                                become active. The system begins its automated cycle. <span
                                                        class="font-bold text-white">Your Lift: Zero.</span>
                                        </p>
                                </div>
                        </div>
                </div>
        </div>

        <!-- ================================================================================= -->
        <!-- VIEW: CONTACT (AUDIT)                                                             -->
        <!-- ================================================================================= -->
        <div id="contact" class="page-section flex-grow">
                <header class="page-header-spacer bg-slate-50">
                        <div class="max-w-4xl mx-auto px-4 text-center">
                                <h1 class="text-5xl font-serif text-navy">Feasibility Audit</h1>
                                <p class="text-slate-500 mt-6 text-lg font-light">
                                        We do not conduct sales calls. We conduct audits to determine eligibility for
                                        the W.I.M.P.E.R. protocol.
                                </p>
                        </div>
                </header>

                <div class="max-w-2xl mx-auto px-4 py-20">
                        <div class="bg-white p-12 shadow-2xl border-t-4 border-navy rounded-sm relative">
                                <form class="space-y-8">
                                        <div class="grid grid-cols-2 gap-8">
                                                <div>
                                                        <label
                                                                class="block text-[10px] font-bold text-slate-400 uppercase tracking-[0.15em] mb-3">Company
                                                                Name</label>
                                                        <input type="text"
                                                                class="w-full p-3 border-b border-slate-200 bg-transparent focus:border-navy outline-none transition font-serif text-lg">
                                                </div>
                                                <div>
                                                        <label
                                                                class="block text-[10px] font-bold text-slate-400 uppercase tracking-[0.15em] mb-3">W-2
                                                                Count</label>
                                                        <input type="number"
                                                                class="w-full p-3 border-b border-slate-200 bg-transparent focus:border-navy outline-none transition font-serif text-lg">
                                                </div>
                                        </div>
                                        <div>
                                                <label
                                                        class="block text-[10px] font-bold text-slate-400 uppercase tracking-[0.15em] mb-3">Payroll
                                                        Provider</label>
                                                <input type="text"
                                                        class="w-full p-3 border-b border-slate-200 bg-transparent focus:border-navy outline-none transition font-serif text-lg"
                                                        placeholder="e.g. ADP, Paychex, Workday">
                                        </div>
                                        <div>
                                                <label
                                                        class="block text-[10px] font-bold text-slate-400 uppercase tracking-[0.15em] mb-3">Executive
                                                        Contact Email</label>
                                                <input type="email"
                                                        class="w-full p-3 border-b border-slate-200 bg-transparent focus:border-navy outline-none transition font-serif text-lg">
                                        </div>
                                        <div class="pt-8">
                                                <button type="button"
                                                        class="w-full bg-navy text-white font-bold py-5 hover:bg-slate-800 transition tracking-[0.2em] text-xs uppercase shadow-lg">
                                                        Request FICA Analysis
                                                </button>
                                        </div>
                                </form>
                        </div>
                </div>
        </div>

        <!-- FOOTER -->
        <footer class="bg-navy text-slate-400 py-20 border-t border-slate-800 mt-auto">
                <div
                        class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center text-xs">
                        <div class="mb-8 md:mb-0 text-center md:text-left">
                                <span class="text-white font-serif text-xl tracking-wide block mb-2">ACH</span>
                                <span class="text-slate-500 uppercase tracking-widest text-[10px]">Advanced Corporate
                                        Health &copy; 2025</span>
                        </div>
                        <div class="flex space-x-10">
                                <a href="#"
                                        class="hover:text-white transition uppercase tracking-widest text-[10px]">W.I.M.P.E.R.
                                        Compliance</a>
                                <a href="#"
                                        class="hover:text-white transition uppercase tracking-widest text-[10px]">Privacy
                                        Protocol</a>
                                <a href="#"
                                        class="hover:text-white transition uppercase tracking-widest text-[10px]">Legal</a>
                        </div>
                </div>
        </footer>

        <!-- LOGIC -->
        <script>
                function navigateTo(pageId) {
                        document.querySelectorAll('.page-section').forEach(el => el.classList.remove('active'));
                        document.getElementById(pageId).classList.add('active');
                        window.scrollTo(0, 0);
                }

                function scrollToId(elementId) {
                        const element = document.getElementById(elementId);
                        if (element) element.scrollIntoView({ behavior: 'smooth' });
                }

                const formatter = new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD', maximumFractionDigits: 2 });
                const roundFormatter = new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD', maximumFractionDigits: 0 });

                function calculateBoth() {
                        // Employer
                        const countInput = document.getElementById('employeeCount');
                        let count = parseInt(countInput.value) || 0;
                        if (count < 0) count = 0;

                        const savingsPerEmployee = 1100;
                        const totalEmployerSavings = count * savingsPerEmployee;
                        const employerEl = document.getElementById('employerSavings');
                        if (employerEl) employerEl.innerText = roundFormatter.format(totalEmployerSavings);

                        // Employee
                        const salaryInput = document.getElementById('annualSalary');
                        let salary = parseFloat(salaryInput.value) || 0;

                        const freqInput = document.getElementById('payFrequency');
                        let payPeriods = parseInt(freqInput.value) || 26; // Default Bi-Weekly

                        // --- Updated Logic based on User Request ---
                        // 1. Calculate Estimated Tax Savings on $1200 premium (approx 30% tax rate)
                        const monthlyPremium = 1200;
                        const estTaxRate = 0.30;
                        const monthlyTaxSavings = monthlyPremium * estTaxRate; // ~$360

                        // 2. Deduction of $129 "comes out"
                        const monthlyDeduction = 129;
                        const monthlyNetIncrease = monthlyTaxSavings - monthlyDeduction; // ~$231 Net

                        // 3. Convert to Paycheck frequency
                        // Formula: (Monthly Net * 12) / PayPeriods
                        const annualNetIncrease = monthlyNetIncrease * 12;
                        const perPaycheckIncrease = annualNetIncrease / payPeriods;

                        const employeeEl = document.getElementById('employeeSavings');
                        if (employeeEl) employeeEl.innerText = formatter.format(perPaycheckIncrease);

                        // Sub-values for transparency
                        const grossSavingsMonthly = monthlyTaxSavings;
                        const grossSavingsPaycheck = (grossSavingsMonthly * 12) / payPeriods;

                        const deductionPaycheck = (monthlyDeduction * 12) / payPeriods;

                        document.getElementById('grossSavingsVal').innerText = formatter.format(grossSavingsPaycheck);
                        document.getElementById('progCostVal').innerText = "-" + formatter.format(deductionPaycheck);
                }

                // Init
                calculateBoth();
        </script>
        <?php wp_footer(); ?>
</body>

</html>
<?php
/**
 * WIMPER Financial Calculator Section
 *
 * @package wimper
 */
?>

<!-- FINANCIAL IMPACT CALCULATOR -->
<section id="impact" class="py-32 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-end mb-16">
            <div>
                <h2 class="text-4xl font-serif text-navy">Financial Modeling</h2>
                <p class="text-slate-500 mt-4 max-w-xl font-light">
                    Input your workforce data. Our model applies progressive tax bracket logic to calculate precise net
                    pay impact for all salary levels.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Employer Side -->
            <div class="bg-white p-12 shadow-2xl border-t-4 border-gold relative overflow-hidden">
                <div class="relative z-10">
                    <div class="flex justify-between items-center mb-10">
                        <h3 class="text-xl font-bold text-navy uppercase tracking-wide">Corporate Impact</h3>
                        <i class="fas fa-building text-slate-200 text-3xl"></i>
                    </div>
                    <div class="mb-12">
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-[0.15em] mb-4">W-2
                            Headcount (Min 10)</label>
                        <input type="number" id="employeeCount" value="50" min="10"
                            class="w-full bg-slate-50 border-b-2 border-slate-200 p-4 text-3xl text-navy font-serif focus:border-gold focus:outline-none transition"
                            oninput="calculateBoth()">
                    </div>
                    <div class="bg-navy p-10 text-white relative overflow-hidden rounded-sm">
                        <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-white/5 rounded-full blur-2xl">
                        </div>
                        <div class="relative z-10">
                            <span class="text-slate-400 text-[10px] uppercase tracking-[0.2em] block mb-2">Projected
                                EBITDA Recapture</span>
                            <span class="text-5xl font-serif text-gold" id="employerSavings">$55,000</span>
                            <p class="text-xs text-slate-500 mt-4 border-t border-white/10 pt-4">Funds realized
                                immediately upon first payroll run.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Employee Side -->
            <div class="bg-white p-12 shadow-2xl border-t-4 border-slate-200 relative">
                <div class="flex justify-between items-center mb-8">
                    <h3 class="text-xl font-bold text-navy uppercase tracking-wide">Workforce Impact</h3>
                    <i class="fas fa-user text-slate-200 text-3xl"></i>
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
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-[0.15em] mb-2">Pay
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
                        <span class="text-xs text-slate-400 uppercase tracking-widest">Est. Effective Tax Rate</span>
                        <span class="text-xs font-bold text-slate-500" id="taxRateDisplay">30%</span>
                    </div>
                    <div class="w-full h-px bg-slate-100 mb-4"></div>

                    <div class="flex justify-between items-center mb-4">
                        <span class="text-sm font-bold text-green-600"><i class="fas fa-plus mr-2"></i>Tax Savings
                            (Gained)</span>
                        <span class="font-mono text-green-600 font-bold" id="taxSavingsDisplay">$0.00</span>
                    </div>
                    <div class="flex justify-between items-center mb-6 pb-6 border-b border-slate-300 border-dashed">
                        <span class="text-sm font-bold text-red-400"><i class="fas fa-minus mr-2"></i>Program
                            Deduction</span>
                        <span class="font-mono text-red-400" id="deductionDisplay">$0.00</span>
                    </div>

                    <div class="flex justify-between items-start">
                        <div>
                            <span class="text-navy font-bold text-lg block">Net Pay Increase</span>
                            <span class="text-[10px] uppercase tracking-wider text-slate-400" id="freqLabel">Per
                                Paycheck</span>
                        </div>
                        <span class="text-4xl font-serif text-navy" id="employeeSavings">$0.00</span>
                    </div>
                </div>
                <p class="text-center text-xs text-slate-400 mt-6 italic">
                    *The deduction ($129/mo) is offset entirely by the pre-tax savings, leaving a net surplus in the
                    paycheck.
                </p>
            </div>
        </div>
    </div>
</section>

<script>
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
        // Employer
        const countInput = document.getElementById('employeeCount');
        let count = parseInt(countInput.value) || 0;
        if (count < 0) count = 0;

        const savingsPerEmployee = 1100;
        const totalEmployerSavings = count * savingsPerEmployee;
        const employerEl = document.getElementById('employerSavings');
        if (employerEl) employerEl.innerText = roundFormatter.format(totalEmployerSavings);

        // Employee Logic
        const salaryInput = document.getElementById('annualSalary');
        let salary = parseFloat(salaryInput.value) || 0;

        const freqInput = document.getElementById('payFrequency');
        let payPeriods = parseInt(freqInput.value) || 26;

        const monthlyPremium = 1200;
        const estTaxRate = getEstimatedTaxRate(salary);
        const monthlyTaxSavings = monthlyPremium * estTaxRate;

        const monthlyDeduction = 129;
        const monthlyNetIncrease = monthlyTaxSavings - monthlyDeduction;

        const taxSavingsPerCheck = (monthlyTaxSavings * 12) / payPeriods;
        const deductionPerCheck = (monthlyDeduction * 12) / payPeriods;
        const netIncreasePerCheck = (monthlyNetIncrease * 12) / payPeriods;

        document.getElementById('employeeSavings').innerText = formatter.format(netIncreasePerCheck);
        document.getElementById('taxSavingsDisplay').innerText = "+" + formatter.format(taxSavingsPerCheck);
        document.getElementById('deductionDisplay').innerText = "-" + formatter.format(deductionPerCheck);
        document.getElementById('taxRateDisplay').innerText = (estTaxRate * 100).toFixed(1) + "%";

        const freqText = freqInput.options[freqInput.selectedIndex].text;
        document.getElementById('freqLabel').innerText = "Per " + freqText + " Paycheck";
    }

    // Init
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', calculateBoth);
    } else {
        calculateBoth();
    }
</script>

<style>
    .text-navy {
        color: #020617;
    }

    .border-gold {
        border-color: #d4af37;
    }

    .bg-gold {
        background-color: #d4af37;
    }

    .text-gold {
        color: #d4af37;
    }

    .focus\:border-gold:focus {
        border-color: #d4af37;
    }
</style>
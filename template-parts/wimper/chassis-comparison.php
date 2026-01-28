<?php
/**
 * WIMPER Chassis - Comparison Table
 *
 * @package wimper
 */
?>

<!-- COMPARISON TABLE -->
<div class="max-w-6xl mx-auto px-4 pb-24">
    <div class="bg-white shadow-2xl border border-slate-100 rounded-sm overflow-hidden">
        <div class="grid grid-cols-1 md:grid-cols-3">
            <!-- Column 1: Labels -->
            <div
                class="bg-slate-50 p-8 border-b md:border-b-0 md:border-r border-slate-200 flex flex-col justify-center">
                <h3 class="text-xl font-bold text-slate-400 uppercase tracking-widest mb-2">Market Analysis</h3>
                <p class="text-xs text-slate-500">Why general vendors fail.</p>
            </div>

            <!-- Column 2: Competitors -->
            <div
                class="p-8 border-b md:border-b-0 md:border-r border-slate-200 bg-white opacity-50 hover:opacity-100 transition">
                <h4 class="text-lg font-bold text-slate-600 mb-6">General Wellness Vendor</h4>
                <ul class="space-y-4 text-sm text-slate-500">
                    <li class="flex items-center"><i class="fas fa-times text-red-300 mr-3 w-4"></i> Focuses on "Steps &
                        Water"</li>
                    <li class="flex items-center"><i class="fas fa-times text-red-300 mr-3 w-4"></i> Costs Money (Line
                        Item Expense)</li>
                    <li class="flex items-center"><i class="fas fa-times text-red-300 mr-3 w-4"></i> No Tax Integration
                    </li>
                    <li class="flex items-center"><i class="fas fa-times text-red-300 mr-3 w-4"></i> Internal Compliance
                        Risk</li>
                </ul>
            </div>

            <!-- Column 3: WIMPER -->
            <div class="p-8 bg-navy text-white relative overflow-hidden group">
                <div
                    class="absolute top-0 right-0 w-20 h-20 bg-gold/20 rounded-bl-full group-hover:bg-gold/30 transition">
                </div>
                <h4 class="text-lg font-bold text-white mb-6">W.I.M.P.E.R. Protocol</h4>
                <ul class="space-y-4 text-sm text-slate-300">
                    <li class="flex items-center"><i class="fas fa-check text-gold mr-3 w-4"></i> Focuses on FICA
                        Mitigation</li>
                    <li class="flex items-center"><i class="fas fa-check text-gold mr-3 w-4"></i> Makes Money (EBITDA
                        Growth)</li>
                    <li class="flex items-center"><i class="fas fa-check text-gold mr-3 w-4"></i> Light Admin (Standard
                        Payroll)</li>
                    <li class="flex items-center"><i class="fas fa-check text-gold mr-3 w-4"></i> Indemnified Compliance
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<style>
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
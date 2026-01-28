<?php
/**
 * Template Part: Growth Journey Graph
 * Interactive bar graph showing developmental progress
 *
 * @package kidazzle
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<section class="py-24 bg-white border-t border-slate-100">
    <div class="container mx-auto px-4 text-center mb-12">
        <h2 class="text-4xl font-extrabold text-slate-900">
            <?php esc_html_e('The KIDazzle Growth Journey', 'kidazzle'); ?>
        </h2>
        <p class="text-slate-600 mt-4 max-w-2xl mx-auto">
            <?php esc_html_e('See how our curriculum adapts to your child\'s developing mind at every stage.', 'kidazzle'); ?>
        </p>
    </div>
    <div class="max-w-5xl mx-auto bg-slate-50 rounded-[3rem] p-10 shadow-xl border border-slate-200">
        <!-- Stage Buttons -->
        <div class="flex justify-center gap-4 mb-10 flex-wrap" id="stage-buttons">
            <!-- Injected via JS -->
        </div>

        <div class="grid md:grid-cols-3 gap-10 items-center">
            <div class="md:col-span-1 text-left" id="stage-content">
                <!-- Text Injected via JS -->
            </div>
            <!-- Bar Graph -->
            <div class="md:col-span-2 h-64 flex items-end justify-between px-4 border-b border-slate-300 relative"
                id="graph-bars">
                <!-- Bars Injected via JS -->
            </div>
        </div>
        <!-- Labels -->
        <div class="grid md:grid-cols-3 gap-10">
            <div class="md:col-span-1"></div>
            <div class="md:col-span-2 flex justify-between px-4 mt-4" id="graph-labels">
                <!-- Labels Injected via JS -->
            </div>
        </div>
    </div>
</section>

<style>
    .graph-bar {
        transition: height 1s cubic-bezier(0.4, 0, 0.2, 1);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Growth Data with hex colors instead of Tailwind classes
        const growthData = {
            infants: { label: "Infants", sub: "6w-12m", desc: "Focus on trust, sensory, and bonding.", stats: [{ val: 90, color: "#ef4444", lbl: "Motor" }, { val: 70, color: "#fb923c", lbl: "Sensory" }, { val: 80, color: "#facc15", lbl: "Social" }, { val: 40, color: "#22c55e", lbl: "Lang" }, { val: 20, color: "#06b6d4", lbl: "Logic" }] },
            toddlers: { label: "Toddlers", sub: "12m-24m", desc: "Active exploration and vocabulary.", stats: [{ val: 85, color: "#ef4444", lbl: "Motor" }, { val: 60, color: "#fb923c", lbl: "Sensory" }, { val: 70, color: "#facc15", lbl: "Social" }, { val: 85, color: "#22c55e", lbl: "Lang" }, { val: 40, color: "#06b6d4", lbl: "Logic" }] },
            preschool: { label: "Preschool", sub: "2y-3y", desc: "Independence and early academics.", stats: [{ val: 60, color: "#ef4444", lbl: "Motor" }, { val: 85, color: "#fb923c", lbl: "Sensory" }, { val: 90, color: "#facc15", lbl: "Social" }, { val: 80, color: "#22c55e", lbl: "Lang" }, { val: 60, color: "#06b6d4", lbl: "Logic" }] },
            prek: { label: "Pre-K", sub: "4y-5y", desc: "Kindergarten readiness and literacy.", stats: [{ val: 50, color: "#ef4444", lbl: "Motor" }, { val: 70, color: "#fb923c", lbl: "Sensory" }, { val: 85, color: "#facc15", lbl: "Social" }, { val: 95, color: "#22c55e", lbl: "Lang" }, { val: 90, color: "#06b6d4", lbl: "Logic" }] }
        };

        // Render Function
        window.renderGraph = function (stage) {
            const data = growthData[stage];

            // Buttons
            document.getElementById('stage-buttons').innerHTML = Object.keys(growthData).map(k =>
                `<button onclick="renderGraph('${k}')" class="px-4 py-2 rounded-full border border-slate-200 hover:bg-slate-100 ${k === stage ? 'bg-slate-900 text-white hover:bg-slate-800' : ''}">${growthData[k].label}</button>`
            ).join('');

            // Content
            document.getElementById('stage-content').innerHTML = `<h3 class="text-2xl font-bold mb-2 text-slate-900">${data.label}</h3><span class="bg-slate-200 text-slate-700 px-2 py-1 rounded text-sm font-bold mb-4 inline-block">${data.sub}</span><p class="text-slate-600">${data.desc}</p>`;

            // Bars with inline styles
            document.getElementById('graph-bars').innerHTML = data.stats.map(s =>
                `<div class="w-full mx-1 relative group h-full flex items-end"><div class="w-full rounded-t-lg graph-bar relative" style="height:${s.val}%; background-color: ${s.color}"><div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-slate-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition whitespace-nowrap">${s.val}%</div></div></div>`
            ).join('');

            // Labels
            document.getElementById('graph-labels').innerHTML = data.stats.map(s =>
                `<div class="text-center text-xs font-bold text-slate-500 w-full">${s.lbl}</div>`
            ).join('');
        }

        // Initialize
        renderGraph('infants');
    });
</script>
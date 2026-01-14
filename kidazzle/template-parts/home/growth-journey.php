<?php
/**
 * Template Part: Growth Journey Graph Section
 * Interactive developmental stage visualization
 *
 * @package kidazzle
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<section class="py-24 bg-white border-t border-slate-100">
    <div class="container mx-auto px-4 text-center mb-12">
        <h2 class="text-4xl font-extrabold text-slate-900"><?php esc_html_e('The KIDazzle Growth Journey', 'kidazzle'); ?></h2>
        <p class="text-slate-600 mt-4 max-w-2xl mx-auto"><?php esc_html_e('See how our curriculum adapts to your child\'s developing mind at every stage.', 'kidazzle'); ?></p>
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
            <div class="md:col-span-2 h-64 flex items-end justify-between px-4 border-b border-slate-300 relative" id="graph-bars">
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const growthData = {
        infants: { 
            label: "<?php echo esc_js(__('Infants', 'kidazzle')); ?>", 
            sub: "6w-12m", 
            desc: "<?php echo esc_js(__('Focus on trust, sensory, and bonding.', 'kidazzle')); ?>", 
            stats: [
                {val:90, col:"bg-red-500", lbl:"<?php echo esc_js(__('Motor', 'kidazzle')); ?>"},
                {val:70, col:"bg-orange-400", lbl:"<?php echo esc_js(__('Sensory', 'kidazzle')); ?>"},
                {val:80, col:"bg-yellow-400", lbl:"<?php echo esc_js(__('Social', 'kidazzle')); ?>"},
                {val:40, col:"bg-green-500", lbl:"<?php echo esc_js(__('Lang', 'kidazzle')); ?>"},
                {val:20, col:"bg-cyan-500", lbl:"<?php echo esc_js(__('Logic', 'kidazzle')); ?>"}
            ]
        },
        toddlers: { 
            label: "<?php echo esc_js(__('Toddlers', 'kidazzle')); ?>", 
            sub: "12m-24m", 
            desc: "<?php echo esc_js(__('Active exploration and vocabulary.', 'kidazzle')); ?>", 
            stats: [
                {val:85, col:"bg-red-500", lbl:"<?php echo esc_js(__('Motor', 'kidazzle')); ?>"},
                {val:60, col:"bg-orange-400", lbl:"<?php echo esc_js(__('Sensory', 'kidazzle')); ?>"},
                {val:70, col:"bg-yellow-400", lbl:"<?php echo esc_js(__('Social', 'kidazzle')); ?>"},
                {val:85, col:"bg-green-500", lbl:"<?php echo esc_js(__('Lang', 'kidazzle')); ?>"},
                {val:40, col:"bg-cyan-500", lbl:"<?php echo esc_js(__('Logic', 'kidazzle')); ?>"}
            ]
        },
        preschool: { 
            label: "<?php echo esc_js(__('Preschool', 'kidazzle')); ?>", 
            sub: "2y-3y", 
            desc: "<?php echo esc_js(__('Independence and early academics.', 'kidazzle')); ?>", 
            stats: [
                {val:60, col:"bg-red-500", lbl:"<?php echo esc_js(__('Motor', 'kidazzle')); ?>"},
                {val:85, col:"bg-orange-400", lbl:"<?php echo esc_js(__('Sensory', 'kidazzle')); ?>"},
                {val:90, col:"bg-yellow-400", lbl:"<?php echo esc_js(__('Social', 'kidazzle')); ?>"},
                {val:80, col:"bg-green-500", lbl:"<?php echo esc_js(__('Lang', 'kidazzle')); ?>"},
                {val:60, col:"bg-cyan-500", lbl:"<?php echo esc_js(__('Logic', 'kidazzle')); ?>"}
            ]
        },
        prek: { 
            label: "<?php echo esc_js(__('Pre-K', 'kidazzle')); ?>", 
            sub: "4y-5y", 
            desc: "<?php echo esc_js(__('Kindergarten readiness and literacy.', 'kidazzle')); ?>", 
            stats: [
                {val:50, col:"bg-red-500", lbl:"<?php echo esc_js(__('Motor', 'kidazzle')); ?>"},
                {val:70, col:"bg-orange-400", lbl:"<?php echo esc_js(__('Sensory', 'kidazzle')); ?>"},
                {val:85, col:"bg-yellow-400", lbl:"<?php echo esc_js(__('Social', 'kidazzle')); ?>"},
                {val:95, col:"bg-green-500", lbl:"<?php echo esc_js(__('Lang', 'kidazzle')); ?>"},
                {val:90, col:"bg-cyan-500", lbl:"<?php echo esc_js(__('Logic', 'kidazzle')); ?>"}
            ]
        }
    };

    function renderGraph(stage) {
        const data = growthData[stage];
        const stageButtons = document.getElementById('stage-buttons');
        const stageContent = document.getElementById('stage-content');
        const graphBars = document.getElementById('graph-bars');
        const graphLabels = document.getElementById('graph-labels');
        
        if (!stageButtons || !stageContent || !graphBars || !graphLabels) return;
        
        stageButtons.innerHTML = Object.keys(growthData).map(k =>
            `<button onclick="window.renderGrowthGraph('${k}')" class="px-4 py-2 rounded-full border border-slate-200 hover:bg-slate-100 ${k===stage ? 'bg-slate-900 text-white hover:bg-slate-800' : ''}">${growthData[k].label}</button>`
        ).join('');
        
        stageContent.innerHTML = `<h3 class="text-2xl font-bold mb-2">${data.label}</h3><span class="bg-slate-100 px-2 py-1 rounded text-sm font-bold mb-4 inline-block">${data.sub}</span><p class="text-slate-600">${data.desc}</p>`;
        
        graphBars.innerHTML = data.stats.map(s =>
            `<div class="w-full mx-1 relative group h-full flex items-end"><div class="w-full rounded-t-lg ${s.col} graph-bar relative" style="height:${s.val}%"><div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-slate-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition">${s.val}%</div></div></div>`
        ).join('');
        
        graphLabels.innerHTML = data.stats.map(s =>
            `<div class="text-center text-xs font-bold text-slate-500 w-full">${s.lbl}</div>`
        ).join('');
    }
    
    // Make function globally accessible
    window.renderGrowthGraph = renderGraph;
    
    // Initialize with infants
    renderGraph('infants');
});
</script>

<style>
.graph-bar { 
    transition: height 1s cubic-bezier(0.4, 0, 0.2, 1); 
}
</style>

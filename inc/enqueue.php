<?php
/**
 * Enqueue scripts and styles.
 *
 * @package kidazzle
 */

if (!defined('ABSPATH')) {
        exit; // Exit if accessed directly.
}

/**
 * Determine whether map assets should be enqueued.
 */
function kidazzle_should_load_maps()
{
        $should_load_maps = is_post_type_archive('location') || is_singular('location') || is_page('locations');

        if (is_front_page() && function_exists('kidazzle_home_locations_preview')) {
                $locations_preview = kidazzle_home_locations_preview();
                $should_load_maps = $should_load_maps || (!empty($locations_preview['map_points']));
        }

        return $should_load_maps;
}

/**
 * Enqueue theme styles and scripts
 */
function kidazzle_enqueue_assets()
{
        // DEBUG: Confirm this function is executing
        echo '<!-- DEBUG: kidazzle_enqueue_assets is running -->';

        $script_dependencies = array('jquery');

        // Font Awesome (Subset)
        $fa_path = KIDAZZLE_THEME_DIR . '/assets/css/font-awesome-subset.css';
        $fa_version = file_exists($fa_path) ? filemtime($fa_path) : '6.4.0';
        wp_enqueue_style(
                'KIDazzle-font-awesome',
                KIDAZZLE_THEME_URI . '/assets/css/font-awesome-subset.css',
                array(),
                $fa_version,
                'all'
        );

        if (is_front_page()) {
                $chart_js_path = KIDAZZLE_THEME_DIR . '/assets/js/chart.min.js';
                $chart_js_version = file_exists($chart_js_path) ? filemtime($chart_js_path) : '4.4.1';

                wp_enqueue_script(
                        'chartjs',
                        KIDAZZLE_THEME_URI . '/assets/js/chart.min.js',
                        array(),
                        $chart_js_version,
                        true
                );

                wp_script_add_data('chartjs', 'defer', true);
                $script_dependencies[] = 'chartjs';
        }

        // Lucide Icons (used throughout the theme for icons with data-lucide attributes)
        wp_enqueue_script(
                'lucide-icons',
                'https://unpkg.com/lucide@latest',
                array(),
                null,
                true
        );
        // Initialize Lucide icons after page load
        wp_add_inline_script('lucide-icons', 'document.addEventListener("DOMContentLoaded", function() { if(window.lucide) { lucide.createIcons(); } });');

        // Compiled Tailwind CSS.
        $css_path = KIDAZZLE_THEME_DIR . '/assets/css/main.css';
        $css_version = file_exists($css_path) ? filemtime($css_path) : kidazzle_VERSION;

        // Compiled Tailwind CSS - loads synchronously
        wp_enqueue_style(
                'KIDazzle-main',
                KIDAZZLE_THEME_URI . '/assets/css/main.css',
                array(),
                $css_version,
                'all' // Load normally to prevent FOUC
        );

        // CRITICAL ACCESSIBILITY FIXES + HOMEPAGE TAILWIND UTILITIES
        $custom_css = "
                /* ============================================
                   NEW HOMEPAGE - MISSING TAILWIND UTILITIES  
                   ============================================ */
                   
                html { scroll-behavior: smooth; }
                
                /* Height utilities */
                .h-\\[700px\\] { height: 700px; }
                .h-96 { height: 24rem; }
                .h-64 { height: 16rem; }
                .h-48 { height: 12rem; }
                .h-2\\/3 { height: 66.666667%; }
                
                /* Background with opacity modifiers */
                .bg-white\\/20 { background-color: rgba(255, 255, 255, 0.2); }
                .bg-white\\/60 { background-color: rgba(255, 255, 255, 0.6); }
                .bg-white\\/80 { background-color: rgba(255, 255, 255, 0.8); }
                .bg-white\\/10 { background-color: rgba(255, 255, 255, 0.1); }
                .bg-black\\/50 { background-color: rgba(0, 0, 0, 0.5); }
                .bg-black\\/60 { background-color: rgba(0, 0, 0, 0.6); }
                .border-white\\/20 { border-color: rgba(255, 255, 255, 0.2); }
                .border-white\\/30 { border-color: rgba(255, 255, 255, 0.3); }
                
                /* Yellow palette */
                .bg-yellow-400 { background-color: #facc15; }
                .bg-yellow-500 { background-color: #eab308; }
                .text-yellow-400 { color: #facc15; }
                .text-yellow-500 { color: #eab308; }
                .text-yellow-600 { color: #ca8a04; }
                .fill-yellow-400 { fill: #facc15; }
                .border-yellow-400 { border-color: #facc15; }
                .hover\\:bg-yellow-500:hover { background-color: #eab308; }
                
                /* Slate palette */
                .bg-slate-50 { background-color: #f8fafc; }
                .bg-slate-100 { background-color: #f1f5f9; }
                .bg-slate-900 { background-color: #0f172a; }
                .bg-slate-800 { background-color: #1e293b; }
                .text-slate-500 { color: #64748b; }
                .text-slate-600 { color: #475569; }
                .text-slate-900 { color: #0f172a; }
                .border-slate-100 { border-color: #f1f5f9; }
                .border-slate-200 { border-color: #e2e8f0; }
                .border-slate-300 { border-color: #cbd5e1; }
                .hover\\:bg-slate-100:hover { background-color: #f1f5f9; }
                .hover\\:bg-slate-800:hover { background-color: #1e293b; }
                
                /* Other color palettes */
                .bg-red-500 { background-color: #ef4444; }
                .bg-orange-400 { background-color: #fb923c; }
                .bg-orange-50 { background-color: #fff7ed; }
                .bg-orange-600 { background-color: #ea580c; }
                .bg-green-500 { background-color: #22c55e; }
                .bg-cyan-500 { background-color: #06b6d4; }
                .bg-cyan-50 { background-color: #ecfeff; }
                .bg-cyan-600 { background-color: #0891b2; }
                .bg-indigo-50 { background-color: #eef2ff; }
                .bg-indigo-600 { background-color: #4f46e5; }
                .bg-purple-100 { background-color: #f3e8ff; }
                .text-red-500 { color: #ef4444; }
                .text-red-600 { color: #dc2626; }
                .text-orange-500 { color: #f97316; }
                .text-orange-600 { color: #ea580c; }
                .text-cyan-600 { color: #0891b2; }
                .text-cyan-700 { color: #0e7490; }
                .text-indigo-600 { color: #4f46e5; }
                .text-purple-100 { color: #f3e8ff; }
                .text-purple-700 { color: #7c3aed; }
                .fill-orange-600 { fill: #ea580c; }
                .hover\\:bg-purple-50:hover { background-color: #faf5ff; }
                .hover\\:border-cyan-600:hover { border-color: #0891b2; }
                .hover\\:text-cyan-700:hover { color: #0e7490; }
                
                /* Gradients */
                .bg-gradient-to-r { background-image: linear-gradient(to right, var(--tw-gradient-stops)); }
                .from-red-600 { --tw-gradient-from: #dc2626; --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(220, 38, 38, 0)); }
                .via-yellow-600 { --tw-gradient-stops: var(--tw-gradient-from), #ca8a04, var(--tw-gradient-to, rgba(202, 138, 4, 0)); }
                .to-cyan-700 { --tw-gradient-to: #0e7490; }
                .text-transparent { color: transparent; }
                .bg-clip-text { -webkit-background-clip: text; background-clip: text; }
                
                /* Purple Ombre for CTA */
                .bg-ombre-purple { background: linear-gradient(135deg, #4c1d95 0%, #7c3aed 50%, #c026d3 100%); }
                
                /* Backdrop blur */
                .backdrop-blur-md { -webkit-backdrop-filter: blur(12px); backdrop-filter: blur(12px); }
                .backdrop-blur-sm { -webkit-backdrop-filter: blur(4px); backdrop-filter: blur(4px); }
                
                /* Border radius */
                .rounded-\\[2rem\\] { border-radius: 2rem; }
                .rounded-\\[2\\.5rem\\] { border-radius: 2.5rem; }
                .rounded-\\[3rem\\] { border-radius: 3rem; }
                .rounded-2xl { border-radius: 1rem; }
                .rounded-3xl { border-radius: 1.5rem; }
                .rounded-full { border-radius: 9999px; }
                .rounded-t-lg { border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem; }
                
                /* Border widths */
                .border-l-\\[12px\\] { border-left-width: 12px; }
                .border-2 { border-width: 2px; }
                .border-4 { border-width: 4px; }
                
                /* Shadows */
                .shadow-lg { box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); }
                .shadow-xl { box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04); }
                .shadow-2xl { box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); }
                .shadow-md { box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); }
                .shadow-sm { box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); }
                .hover\\:shadow-2xl:hover { box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); }
                
                /* Transforms */
                .transform { transform: translateX(var(--tw-translate-x, 0)) translateY(var(--tw-translate-y, 0)) rotate(var(--tw-rotate, 0)) skewX(var(--tw-skew-x, 0)) skewY(var(--tw-skew-y, 0)) scaleX(var(--tw-scale-x, 1)) scaleY(var(--tw-scale-y, 1)); }
                .hover\\:-translate-y-1:hover { --tw-translate-y: -0.25rem; transform: translateY(-0.25rem); }
                .hover\\:-translate-y-2:hover { --tw-translate-y: -0.5rem; transform: translateY(-0.5rem); }
                .-translate-x-1\\/2 { --tw-translate-x: -50%; transform: translateX(-50%); }
                .group:hover .group-hover\\:scale-105 { --tw-scale-x: 1.05; --tw-scale-y: 1.05; transform: scale(1.05); }
                .group:hover .group-hover\\:scale-110 { --tw-scale-x: 1.1; --tw-scale-y: 1.1; transform: scale(1.1); }
                
                /* Transitions */
                .transition { transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-duration: 150ms; }
                .transition-all { transition-property: all; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-duration: 150ms; }
                .duration-300 { transition-duration: 300ms; }
                .duration-700 { transition-duration: 700ms; }
                
                /* Growth Journey bars */
                .graph-bar { transition: height 1s cubic-bezier(0.4, 0, 0.2, 1); }
                
                /* Flexbox */
                .flex { display: flex; }
                .inline-flex { display: inline-flex; }
                .flex-col { flex-direction: column; }
                .flex-grow { flex-grow: 1; }
                .flex-shrink-0 { flex-shrink: 0; }
                .flex-wrap { flex-wrap: wrap; }
                .items-center { align-items: center; }
                .items-end { align-items: flex-end; }
                .items-start { align-items: flex-start; }
                .justify-center { justify-content: center; }
                .justify-between { justify-content: space-between; }
                .gap-1 { gap: 0.25rem; }
                .gap-2 { gap: 0.5rem; }
                .gap-3 { gap: 0.75rem; }
                .gap-4 { gap: 1rem; }
                .gap-6 { gap: 1.5rem; }
                .gap-8 { gap: 2rem; }
                .gap-10 { gap: 2.5rem; }
                .gap-12 { gap: 3rem; }
                
                /* Grid */
                .grid { display: grid; }
                .grid-cols-3 { grid-template-columns: repeat(3, minmax(0, 1fr)); }
                .md\\:grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
                .md\\:grid-cols-3 { grid-template-columns: repeat(3, minmax(0, 1fr)); }
                .lg\\:grid-cols-3 { grid-template-columns: repeat(3, minmax(0, 1fr)); }
                .md\\:col-span-1 { grid-column: span 1 / span 1; }
                .md\\:col-span-2 { grid-column: span 2 / span 2; }
                
                /* Spacing */
                .p-8 { padding: 2rem; }
                .p-10 { padding: 2.5rem; }
                .p-12 { padding: 3rem; }
                .px-3 { padding-left: 0.75rem; padding-right: 0.75rem; }
                .px-4 { padding-left: 1rem; padding-right: 1rem; }
                .px-8 { padding-left: 2rem; padding-right: 2rem; }
                .px-10 { padding-left: 2.5rem; padding-right: 2.5rem; }
                .py-1\\.5 { padding-top: 0.375rem; padding-bottom: 0.375rem; }
                .py-2 { padding-top: 0.5rem; padding-bottom: 0.5rem; }
                .py-3 { padding-top: 0.75rem; padding-bottom: 0.75rem; }
                .py-4 { padding-top: 1rem; padding-bottom: 1rem; }
                .py-16 { padding-top: 4rem; padding-bottom: 4rem; }
                .py-20 { padding-top: 5rem; padding-bottom: 5rem; }
                .py-24 { padding-top: 6rem; padding-bottom: 6rem; }
                .mb-1 { margin-bottom: 0.25rem; }
                .mb-2 { margin-bottom: 0.5rem; }
                .mb-4 { margin-bottom: 1rem; }
                .mb-6 { margin-bottom: 1.5rem; }
                .mb-8 { margin-bottom: 2rem; }
                .mb-10 { margin-bottom: 2.5rem; }
                .mb-12 { margin-bottom: 3rem; }
                .mb-16 { margin-bottom: 4rem; }
                .mt-4 { margin-top: 1rem; }
                .mx-1 { margin-left: 0.25rem; margin-right: 0.25rem; }
                .mx-auto { margin-left: auto; margin-right: auto; }
                .ml-1 { margin-left: 0.25rem; }
                .-top-5 { top: -1.25rem; }
                .-top-8 { top: -2rem; }
                
                /* Typography */
                .text-xs { font-size: 0.75rem; line-height: 1rem; }
                .text-sm { font-size: 0.875rem; line-height: 1.25rem; }
                .text-lg { font-size: 1.125rem; line-height: 1.75rem; }
                .text-xl { font-size: 1.25rem; line-height: 1.75rem; }
                .text-2xl { font-size: 1.5rem; line-height: 2rem; }
                .text-3xl { font-size: 1.875rem; line-height: 2.25rem; }
                .text-4xl { font-size: 2.25rem; line-height: 2.5rem; }
                .text-5xl { font-size: 3rem; line-height: 1; }
                .md\\:text-7xl { font-size: 4.5rem; line-height: 1; }
                .font-bold { font-weight: 700; }
                .font-extrabold { font-weight: 800; }
                .font-medium { font-weight: 500; }
                .uppercase { text-transform: uppercase; }
                .tracking-wider { letter-spacing: 0.05em; }
                .tracking-widest { letter-spacing: 0.1em; }
                .leading-tight { line-height: 1.25; }
                .leading-relaxed { line-height: 1.625; }
                .text-center { text-align: center; }
                .text-left { text-align: left; }
                .drop-shadow-sm { filter: drop-shadow(0 1px 1px rgba(0, 0, 0, 0.05)); }
                .drop-shadow-md { filter: drop-shadow(0 4px 3px rgba(0, 0, 0, 0.07)) drop-shadow(0 2px 2px rgba(0, 0, 0, 0.06)); }
                .drop-shadow-lg { filter: drop-shadow(0 10px 8px rgba(0, 0, 0, 0.04)) drop-shadow(0 4px 3px rgba(0, 0, 0, 0.1)); }
                
                /* Positioning */
                .relative { position: relative; }
                .absolute { position: absolute; }
                .fixed { position: fixed; }
                .inset-0 { top: 0; right: 0; bottom: 0; left: 0; }
                .z-0 { z-index: 0; }
                .z-10 { z-index: 10; }
                .z-30 { z-index: 30; }
                .top-6 { top: 1.5rem; }
                .right-6 { right: 1.5rem; }
                .left-8 { left: 2rem; }
                .left-1\\/2 { left: 50%; }
                
                /* Sizing */
                .w-full { width: 100%; }
                .max-w-2xl { max-width: 42rem; }
                .max-w-3xl { max-width: 48rem; }
                .max-w-4xl { max-width: 56rem; }
                .max-w-5xl { max-width: 64rem; }
                .max-w-6xl { max-width: 72rem; }
                .w-3 { width: 0.75rem; }
                .w-4 { width: 1rem; }
                .w-5 { width: 1.25rem; }
                .w-7 { width: 1.75rem; }
                .h-3 { height: 0.75rem; }
                .h-4 { height: 1rem; }
                .h-5 { height: 1.25rem; }
                .h-7 { height: 1.75rem; }
                .h-full { height: 100%; }
                
                /* Display & Visibility */
                .hidden { display: none; }
                .block { display: block; }
                .inline-block { display: inline-block; }
                .overflow-hidden { overflow: hidden; }
                .object-cover { object-fit: cover; }
                
                /* Group hover for icons */
                .group:hover .group-hover\\:opacity-100 { opacity: 1; }
                .group:hover .group-hover\\:gap-2 { gap: 0.5rem; }
                .group:hover .group-hover\\:gap-3 { gap: 0.75rem; }
                .opacity-0 { opacity: 0; }
                .opacity-5 { opacity: 0.05; }
                
                /* ============================================
                   ACCESSIBILITY FIXES  
                   ============================================ */
                   
                /* Darkened Brand Colors for WCAG AA Compliance */
                .text-KIDazzle-red { color: #964030 !important; }
                .bg-KIDazzle-red { background-color: #964030 !important; }
                .text-KIDazzle-orange { color: #A8551E !important; }
                .bg-KIDazzle-orange { background-color: #A8551E !important; }
                .text-KIDazzle-green { color: #4D5C54 !important; }
                .bg-KIDazzle-green { background-color: #4D5C54 !important; }
                .text-KIDazzle-yellow { color: #8C6B2F !important; }
                .bg-KIDazzle-yellow { background-color: #8C6B2F !important; }
                
                /* Touch Target Fixes */
                footer .flex.gap-3 a {
                        width: 48px !important;
                        height: 48px !important;
                        display: flex !important;
                        align-items: center !important;
                        justify-content: center !important;
                }
                
                input[type='text'], input[type='email'], input[type='tel'], input[type='number'], select, textarea {
                        min-height: 48px !important;
                        font-size: 16px !important;
                }
                
                /* ============================================
                   ADDITIONAL MISSING CLASSES FROM AUDIT
                   ============================================ */
                   
                /* Extra heights */
                .h-\\[500px\\] { height: 500px; }
                .h-\\[900px\\] { height: 900px; }
                .h-14 { height: 3.5rem; }
                .w-14 { width: 3.5rem; }
                
                /* Text & Background variants */
                .text-white { color: #ffffff; }
                .bg-white { background-color: #ffffff; }
                .text-orange-700 { color: #c2410c; }
                .hover\\:text-orange-700:hover { color: #c2410c; }
                
                /* Borders */
                .border { border-width: 1px; }
                .border-t { border-top-width: 1px; }
                .border-b { border-bottom-width: 1px; }
                .border-dashed { border-style: dashed; }
                .border-white { border-color: #ffffff; }
                .border-slate-900 { border-color: #0f172a; }
                
                /* Border radius */
                .rounded { border-radius: 0.25rem; }
                .rounded-xl { border-radius: 0.75rem; }
                .rounded-lg { border-radius: 0.5rem; }
                
                /* Grid additional */
                .lg\\:grid-cols-4 { grid-template-columns: repeat(4, minmax(0, 1fr)); }
                .lg\\:gap-10 { gap: 2.5rem; }
                .gap-16 { gap: 4rem; }
                
                /* Spacing additional */
                .py-1 { padding-top: 0.25rem; padding-bottom: 0.25rem; }
                .px-2 { padding-left: 0.5rem; padding-right: 0.5rem; }
                .px-5 { padding-left: 1.25rem; padding-right: 1.25rem; }
                .px-6 { padding-left: 1.5rem; padding-right: 1.5rem; }
                .py-2\\.5 { padding-top: 0.625rem; padding-bottom: 0.625rem; }
                .p-1 { padding: 0.25rem; }
                .p-2 { padding: 0.5rem; }
                .p-4 { padding: 1rem; }
                .pt-8 { padding-top: 2rem; }
                .pt-10 { padding-top: 2.5rem; }
                .space-y-6 > * + * { margin-top: 1.5rem; }
                .mt-2 { margin-top: 0.5rem; }
                .mt-8 { margin-top: 2rem; }
                .mt-12 { margin-top: 3rem; }
                .ml-2 { margin-left: 0.5rem; }
                .mb-24 { margin-bottom: 6rem; }
                .-top-6 { top: -1.5rem; }
                
                /* Typography additional */
                .tracking-wide { letter-spacing: 0.025em; }
                .tracking-tighter { letter-spacing: -0.05em; }
                .text-black { color: #000000; }
                .text-green-500 { color: #22c55e; }
                .text-cyan-400 { color: #22d3ee; }
                .text-slate-300 { color: #cbd5e1; }
                .underline { text-decoration: underline; }
                .hover\\:underline:hover { text-decoration: underline; }
                .hover\\:text-cyan-600:hover { color: #0891b2; }
                .md\\:text-5xl { font-size: 3rem; line-height: 1; }
                .md\\:text-left { text-align: left; }
                
                /* Additional states */
                .cursor-pointer { cursor: pointer; }
                .group { position: relative; }
                .hover\\:shadow-xl:hover { box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04); }
                
                /* Positioning extras */
                .sticky { position: sticky; }
                .top-0 { top: 0; }
                .left-0 { left: 0; }
                .top-full { top: 100%; }
                .z-40 { z-index: 40; }
                
                /* Sizing extras */
                .h-8 { height: 2rem; }
                .h-10 { height: 2.5rem; }
                .w-8 { width: 2rem; }
                .w-auto { width: auto; }
                
                /* Border extras */
                .border-slate-800 { border-color: #1e293b; }
                
                /* Responsive row */
                .sm\\:flex-row { flex-direction: row; }
                
                /* Container & Responsive */
                .container { width: 100%; margin-left: auto; margin-right: auto; padding-left: 1rem; padding-right: 1rem; }
                @media (min-width: 640px) { .container { max-width: 640px; } .sm\\:flex-row { flex-direction: row; } }
                @media (min-width: 768px) { 
                        .container { max-width: 768px; } 
                        .md\\:flex { display: flex; }
                        .md\\:grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); } 
                        .md\\:grid-cols-3 { grid-template-columns: repeat(3, minmax(0, 1fr)); } 
                        .md\\:grid-cols-4 { grid-template-columns: repeat(4, minmax(0, 1fr)); } 
                        .md\\:col-span-1 { grid-column: span 1 / span 1; } 
                        .md\\:col-span-2 { grid-column: span 2 / span 2; } 
                        .md\\:text-5xl { font-size: 3rem; line-height: 1; } 
                        .md\\:text-7xl { font-size: 4.5rem; line-height: 1; } 
                        .md\\:text-left { text-align: left; }
                        .md\\:mx-0 { margin-left: 0; margin-right: 0; }
                }
                @media (min-width: 1024px) { 
                        .container { max-width: 1024px; } 
                        .lg\\:flex { display: flex; }
                        .lg\\:hidden { display: none; } 
                        .lg\\:grid-cols-3 { grid-template-columns: repeat(3, minmax(0, 1fr)); } 
                        .lg\\:grid-cols-4 { grid-template-columns: repeat(4, minmax(0, 1fr)); } 
                        .lg\\:gap-10 { gap: 2.5rem; } 
                }
                @media (min-width: 1280px) { .container { max-width: 1280px; } }
        ";
        wp_add_inline_style('KIDazzle-main', $custom_css);

        // Main JavaScript.
        $js_path = KIDAZZLE_THEME_DIR . '/assets/js/main.js';
        $js_version = file_exists($js_path) ? filemtime($js_path) : kidazzle_VERSION;

        wp_enqueue_script(
                'KIDazzle-main-js',
                KIDAZZLE_THEME_URI . '/assets/js/main.js',
                $script_dependencies,
                $js_version,
                true
        );

        // DEBUG: Confirm script was enqueued
        echo '<!-- DEBUG: Enqueued KIDazzle-main-js with URL: ' . KIDAZZLE_THEME_URI . '/assets/js/main.js and version: ' . $js_version . ' -->';

        // Defer re-enabled for FCP optimization
        wp_script_add_data('KIDazzle-main-js', 'defer', true);

        // Map Facade (Lazy Load Leaflet).
        $should_load_maps = kidazzle_should_load_maps();

        if ($should_load_maps) {
                wp_enqueue_script(
                        'KIDazzle-map-facade',
                        KIDAZZLE_THEME_URI . '/assets/js/map-facade.js',
                        array('KIDazzle-main-js'), // Depend on main to ensure KIDazzleData is available
                        $js_version,
                        true
                );
                wp_script_add_data('KIDazzle-map-facade', 'defer', true);
        }

        // Localize script for AJAX and dynamic data.
        wp_localize_script(
                'KIDazzle-main-js',
                'KIDazzleData',
                array(
                        'ajaxUrl' => admin_url('admin-ajax.php'),
                        'nonce' => wp_create_nonce('kidazzle_nonce'),
                        'themeUrl' => KIDAZZLE_THEME_URI,
                        'homeUrl' => home_url(),
                )
        );
}
add_action('wp_enqueue_scripts', 'kidazzle_enqueue_assets');



/**
 * Add resource hints for external assets to improve initial page performance.
 */
function kidazzle_resource_hints($urls, $relation_type)
{
        if ('preconnect' === $relation_type) {

                if (is_front_page() || is_singular('program') || is_post_type_archive('program')) {
                        $urls[] = 'https://cdn.jsdelivr.net';
                }

                if (kidazzle_should_load_maps()) {
                        $urls[] = 'https://unpkg.com';
                }

                // Preconnect to external origins identified in audit
                $urls[] = 'https://widgets.leadconnectorhq.com';
                $urls[] = 'https://services.leadconnectorhq.com';
                $urls[] = 'https://images.leadconnectorhq.com';
                $urls[] = 'https://stcdn.leadconnectorhq.com';
                $urls[] = 'https://fonts.bunny.net';
        }

        if ('dns-prefetch' === $relation_type) {

                if (is_front_page() || is_singular('program') || is_post_type_archive('program')) {
                        $urls[] = '//cdn.jsdelivr.net';
                }

                if (kidazzle_should_load_maps()) {
                        $urls[] = '//unpkg.com';
                }
                $urls[] = '//widgets.leadconnectorhq.com';
                $urls[] = '//services.leadconnectorhq.com';
                $urls[] = '//images.leadconnectorhq.com';
                $urls[] = '//stcdn.leadconnectorhq.com';
                $urls[] = '//fonts.bunny.net';
        }

        return array_unique($urls, SORT_REGULAR);
}
add_filter('wp_resource_hints', 'kidazzle_resource_hints', 10, 2);

/**
 * Enqueue admin assets
 */
function kidazzle_enqueue_admin_assets($hook)
{
        // Only load on post edit screens
        if ('post.php' !== $hook && 'post-new.php' !== $hook) {
                return;
        }

        // Font Awesome for icon previews in admin (using local version)
        $fa_path = KIDAZZLE_THEME_DIR . '/assets/css/font-awesome.css';
        $fa_version = file_exists($fa_path) ? filemtime($fa_path) : '6.4.0';

        wp_enqueue_style(
                'font-awesome-admin',
                KIDAZZLE_THEME_URI . '/assets/css/font-awesome.css',
                array(),
                $fa_version // Use same version as frontend for consistency
        );

        // Media uploader
        wp_enqueue_media();

        // Custom admin script for media uploader
        wp_enqueue_script(
                'KIDazzle-admin',
                KIDAZZLE_THEME_URI . '/assets/js/admin.js',
                array('jquery'),
                kidazzle_VERSION,
                true
        );
}
add_action('admin_enqueue_scripts', 'kidazzle_enqueue_admin_assets');

/**
 * Async load CSS for fonts only (not main CSS to prevent FOUC)
 */
function kidazzle_async_styles($html, $handle, $href, $media)
{
        // Defer Font Awesome AND Main CSS (Critical CSS inlined in header)
        if (in_array($handle, array('KIDazzle-font-awesome'))) {
                // Add data-no-optimize to prevent LiteSpeed from combining/blocking this file
                $html = str_replace('<link', '<link data-no-optimize="1"', $html);

                // If media is 'all', swap to 'print' and add onload
                $html = str_replace("media='all'", "media='print' onload=\"this.media='all'\"", $html);
                // If media is already 'print' (rare but possible), ensure onload is present
                $html = str_replace("media='print'", "media='print' onload=\"this.media='all'\"", $html);

                // Add fallback for no-js
                $html .= "<noscript><link rel='stylesheet' href='{$href}' media='all'></noscript>";
        }
        return $html;
}
add_filter('style_loader_tag', 'kidazzle_async_styles', 10, 4);

/**
 * Dequeue Dashicons for non-logged in users to improve performance
 */
function kidazzle_dequeue_dashicons()
{
        if (!is_user_logged_in()) {
                wp_dequeue_style('dashicons');
                wp_deregister_style('dashicons');
        }
}
add_action('wp_enqueue_scripts', 'kidazzle_dequeue_dashicons');


/**
 * Dequeue CDN styles (specifically Font Awesome) to force local loading.
 * Runs at priority 100 to ensure it runs after plugins.
 */
function kidazzle_dequeue_cdn_styles()
{
        global $wp_styles;
        if (empty($wp_styles->queue)) {
                return;
        }

        foreach ($wp_styles->queue as $handle) {
                if (!isset($wp_styles->registered[$handle])) {
                        continue;
                }

                $src = $wp_styles->registered[$handle]->src;

                // Check if it's Font Awesome and coming from a CDN
                if (
                        (strpos($handle, 'font-awesome') !== false || strpos($handle, 'fontawesome') !== false || strpos($handle, 'fa-') !== false) &&
                        (strpos($src, 'cdnjs') !== false || strpos($src, 'cloudflare') !== false || strpos($src, 'jsdelivr') !== false)
                ) {
                        wp_dequeue_style($handle);
                        wp_deregister_style($handle);
                }
        }
}
add_action('wp_enqueue_scripts', 'kidazzle_dequeue_cdn_styles', 100);






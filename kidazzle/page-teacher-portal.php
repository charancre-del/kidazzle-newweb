<?php
/**
 * Template Name: Teacher Portal Page
 *
 * @package kidazzle_Excellence
 */

get_header();
?>

<!-- 7. TEACHER PORTAL VIEW -->
<div id="view-teacher-portal" class="view-section active block">
    <div class="bg-slate-900 py-16 text-white text-center">
        <h1 class="text-4xl font-bold mb-2 flex items-center justify-center gap-3"><i data-lucide="users"
                class="text-yellow-400"></i> Teacher Portal</h1>
        <p class="text-slate-400">Classroom tools and resources.</p>
    </div>
    <div class="container mx-auto px-4 py-12 grid md:grid-cols-3 gap-8">
        <div class="md:col-span-1 space-y-6">
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                <h3 class="font-bold text-lg mb-4 text-slate-900">Quick Actions</h3>
                <ul class="space-y-3 text-sm text-slate-600">
                    <li class="flex items-center gap-2 cursor-pointer hover:text-cyan-600"><i data-lucide="check-square"
                            class="w-4 h-4"></i> Daily Checklist</li>
                    <li class="flex items-center gap-2 cursor-pointer hover:text-cyan-600"><i data-lucide="file-text"
                            class="w-4 h-4"></i> Incident Report</li>
                    <li class="flex items-center gap-2 cursor-pointer hover:text-cyan-600"><i data-lucide="briefcase"
                            class="w-4 h-4"></i> Time Off Request</li>
                </ul>
            </div>
        </div>
        <div class="md:col-span-2 space-y-8">
            <div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-sm">
                <h2 class="text-2xl font-bold text-slate-900 mb-6">Teacher Daily Tasks</h2>
                <div class="bg-slate-50 border-2 border-dashed border-slate-300 rounded-xl p-12 text-center">
                    <p class="text-slate-400 text-sm mb-2">Embed Code Placeholder</p>
                    <p class="font-bold text-slate-600">Daily Checklist Form</p>
                </div>
            </div>
            <div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-sm">
                <h2 class="text-2xl font-bold text-slate-900 mb-6">Weekly Task Automation</h2>
                <div class="bg-slate-50 border-2 border-dashed border-slate-300 rounded-xl p-12 text-center">
                    <p class="text-slate-400 text-sm mb-2">Embed Code Placeholder</p>
                    <p class="font-bold text-slate-600">Weekly Task Form</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();

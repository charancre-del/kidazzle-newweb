<?php
/**
 * Template Name: Teacher Portal Page
 * Staff portal with tools and resources
 * 
 * KIDazzle Child Care Theme
 * 
 * @package Kidazzle
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<!-- Header / Hero Section -->
<div class="relative py-24 text-center overflow-hidden bg-slate-900">
    <div class="absolute inset-0 z-0 opacity-20">
        <!-- Abstract tech/teaching pattern -->
        <img src="https://images.unsplash.com/photo-1531403009284-440f080d1e12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80"
            alt="<?php esc_attr_e('Teamwork background', 'kidazzle'); ?>" class="w-full h-full object-cover">
    </div>
    <div class="relative z-10 container mx-auto px-4 text-white">
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4 flex items-center justify-center gap-3">
            <i data-lucide="lock" class="w-10 h-10 text-orange-500"></i>
            <?php esc_html_e('Teacher Portal', 'kidazzle'); ?>
        </h1>
        <p class="text-xl text-slate-300 max-w-2xl mx-auto">
            <?php esc_html_e('Centralized Tools & Resources for KIDazzle Educators', 'kidazzle'); ?></p>
    </div>
</div>

<!-- Main Content -->
<div class="container mx-auto px-4 py-16 max-w-6xl">

    <!-- Daily Tools Grid -->
    <h2 class="text-2xl font-bold text-slate-900 mb-8 border-b pb-4"><?php esc_html_e('Daily Tools', 'kidazzle'); ?>
    </h2>
    <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-6 mb-16">

        <!-- Email -->
        <div
            class="bg-white p-6 rounded-3xl border border-slate-200 hover:shadow-xl transition group text-center cursor-pointer">
            <div
                class="w-14 h-14 bg-indigo-50 rounded-2xl flex items-center justify-center mx-auto mb-4 text-indigo-600 group-hover:scale-110 transition">
                <i data-lucide="mail" class="w-7 h-7"></i>
            </div>
            <h3 class="font-bold text-slate-900 mb-1"><?php esc_html_e('KIDazzle Email', 'kidazzle'); ?></h3>
            <p class="text-slate-500 text-xs mb-4"><?php esc_html_e('Access your staff inbox.', 'kidazzle'); ?></p>
            <a href="https://box2215.bluehost.com:2096/webmaillogout.cgi" target="_blank"
                class="text-indigo-600 font-bold text-xs flex items-center justify-center gap-1 hover:underline"><?php esc_html_e('Check Email', 'kidazzle'); ?>
                <i data-lucide="external-link" class="w-3 h-3"></i></a>
        </div>

        <!-- AI Lesson Plans -->
        <div
            class="bg-white p-6 rounded-3xl border border-slate-200 hover:shadow-xl transition group text-center cursor-pointer">
            <div
                class="w-14 h-14 bg-purple-50 rounded-2xl flex items-center justify-center mx-auto mb-4 text-purple-600 group-hover:scale-110 transition">
                <i data-lucide="brain-circuit" class="w-7 h-7"></i>
            </div>
            <h3 class="font-bold text-slate-900 mb-1"><?php esc_html_e('AI Lesson Planner', 'kidazzle'); ?></h3>
            <p class="text-slate-500 text-xs mb-4"><?php esc_html_e('Create curriculum instantly.', 'kidazzle'); ?></p>
            <a href="<?php echo esc_url(home_url('/ai-lesson-plan/')); ?>"
                class="text-purple-600 font-bold text-xs flex items-center justify-center gap-1 hover:underline"><?php esc_html_e('Go to Planner', 'kidazzle'); ?>
                <i data-lucide="arrow-right" class="w-3 h-3"></i></a>
        </div>

        <!-- Weekly Task Automation -->
        <div
            class="bg-white p-6 rounded-3xl border border-slate-200 hover:shadow-xl transition group text-center cursor-pointer">
            <div
                class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center mx-auto mb-4 text-blue-600 group-hover:scale-110 transition">
                <i data-lucide="list-todo" class="w-7 h-7"></i>
            </div>
            <h3 class="font-bold text-slate-900 mb-1"><?php esc_html_e('Weekly Tasks', 'kidazzle'); ?></h3>
            <p class="text-slate-500 text-xs mb-4"><?php esc_html_e('Automate your schedule.', 'kidazzle'); ?></p>
            <a href="#"
                class="text-blue-600 font-bold text-xs flex items-center justify-center gap-1 hover:underline"><?php esc_html_e('Manage Tasks', 'kidazzle'); ?>
                <i data-lucide="arrow-right" class="w-3 h-3"></i></a>
        </div>

        <!-- Daily Checklists -->
        <div
            class="bg-white p-6 rounded-3xl border border-slate-200 hover:shadow-xl transition group text-center cursor-pointer">
            <div
                class="w-14 h-14 bg-green-50 rounded-2xl flex items-center justify-center mx-auto mb-4 text-green-600 group-hover:scale-110 transition">
                <i data-lucide="check-square" class="w-7 h-7"></i>
            </div>
            <h3 class="font-bold text-slate-900 mb-1"><?php esc_html_e('Daily Checklists', 'kidazzle'); ?></h3>
            <p class="text-slate-500 text-xs mb-4"><?php esc_html_e('Safety & hygiene reports.', 'kidazzle'); ?></p>
            <a href="#"
                class="text-green-600 font-bold text-xs flex items-center justify-center gap-1 hover:underline"><?php esc_html_e('Start List', 'kidazzle'); ?>
                <i data-lucide="arrow-right" class="w-3 h-3"></i></a>
        </div>

    </div>

    <!-- Forms & Reporting Grid -->
    <h2 class="text-2xl font-bold text-slate-900 mb-8 border-b pb-4">
        <?php esc_html_e('Forms & Reporting', 'kidazzle'); ?></h2>
    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">

        <!-- Absentee Form -->
        <div class="bg-slate-50 p-6 rounded-2xl border border-slate-200 hover:border-red-200 transition group">
            <div class="flex items-center gap-3 mb-3">
                <div class="p-2 bg-white rounded-lg text-red-500 shadow-sm"><i data-lucide="user-x" class="w-5 h-5"></i>
                </div>
                <h4 class="font-bold text-slate-900 text-sm"><?php esc_html_e('Absentee Form', 'kidazzle'); ?></h4>
            </div>
            <a href="#"
                class="text-xs text-slate-500 hover:text-red-600 block"><?php esc_html_e('Report absence', 'kidazzle'); ?>
                &rarr;</a>
        </div>

        <!-- Enrollment Submission -->
        <div class="bg-slate-50 p-6 rounded-2xl border border-slate-200 hover:border-cyan-200 transition group">
            <div class="flex items-center gap-3 mb-3">
                <div class="p-2 bg-white rounded-lg text-cyan-500 shadow-sm"><i data-lucide="file-plus"
                        class="w-5 h-5"></i></div>
                <h4 class="font-bold text-slate-900 text-sm"><?php esc_html_e('Enrollment App', 'kidazzle'); ?></h4>
            </div>
            <a href="<?php echo esc_url(home_url('/enrollment/')); ?>"
                class="text-xs text-slate-500 hover:text-cyan-600 block"><?php esc_html_e('Process new student', 'kidazzle'); ?>
                &rarr;</a>
        </div>

        <!-- Food Survey -->
        <div class="bg-slate-50 p-6 rounded-2xl border border-slate-200 hover:border-orange-200 transition group">
            <div class="flex items-center gap-3 mb-3">
                <div class="p-2 bg-white rounded-lg text-orange-500 shadow-sm"><i data-lucide="utensils"
                        class="w-5 h-5"></i></div>
                <h4 class="font-bold text-slate-900 text-sm"><?php esc_html_e('Food Survey', 'kidazzle'); ?></h4>
            </div>
            <a href="#"
                class="text-xs text-slate-500 hover:text-orange-600 block"><?php esc_html_e('Submit feedback', 'kidazzle'); ?>
                &rarr;</a>
        </div>

        <!-- Suspension Form -->
        <div class="bg-slate-50 p-6 rounded-2xl border border-slate-200 hover:border-slate-400 transition group">
            <div class="flex items-center gap-3 mb-3">
                <div class="p-2 bg-white rounded-lg text-slate-500 shadow-sm"><i data-lucide="alert-octagon"
                        class="w-5 h-5"></i></div>
                <h4 class="font-bold text-slate-900 text-sm"><?php esc_html_e('Suspension Form', 'kidazzle'); ?></h4>
            </div>
            <a href="#"
                class="text-xs text-slate-500 hover:text-slate-900 block"><?php esc_html_e('File report', 'kidazzle'); ?>
                &rarr;</a>
        </div>

    </div>

    <!-- Handbooks & Policy -->
    <h2 class="text-2xl font-bold text-slate-900 mb-8 border-b pb-4">
        <?php esc_html_e('Handbooks & Policy', 'kidazzle'); ?></h2>
    <div class="grid md:grid-cols-2 gap-8 mb-16">
        <a href="#"
            class="flex items-center p-6 bg-white border border-slate-200 rounded-2xl hover:shadow-md transition">
            <div class="p-4 bg-indigo-50 text-indigo-600 rounded-xl mr-4"><i data-lucide="book" class="w-8 h-8"></i>
            </div>
            <div>
                <h3 class="font-bold text-lg text-slate-900"><?php esc_html_e('Employee Handbook', 'kidazzle'); ?></h3>
                <p class="text-sm text-slate-500"><?php esc_html_e('View policies and procedures.', 'kidazzle'); ?></p>
            </div>
            <i data-lucide="download" class="w-5 h-5 text-slate-300 ml-auto"></i>
        </a>
        <a href="#"
            class="flex items-center p-6 bg-white border border-slate-200 rounded-2xl hover:shadow-md transition">
            <div class="p-4 bg-teal-50 text-teal-600 rounded-xl mr-4"><i data-lucide="users" class="w-8 h-8"></i></div>
            <div>
                <h3 class="font-bold text-lg text-slate-900"><?php esc_html_e('Parent Handbook', 'kidazzle'); ?></h3>
                <p class="text-sm text-slate-500"><?php esc_html_e('Share with new families.', 'kidazzle'); ?></p>
            </div>
            <i data-lucide="download" class="w-5 h-5 text-slate-300 ml-auto"></i>
        </a>
    </div>

    <!-- Health & Medical Knowledge Base -->
    <section class="border-t border-slate-200 pt-16">
        <h2 class="text-3xl font-bold text-slate-900 mb-10 text-center flex items-center justify-center gap-3">
            <i data-lucide="stethoscope" class="text-red-500"></i>
            <?php esc_html_e('Health & Wellness Guide', 'kidazzle'); ?>
        </h2>

        <div class="grid md:grid-cols-2 gap-12">
            <!-- Disease Reference -->
            <div class="bg-white rounded-[2.5rem] shadow-lg border border-slate-100 overflow-hidden">
                <div class="bg-red-50 p-6 border-b border-red-100">
                    <h3 class="text-xl font-bold text-red-900 flex items-center gap-2">
                        <i data-lucide="alert-triangle" class="w-5 h-5"></i>
                        <?php esc_html_e('Identifying Common Illnesses', 'kidazzle'); ?>
                    </h3>
                </div>
                <div class="p-8">
                    <div class="mb-6">
                        <h4 class="font-bold text-slate-900 mb-2">
                            <?php esc_html_e('Hand, Foot, and Mouth Disease (HFMD)', 'kidazzle'); ?></h4>
                        <p class="text-sm text-slate-600 mb-4">
                            <?php esc_html_e('A common viral illness usually affecting infants and children younger than 5 years old.', 'kidazzle'); ?>
                        </p>
                        <div class="bg-slate-50 p-4 rounded-xl border border-slate-200 text-sm text-slate-700">
                            <strong><?php esc_html_e('What to look for:', 'kidazzle'); ?></strong>
                            <ul class="list-disc list-inside mt-2 space-y-1">
                                <li><?php esc_html_e('Fever and sore throat', 'kidazzle'); ?></li>
                                <li><?php esc_html_e('Painful sores in the mouth (herpangina)', 'kidazzle'); ?></li>
                                <li><?php esc_html_e('Skin rash (flat red spots, sometimes with blisters) on palms of hands and soles of feet', 'kidazzle'); ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <a href="#"
                        class="text-red-600 font-bold text-sm hover:underline"><?php esc_html_e('Download Full Symptom Guide (PDF)', 'kidazzle'); ?></a>
                </div>
            </div>

            <!-- Wellness Policies -->
            <div class="bg-white rounded-[2.5rem] shadow-lg border border-slate-100 overflow-hidden">
                <div class="bg-green-50 p-6 border-b border-green-100">
                    <h3 class="text-xl font-bold text-green-900 flex items-center gap-2">
                        <i data-lucide="shield-check" class="w-5 h-5"></i>
                        <?php esc_html_e('Medical Wellness Protocols', 'kidazzle'); ?>
                    </h3>
                </div>
                <div class="p-8">
                    <div class="space-y-4">
                        <div>
                            <h4 class="font-bold text-slate-900 text-sm">
                                <?php esc_html_e('Exclusion Policy', 'kidazzle'); ?></h4>
                            <p class="text-xs text-slate-500">
                                <?php esc_html_e('Children with a fever over 100.4°F must remain home until they are fever-free for 24 hours without medication.', 'kidazzle'); ?>
                            </p>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900 text-sm">
                                <?php esc_html_e('Medication Administration', 'kidazzle'); ?></h4>
                            <p class="text-xs text-slate-500">
                                <?php esc_html_e('Only prescription medication in original packaging with a signed parent authorization form can be administered.', 'kidazzle'); ?>
                            </p>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900 text-sm">
                                <?php esc_html_e('Hygiene Standards', 'kidazzle'); ?></h4>
                            <p class="text-xs text-slate-500">
                                <?php esc_html_e('Strict hand-washing protocols upon entry, before meals, and after diaper changes are mandatory for all staff.', 'kidazzle'); ?>
                            </p>
                        </div>
                    </div>
                    <a href="#"
                        class="text-green-600 font-bold text-sm hover:underline mt-6 block"><?php esc_html_e('View Full Wellness Policy Handbook', 'kidazzle'); ?></a>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>
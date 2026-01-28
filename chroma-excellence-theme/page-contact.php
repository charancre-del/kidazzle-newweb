<?php
/**
 * Template Name: Contact Page
 *
 * @package Chroma_Excellence
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
	exit;
}

get_header();

$page_id = get_the_ID();

// Hero Section
$hero_badge = get_post_meta($page_id, 'contact_hero_badge', true) ?: 'Get in Touch';
$hero_title = get_post_meta($page_id, 'contact_hero_title', true) ?: 'We\'d Love to Hear From You';
$hero_description = get_post_meta($page_id, 'contact_hero_description', true) ?: 'Have a question or want to schedule a tour? We\'re here to help.';
$hero_image = get_the_post_thumbnail_url($page_id, 'full') ?: get_theme_file_uri('/assets/images/hero-contact.jpg');

// Form Settings
$form_submit_text = get_post_meta($page_id, 'contact_form_submit_text', true) ?: 'Submit Request';

// Corporate Office
$corporate_title = get_post_meta($page_id, 'contact_corporate_title', true) ?: 'Corporate Office';
$corporate_name = get_post_meta($page_id, 'contact_corporate_name', true) ?: 'Chroma Early Learning HQ';
$corporate_address = get_post_meta($page_id, 'contact_corporate_address', true) ?: "123 Education Way, Suite 400\nAtlanta, GA 30309";
$corporate_phone = get_post_meta($page_id, 'contact_corporate_phone', true) ?: '(404) 555-0199';

// Careers Section
$careers_title = get_post_meta($page_id, 'contact_careers_title', true) ?: 'Careers';
$careers_description = get_post_meta($page_id, 'contact_careers_description', true) ?: 'Passionate about early childhood education? We are always looking for dedicated teachers and directors.';
$careers_link_text = get_post_meta($page_id, 'contact_careers_link_text', true) ?: 'View Open Positions';
$careers_link_url = get_post_meta($page_id, 'contact_careers_link_url', true) ?: '/careers';

// Press Section
$press_title = get_post_meta($page_id, 'contact_press_title', true) ?: 'Press & Media';
$press_description = get_post_meta($page_id, 'contact_press_description', true) ?: 'For media inquiries, please contact our public relations team.';
$press_link_text = get_post_meta($page_id, 'contact_press_link_text', true) ?: 'Contact PR Team';
$press_link_url = get_post_meta($page_id, 'contact_press_link_url', true) ?: 'mailto:press@chromaearlylearning.com';
?>

<main id="main" class="site-main">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<!-- Hero Section -->
		<section class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden">
			<!-- Background -->
			<div class="absolute inset-0 z-0">
				<div class="absolute inset-0 bg-brand-ink/60 z-10"></div>
				<img src="<?php echo esc_url($hero_image); ?>" alt="<?php echo esc_attr($hero_title); ?>"
					class="w-full h-full object-cover">
			</div>

			<!-- Content -->
			<div class="relative z-20 container mx-auto px-4 lg:px-6 text-center text-white">
				<span
					class="inline-block py-2 px-6 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-sm font-bold uppercase tracking-widest mb-6">
					<?php echo esc_html($hero_badge); ?>
				</span>
				<h1 class="font-serif text-4xl lg:text-6xl font-bold mb-6 max-w-4xl mx-auto leading-tight">
					<?php echo esc_html($hero_title); ?>
				</h1>
				<p class="text-lg lg:text-xl text-white/90 max-w-2xl mx-auto leading-relaxed">
					<?php echo esc_html($hero_description); ?>
				</p>
			</div>
		</section>

		<!-- Contact Grid -->
		<section class="py-24 bg-white">
			<div class="container mx-auto px-4 lg:px-6 grid lg:grid-cols-2 gap-16">

				<!-- Form -->
				<div class="bg-brand-cream p-10 rounded-[3rem] border border-brand-ink/5 shadow-soft">
					<?php
					// Check if content has shortcode, otherwise show placeholder or default form
					if (has_shortcode(get_the_content(), 'contact-form-7') || has_shortcode(get_the_content(), 'gravityform')) {
						the_content();
					} else {
						echo '<p class="text-center text-brand-ink/50 italic">Contact form shortcode will appear here.</p>';
						// Fallback to content if it contains other things
						the_content();
					}
					?>
				</div>

				<!-- Info -->
				<div class="flex flex-col justify-center gap-10">
					<!-- Corporate Office -->
					<div>
						<h2 class="font-serif text-2xl font-bold text-brand-ink mb-4">
							<?php echo esc_html($corporate_title); ?>
						</h2>
						<p class="text-brand-ink/70 leading-relaxed">
							<?php
							if (!empty($corporate_name)) {
								echo esc_html($corporate_name) . '<br>';
							}
							echo nl2br(esc_html($corporate_address));
							?>
						</p>
						<?php if (!empty($corporate_phone)): ?>
							<p class="mt-4 text-chroma-blue font-bold">
								<?php echo esc_html($corporate_phone); ?>
							</p>
						<?php endif; ?>
					</div>

					<div class="h-px bg-brand-ink/10 w-full"></div>

					<!-- Careers -->
					<div>
						<h2 class="font-serif text-2xl font-bold text-brand-ink mb-4">
							<?php echo esc_html($careers_title); ?>
						</h2>
						<p class="text-brand-ink/70 mb-4">
							<?php echo esc_html($careers_description); ?>
						</p>
						<a href="<?php echo esc_url($careers_link_url); ?>"
							class="text-chroma-red font-bold text-sm uppercase tracking-wider hover:text-chroma-blue flex items-center gap-2">
							<?php echo esc_html($careers_link_text); ?>
							<i class="fa-solid fa-arrow-right"></i>
						</a>
					</div>

					<div class="h-px bg-brand-ink/10 w-full"></div>

					<!-- Press Inquiries -->
					<div>
						<h2 class="font-serif text-2xl font-bold text-brand-ink mb-4">
							<?php echo esc_html($press_title); ?>
						</h2>
						<p class="text-brand-ink/70 mb-4">
							<?php echo esc_html($press_description); ?>
						</p>
						<a href="<?php echo esc_url($press_link_url); ?>"
							class="text-chroma-green font-bold text-sm uppercase tracking-wider hover:text-chroma-blue flex items-center gap-2">
							<?php echo esc_html($press_link_text); ?>
							<i class="fa-solid fa-arrow-right"></i>
						</a>
					</div>
				</div>

			</div>
		</section>

	</article>
</main>

<?php
get_footer();

<?php
/*
* Template name: About
*/
?>

<?php get_header(); ?>
<?php include get_theme_file_path('mobile-drawer.php'); ?>

<!-- INTRO -->
<?php
$aboutIntro = get_field('about_intro');

if ($aboutIntro): ?>
<div class="about-intro flex flex-col md:flex-row gap-2 mb-2 mt-[80px]">

    <div class="card card--primary flex flex-col md:w-[30%] gap-4">
        <div class="flex flex-col justify-between h-full gap-4">
            <div>
                <div class="subtitle flex items-center justify-between">
                    <p class="subtitle__text"><?php echo esc_html($aboutIntro['about_intro_subtitle']); ?></p>
                    <div class="tag tag--primary"><?php echo esc_html($aboutIntro['about_intro_subtitle_tag']); ?></div>
                </div>
                <h1 class="heading-xxl text-highlight"><?php echo esc_html($aboutIntro['about_intro_title']); ?></h1>
            </div>
            <a href="<?php echo esc_url($aboutIntro['about_intro_cta']['url']); ?>" class="btn--primary md:w-fit">
                <?php echo esc_html($aboutIntro['about_intro_cta']['title']); ?>
                <img src="<?php echo THEME_IMG_PATH; ?>/arrow-up-right.svg" alt="Arrow up icon"/>
            </a>
        </div>
    </div>

    <div class="card card--primary flex flex-col md:flex-row md:w-[70%] gap-8">
        <img class="w-16 h-16 image-spin" src="<?php echo esc_url($aboutIntro['about_intro_icon']['url']); ?>" alt="<?php echo esc_attr($aboutIntro['about_intro_icon']['alt']); ?>"/>
        <div class="body-m text-highlight"><?php echo wp_kses_post($aboutIntro['about_intro_text']); ?></div>
    </div>

</div>
<?php endif; ?>
<!-- END INTRO -->

<!-- GALLERY -->
<?php
$aboutGallery = get_field('about_gallery');

if ($aboutGallery && !empty($aboutGallery['about_gallery_list'])): ?>
<div class="about-gallery relative mb-2">
    <div class="swiper about-gallery-swiper">
        <div class="swiper-wrapper">
            <?php foreach ($aboutGallery['about_gallery_list'] as $item):
                $image = $item['about_gallery_list_item'];
                if ($image): ?>
                    <div class="swiper-slide w-[200px] h-[200px] md:w-[300px] md:h-[300px] rounded-2xl overflow-hidden flex-shrink-0">
                        <img class="w-full h-full object-cover" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"/>
                    </div>
                <?php endif;
            endforeach; ?>
        </div>
    </div>
</div>
<?php endif; ?>
<!-- END GALLERY -->

<!-- EXPERIENCES & STUDIES -->
<div class="flex flex-col md:flex-row gap-2 mb-2">

    <!-- EXPERIENCES -->
    <?php
    $aboutExperiences = get_field('about_experiences');

    if ($aboutExperiences): ?>
    <div class="card card--primary flex flex-col md:w-1/2 gap-8">
        <div class="flex flex-col gap-4">
            <div class="subtitle flex items-center justify-between">
                <p class="subtitle__text"><?php echo esc_html($aboutExperiences['about_experiences_subtitle']); ?></p>
                <div class="tag tag--primary"><?php echo esc_html($aboutExperiences['about_experiences_subtitle_tag']); ?></div>
            </div>
            <h1 class="heading-xxl text-highlight"><?php echo esc_html($aboutExperiences['about_experiences_title']); ?></h1>
        </div>

        <?php if (!empty($aboutExperiences['about_experiences_list'])):
            foreach ($aboutExperiences['about_experiences_list'] as $experience):
                $date = $experience['about_experience_date'];
                $title = $experience['about_experience_title'];
                $company = $experience['about_experience_company'];
                $company_url = $company['url'] ?? '';
                $company_title = $company['title'] ?? '';
                $company_target = $company['target'] ?? '_self';
        ?>
            <div class="experiences-item flex flex-col md:flex-row gap-2">
                <?php if ($date): ?>
                    <div class="tag tag--primary"><?php echo esc_html($date); ?></div>
                <?php endif; ?>

                <div class="flex flex-row w-full justify-between items-center">
                    <?php if ($title): ?>
                        <p class="body-m-bold text-highlight"><?php echo esc_html($title); ?></p>
                    <?php endif; ?>

                    <?php if ($company): ?>
                        <?php if (!$company_url || $company_url === '#'): ?>
                            <p class="body-m text-secondary"><?php echo esc_html($company_title); ?></p>
                        <?php else: ?>
                            <a href="<?php echo esc_url($company_url); ?>" target="<?php echo esc_attr($company_target); ?>" class="body-m text-secondary flex flex-row gap-2">
                                <?php echo esc_html($company_title); ?>
                                <img src="<?php echo THEME_IMG_PATH; ?>/arrow-up-right.svg" alt="Arrow up icon"/>
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; endif; ?>
    </div>
    <?php endif; ?>
    <!-- END EXPERIENCES -->

	<div class="flex flex-col gap-2 md:w-1/2">
		<!-- STUDIES -->
		<?php
		$aboutStudies = get_field('about_studies');

		if ($aboutStudies): ?>
		<div class="card card--primary flex flex-col gap-8 flex-1 w-full">
			<div class="flex flex-col gap-4">
				<div class="subtitle flex items-center justify-between">
					<p class="subtitle__text"><?php echo esc_html($aboutStudies['about_studies_subtitle']); ?></p>
					<div class="tag tag--primary"><?php echo esc_html($aboutStudies['about_studies_subtitle_tag']); ?></div>
				</div>
				<h1 class="heading-xxl text-highlight"><?php echo esc_html($aboutStudies['about_studies_title']); ?></h1>
			</div>

			<?php if (!empty($aboutStudies['about_studies_list'])):
				foreach ($aboutStudies['about_studies_list'] as $study):
					$date = $study['about_studies_date'];
					$title = $study['about_studies_title'];
					$company = $study['about_studies_company'];
					$company_url = $company['url'] ?? '';
					$company_title = $company['title'] ?? '';
					$company_target = $company['target'] ?? '_self';
			?>
				<div class="experiences-item flex flex-col md:flex-row gap-2">
					<?php if ($date): ?>
						<div class="tag tag--primary"><?php echo esc_html($date); ?></div>
					<?php endif; ?>

					<div class="flex flex-row w-full justify-between items-center">
						<?php if ($title): ?>
							<p class="body-m-bold text-highlight"><?php echo esc_html($title); ?></p>
						<?php endif; ?>

						<?php if ($company): ?>
							<?php if (!$company_url || $company_url === '#'): ?>
								<p class="body-m text-secondary"><?php echo esc_html($company_title); ?></p>
							<?php else: ?>
								<a href="<?php echo esc_url($company_url); ?>" target="<?php echo esc_attr($company_target); ?>" class="body-m text-secondary flex flex-row gap-2">
									<?php echo esc_html($company_title); ?>
									<img src="<?php echo THEME_IMG_PATH; ?>/arrow-up-right.svg" alt="Arrow up icon"/>
								</a>
							<?php endif; ?>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; endif; ?>
		</div>
		<?php endif; ?>
		<!-- END STUDIES -->
		<!-- TALKS -->
		<?php
		$aboutTalks = get_field('about_talks');

		if ($aboutTalks): ?>
		<div class="card card--primary flex flex-col gap-8 flex-1 w-full">
			<div class="flex flex-col gap-4">
				<div class="subtitle flex items-center justify-between">
					<p class="subtitle__text"><?php echo esc_html($aboutTalks['about_talks_subtitle']); ?></p>
					<div class="tag tag--primary"><?php echo esc_html($aboutTalks['about_talks_subtitle_tag']); ?></div>
				</div>
				<h1 class="heading-xxl text-highlight"><?php echo esc_html($aboutTalks['about_talks_title']); ?></h1>
			</div>

			<?php if (!empty($aboutTalks['about_talks_list'])):
				foreach ($aboutTalks['about_talks_list'] as $study):
					$date = $study['about_talks_date'];
					$title = $study['about_talks_title'];
					$company = $study['about_talks_company'];
					$company_url = $company['url'] ?? '';
					$company_title = $company['title'] ?? '';
					$company_target = $company['target'] ?? '_self';
			?>
				<div class="experiences-item flex flex-col md:flex-row gap-2">
					<?php if ($date): ?>
						<div class="tag tag--primary"><?php echo esc_html($date); ?></div>
					<?php endif; ?>

					<div class="flex flex-row w-full justify-between items-center">
						<?php if ($title): ?>
							<p class="body-m-bold text-highlight"><?php echo esc_html($title); ?></p>
						<?php endif; ?>

						<?php if ($company): ?>
							<?php if (!$company_url || $company_url === '#'): ?>
								<p class="body-m text-secondary"><?php echo esc_html($company_title); ?></p>
							<?php else: ?>
								<a href="<?php echo esc_url($company_url); ?>" target="<?php echo esc_attr($company_target); ?>" class="body-m text-secondary flex flex-row gap-2">
									<?php echo esc_html($company_title); ?>
									<img src="<?php echo THEME_IMG_PATH; ?>/arrow-up-right.svg" alt="Arrow up icon"/>
								</a>
							<?php endif; ?>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; endif; ?>
		</div>
		<?php endif; ?>
		<!-- END STUDIES -->
	</div>

</div>

<?php get_footer(); ?>

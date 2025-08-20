<?php
/*
* Template name: Projects
*/
?>

<?php get_header(); ?>
<?php include get_theme_file_path('mobile-drawer.php'); ?>

<!-- CASE STUDIES -->
<?php
$projects = get_field('projects');

if ($projects): ?>

<div class="card card--primary flex flex-col gap-4 mb-2 mt-[80px]">
	<h2 class="heading-xxl text-highlight">
		<?php echo $projects['projects_title']; ?>
	</h2>
</div>
<div class="hp-works grid grid-cols-1 md:grid-cols-2 gap-2 mb-2">
<div class="custom-cursor">
	<img src="<?php echo THEME_IMG_PATH; ?>/arrow-up-right.svg" alt="Arrow up icon"/>
</div>
<?php get_template_part( 'template-parts/loop' ); ?>
</div>
<?php endif; ?>
<!-- END CASE STUDIES -->

<?php get_footer(); ?>

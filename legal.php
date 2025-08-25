<?php
/*
* Template name: Legal
*/
?>

<?php get_header(); ?>

<div class="flex flex-col md:flex-row gap-2 mt-[80px]">

    <div class="card card--primary flex flex-col md:w-[30%] gap-4">
		<h1 class="heading-xxl text-highlight reveal-text immediate"><?php the_title(); ?></h1>
    </div>

    <div class="card card--primary flex flex-col md:flex-row md:w-[70%] gap-8">
        <div class="body-m text-highlight blur-text immediate"><?php the_content(); ?></div>
    </div>

</div>

<?php get_footer(); ?>

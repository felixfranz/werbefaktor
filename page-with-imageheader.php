<?php
/*
Template Name: Image Header

 */
/**
 *
 * @package New_Base
 */

get_header();
?>

	<main id="main" class="site-main page__site-main">

<?php 
    
    get_template_part( 'template-parts/content', 'flexible_sections' );

    ?>

	</main><!-- #main -->

<?php

get_footer();

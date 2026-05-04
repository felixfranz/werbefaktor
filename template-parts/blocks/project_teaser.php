<?php 

// Case: Bewegungs Teaser  
if( get_row_layout() == 'project_teaser' ):

    $post_num = get_sub_field('project_count');
    $project_cat = get_sub_field('filter_projects');
    $teaser_headline = get_sub_field('teaser_headline');

    $button = get_sub_field('component_button');
    // get button options
    $button_text = $button['button_text'];
    $button_link = $button['button_link'];
    $button_style = $button['button_style'];
    $button_size = $button['button_size'];
    

    $data = array(
        'cat' => $project_cat,
        'link' => 'test',
        'link_text' => 'test',
        'post_num' => $post_num
    );

    if ($data['cat'] == 'all'){
        $data['cat'] = array('skate', 'climb', 'parkour', 'play');
    }

    if ($data['post_num']['0'] == '4'){
        $col = "col-25";
    }
    if ($data['post_num']['0'] == '3'){
        $col = "col-33";
    }

?>

<section class="fullwidth section-project-grid flex flex-col">

<div class="flex flex-col items-left gap-l inner-wrap wrap">
    <div class="flex items-center items-justify-center"> 
        <h3 class="small-deco-bottom"><?php echo($teaser_headline); ?></h3>
    </div>

<div class="flex flex-row items-left gap-md projects-grid-container">
	<?php

	// LOOP LAUFEN LASSEN
    $args_loop = array( 
		'post_type' => 'project',
		'order'     => 'ASC',
		'tax_query' => array(
        array(
           'taxonomy' => 'project-category',
           'field'    => 'slug',
           'terms'    => $data['cat'],
        ),
    ),
		'posts_per_page' => $data['post_num']['0']
	  );

	$loop = new WP_Query( $args_loop );
	
	while ( $loop->have_posts() ) : $loop->the_post(); 

	$post_image     = get_field('project_teaser_image');

setlocale (LC_ALL, 'de_DE@euro', 'de_DE', 'de', 'ge');

    $project_month = date('M', strtotime(get_field("project_date")));
    $project_date = date('M Y', strtotime(get_field("project_date")));



    if($post_image){
        $image          =  $post_image['sizes']['large'];
    }
    else{
        $image ="";
    }
	
	$title          = get_the_title();
	$desc          = get_field('project_teaser_text');
	$permalink      = get_the_permalink();
    

	$post_id = get_the_ID();
    $project_categories = get_the_terms( $post_id, 'project-category' );

	?>
	<article class="project-grid__project-teaser project-teaser <?php echo $col ?>">
    <a href="<?php echo $permalink ?>">
	  		<div class="project_image-container">
			
				<img src="<?php echo $image ?>" alt="">
                
			</div>
			<div class="project-meta_container flex items-right flex-row">
                <?php if($project_categories) {
                    foreach ( $project_categories as $project_category) {
                        echo '<span class="project_meta meta-tag">'. $project_category->name .'</span>';
                    }
                } 
                echo '<span class="project_meta meta-date">'. $project_date .'</span>';
                ?>
            </div>
			
            <div class="project-teaser__teaser-card teaser-card">
                
                <div class="teaser-card__content">
                    <h3><?php echo($title); ?></h3>
                    <p><?php echo($desc); ?></p>
                </div>
    
            </div>
			</a>
	</article>
	<?php  endwhile; ?>
    </div>
     <?php if($button){ ?>
                   <div class="button-container flex items-justify-center"> <a href="<?php echo($button_link); ?>" class="button <?php echo($button_style); ?> button--<?php echo($button_size); ?>"><?php echo($button_text); ?></a></div>
               <?php } ?>
</div>

</section>	

<?php 

endif;

?>
<?php wp_reset_postdata(); ?>
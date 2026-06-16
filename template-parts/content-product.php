<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package New_Base
 */

?>

<?php 
$name = get_the_title();
$images = get_field('artikel_fotos');
$desc = get_field('description');
$number = get_field('number');
$details = get_field('artikel_details');
$desc = get_field('description');
$varianten = get_field('varianten');

$green_box_text 	= get_field('product_green_box', 'option');

if(have_rows('varianten')) :
	while ( have_rows('varianten')) : the_row();
			$format = get_sub_field('format');
			$druck = get_sub_field('druck');
			$price = get_sub_field('price');
	// End loop.
	endwhile;
	endif;
		

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("flex flex-col gap-s"); ?>>
	<div class="product__breadcrumb">

		<?php
if ( function_exists('custom_taxonomy_breadcrumbs') ) {
  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
}
?>
	</div>
	<div class="product-container flex inner-container flex-row gap-m">

			<div class="col-50 flex flex-col gap-m">
				<div class="product__main-image image-container  image-container--3-2">
					<?php 
					if( $images ): 
						$i = 0;
						
						foreach( $images as $image ): 
						$i++;
						if ($i === 1){
							$content = '<a class="gallery_image" data-slb-group="lighbox-2" href="'. $image['url'] .'"><img src="'. $image['url'] .'" alt=""></a>';
							if ( function_exists('slb_activate') ){
							$content = slb_activate($content);
							}
						echo $content;

						}

					endforeach; ?>

			<?php endif; ?>
			</div> <?php // end main image ?>
			<?php 
			
			if( $images ):
			
			$i = 0;
			$article_class = '';
			$arr_length = count($images);
			$rest_images = $arr_length - 4;
			?>

			<div class="product__gallery flex flex-row gap-s">
				<?php foreach( $images as $image ): 
					$i++;
					if ($i >= 5){
						$article_class = "hidden";
					}
					if($i === 1){
						$content = "";
					}
					if($i >=2 && $i <=4){

					$content .= '<div class="product__gallery-image image-container item--wide image-container--3-2 gallery-item '. $article_class .'">';
					$content .= '<a class="gallery_image" data-slb-group="lighbox-2" href="'. $image['url'] .'">';
					$content .= '<img src="'. $image['sizes']['large'] .'" alt="'. $image['alt'] .'" />';
					$content .= '</a></div>';
					}
				
					if($i === 5 && $arr_length >=5){
						
						$content .= '<a class="gallery_image product__gallery-more gallery-item item--tall" data-slb-group="lighbox-2" href="'. $image['url'] .'">';
						$content .= '<span>+ '.$rest_images.'</span>';
						$content .= '</a>';
					}

					if($i >=6){

					$content .= '<a class="gallery_image '. $article_class .'" data-slb-group="lighbox-2" href="'. $image['url'] .'"></a>';
	
					}
		
					endforeach; 

					if ( function_exists('slb_activate') ){
					$content = slb_activate($content);
					}
						
					echo $content;?>

			
					</div> <?php // end product gallery ?>
					<?php endif; ?>
					<div class="product__green-box box bg-green flex flex-col gap-m">
						<?php echo $green_box_text; ?>
						<a href="#" class="button button--on-color">Jetzt kontaktieren</a>
					</div>
				
			</div>

			<div class="col-50 flex flex-col gap-m">

				<div class="product__header">
					<h1 class="product__product-title"><?php echo($name); ?></h1>
					<p class="product__product-number text--small">Artikelnummer: <?php echo($number); ?></p>
				</div>


				<form action="" class="product__form">
					<div class="field">
						<label for="format">Format</label>
						<select name="format-select" id="format-select">
							<option value="-1">bitte auswählen</option>
							<?php 
								if(have_rows('varianten')) :
									$id=244;
								while ( have_rows('varianten')) : the_row();
										$id++; 
										$format = get_sub_field('format');
										?>
										<option value="format_<?php echo $id; ?>"> <?php echo $format; ?> </option>
										<?php
								// End loop.
								endwhile;
								endif; ?>
								<option value="999">Freies Format</option> 
							</select>

							<!-- hidden field -->
							<div id="custom-format" hidden>

								<label><span>Freies Format</span>

									<input type="text" 	name="custom-format" id="custom-format-input">
								</label>

							</div> <?php // end hidden custom format ; ?>

							<div class="unit-price-placeholder" hidden>
								<div id="-1"></div>
								<?php 
											if(have_rows('varianten')) :
												$id=244;
											while ( have_rows('varianten')) : the_row();
													$id++; 
													$format = get_sub_field('format');
													$price = get_sub_field('price');
													?>
													<div id="format_<?php echo $id; ?>" data-price="<?php echo $price; ?>"> </div>
													<?php
											// End loop.
											endwhile;
											endif; ?>
							</div> <?php // end hidden unit placeholder ?>
					</div> <?php // end top field ?>


					 <div class="field">
						<div id="price-select-wrapper" class="flex flex-col">
							<label for="price-select">Auflage</label>

							<select id="price-select">
									<option data-amount="0" data-price="0">Wählen Sie zunächst das Format</option>
							</select>
						</div> <?php // end Auflage wrapper ?>

							<!-- hidden field -->
						<div id="custom-amount" hidden>
							<label><span>Ihre Auflage</span>

								<input type="text" 	name="custom-amount" id="custom-amount-input">
										
							</label>
						</div> <?php // end hidden Auflage ?>
					</div> <?php // end bottom field ?>

					  <!-- summary -->
					<div id="summary" class="flex flex-col gap-xs">
					
						<div><span id="per-unit">--,-- </span> € / Stk</div>
						<div class="sum-total">Total: <span id="total">--,-- </span> €	</div>

					  <button type="button"  id="continue-button" class="button button--blue icon-before button--icon icon-arrow--right"> Anfragen </button>
					<p class="text--small">* Alle Preise zzgl. 19% MwSt. zzgl. Versandkosten, inkl. Nebenkosten</p>
					</div> <?php // end summary ?>

				</form> <?php // end product form ?>

					<!-- contact form -->
				<div id="contact-form" hidden>
					<?php  echo do_shortcode( '[contact-form-7 id="56356a1" title="Anfrage Formular"]' ); ?>
				</div>	<?php // end contact product form ?>			 


				<div class="product__details">

					<div class="tabs">

						<input type="radio" name="tabs" id="tab1" checked>
						<input type="radio" name="tabs" id="tab2">

					<div class="tab-buttons">
						<label for="tab1">Beschreibung</label>
						<label for="tab2">Details</label>
					</div>

					<div class="tab-content content1 product__desc">
						<?php echo($desc); ?>
					</div>

					<div class="tab-content content2 product__details-specs text--small">
						<?php if($details['material']){ ?><p><span>Material: </span><?php echo $details['material']; ?></p><?php }; ?>
						<?php if($details['druck']){ ?><p><span>Druck: </span><?php echo $details['druck']; ?></p><?php }; ?>
						<?php if($details['verarbeitung']){ ?><p><span>Verarbeitung: </span><?php echo $details['verarbeitung']; ?></p><?php }; ?>
						<?php if($details['fixation']){ ?><p><span>Befestigung: </span><?php echo $details['fixation']; ?></p><?php }; ?>
						<?php if($details['produktionszeit']){ ?><p><span>Produktionszeit: </span><?php echo $details['produktionszeit']; ?></p><?php }; ?>
						<?php if($details['druckdaten']){ ?><p><span>Druckdaten: </span><?php echo $details['druckdaten']; ?></p><?php }; ?>
					</div>

					</div>


				</div>
				 
			</div>

		</div>
	
		<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'new-base' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>


</article><!-- #post-<?php the_ID(); ?> -->

<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language -> language; ?>" lang="<?php print $language -> language; ?>" dir="<?php print $language -> dir; ?>"<?php print $rdf_namespaces; ?>><!--<![endif]-->
<?php 
	global $language;
?>
<html lang="<?= $language->language ?>" data-useragent="Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)">
  <head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="#" class="favicon_icon">
	<?php print $head; ?>
	<title><?php print $head_title; ?></title>
	<?php print $styles; ?>
    <?php print $scripts; ?>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	
	

  </head>
  
  	<?php
		
          //$block = module_invoke('search', 'block_view', 'search');
          //print render($block['content']);
	?>
  
     <body  <?php print $attributes; ?> >
         <?php print $page_top; ?>
         <?php print $page; ?>
         <?php print $page_bottom; ?>
		 

		<script type="text/javascript">
			jQuery(window).load(function() {
				jQuery(".work_slide ul").carouFredSel({
					circular : false,
					infinite : true,
					auto : false,
					scroll : {
						items : 1
					},
					prev : {
						button : "#slide_prev",
						key : "left"
					},
					next : {
						button : "#slide_next",
						key : "right"
					}
				});
				jQuery("#testimonial_slide").carouFredSel({
					circular : false,
					infinite : true,
					auto : false,
					scroll : {
						items : 1
					},
					prev : {
						button : "#slide_prev1",
						key : "left"
					},
					next : {
						button : "#slide_next1",
						key : "right"
					}
				});

				jQuery("a[rel^='prettyPhoto']").prettyPhoto({
					theme : 'dark_square'
				});

				jQuery('.top-header>div').addClass('main-wrapper row');
				jQuery('.no-link > a').attr('href', '#');

				var $container = jQuery('.portfolio-items');

				jQuery('.portfolio-filter a').click(function() {
					if (jQuery(this).hasClass('selected')) {
						return false;
					}

					jQuery('.portfolio-filter a').removeClass('selected');
					jQuery(this).addClass('selected');

					$container.find('.portfolio-item').hide();

					var selector = jQuery(this).attr('data-filter');
					$container.find(selector).fadeIn("slow");

					return false;
				});

			});
			
			$ = jQuery;

			jQuery(document).ready(function() {
				$top = '<div id="fixed_top" class="panels-flexible-row panels-flexible-row-3-1 panels-flexible-row-first clearfix top-header">';
				$top_bar = $top + jQuery('.top-header').html() + '</div>';
				//jQuery('body').prepend($top_bar);

				menu = '<div id="fixed_menu" class="panels-flexible-row panels-flexible-row-3-6 panels-flexible-row-first clearfix row menu-logo-margin-bottom">';
				menu_html = menu + jQuery('.panels-flexible-row-3-4 .panels-flexible-row-3-6').html() + '</div>';
				//jQuery('body').prepend(menu_html);

				//$top.attr("id", "top_id").css("position", "fixed").append(.html());

				// Fix link su icona elemento griglia
				jQuery('#work_slide .icon-external-link').each(function(index, el) {

					var $a = jQuery(this).css("border", "none").parent();
					var $divMask = $a.parent();
					var $div_mast = $divMask.parent();
					var $new_a = jQuery(document.createElement('a')).attr("href", $a.attr("href"));
					$div_mast.append($new_a);
					$new_a.append($divMask);
					jQuery(this).remove();

				});

				jQuery('#work_slide .icon-zoom-in').each(function() {
					jQuery(this).remove();
				});

				// Rimozione blocco twitter
				/*$div_twitter = jQuery("#twitter_block").parent().parent();
				$div_cont = $div_twitter.parent();
				$div_twitter.remove();
				$div_cont.children().each(function() {

					//console.log(jQuery(this));
					jQuery(this).removeClass("large-3").addClass("large-4");
				}); */

				// Fix menu nostri-prodotti
				
				$nostri = jQuery("#nostri-prodotti").parent().parent();
				$container = $nostri.parent();
				$container.children().each(function(index, el) {
					if (index == 0)
						jQuery(this).removeClass("large-3").addClass("large-6");
					else if (index == 1)
						jQuery(this).remove();
					jQuery(".button_piu", this).addClass("fix-piu" + index);
					
				});
				
				//$("#popular-posts").parent().parent().removeClass("large-4").addClass("large-8");
				//$("#popular-posts").addClass("large-8");
								
				$('.demo7').hoverOver({
				    aniTypeIn: 'flybottom',
				    aniTypeOut: 'flybottom',
				    aniDurationIn: 1000,
				    aniDurationOut: 1000,
				    contentShowHeight: 52
				});
				
				//$('.scrollup').appendTo("body");
				
				return false;
			});
	</script>
	
	<div class="large-12 text-center" style="text-transform: uppercase"><?= t('Brands from Primek') ?></div>
	<div>
		<?php
			$n = node_load(3);
			//dsm($n->field_image['und']);
			
			//print drupal_render(node_view($n));
			for ($i = 0; $i < count($n->field_image['und']); $i++) {
				print '<div class="large-2 float-left">';
				print '<img src="';
				print file_create_url($n->field_image['und'][$i]['uri']);
				print '" style="width: 200px; height: 200px; padding: 20px;" />';
				print '</div>';
			}
			 
		?>
	</div>
    </body>
</html>

<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php
	global $theme;
	global $base_url;
	$path = $base_url .'/sites/all/themes/' . $theme . "/images";
?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<div class="work_slide">
	<div id="slide_buttons">   
		<a class="prev" id="slide_prev" href="#"><img src="<?= $path ?>/arrow_left.png" alt="Previous" /></a>
		<a class="next" id="slide_next" href="#"><img src="<?= $path ?>/arrow_right.png" alt="Next" /></a>
	</div>
	<div class="clearfix"></div>
	<ul id="work_slide">
	<?php foreach ($rows as $id => $row): ?>    
	    <?php print $row; ?>
	<?php endforeach; ?>
	</ul>
	
	
</div>

<style>
	#slide_buttons {
		margin-left: -10px;
	}
</style>
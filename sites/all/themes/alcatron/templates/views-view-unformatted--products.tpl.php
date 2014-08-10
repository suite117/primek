<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php //dsm($rows) 
	//print print_r(array_keys(get_defined_vars()), 1);
	//dsm(get_defined_vars()); 
?>

<?php include_once 'header-views-products.php'; ?>

<div class="large-12 products-list">
<?php $i = 0; ?>
<?php foreach ($rows as $id => $row): ?>
	<?php if($i % 4 == 0) : ?> 
    	<div class="large-3 float-left" style="text-align: center; display: inline-block; padding: 10px 0px 20px 0;">
	<?php elseif(($i + 1) % 4 == 0) : ?>    		
    	<div class="large-3 float-left" style="text-align: center; display: inline-block; padding: 10px 0px 20px 0px;">
   	<?php else : ?>
   		<div class="large-3 float-left" style="text-align: center; display: inline-block; padding: 10px 0px 20px 0px;">
    <?php endif; ?>
    <?php print $row; $i++; ?>
	</div>
   
<?php endforeach; ?>
	
</div>



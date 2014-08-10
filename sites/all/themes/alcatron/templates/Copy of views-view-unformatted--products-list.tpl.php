<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php //print print_r(array_keys(get_defined_vars()), 1); ?>

<?php include_once 'header-views-products.php'; ?>

<div class="large-12 products-list">
<?php $i = 0; ?>
<?php foreach ($rows as $id => $row): ?>
	<?php if($i % 4 == 0) : ?> 
    	<div class="large-3 float-left product-list-first" style="text-align: center; display: inline-block; padding: 10px 10px 10px 0;">
	<?php elseif(($i + 1) % 4 == 0) : ?>    		
    	<div class="large-3 float-left" style="text-align: center; display: inline-block; padding: 10px 0px 10px 10px;">
   	<?php else : ?>
   		<div class="large-3 float-left" style="text-align: center; display: inline-block; padding: 10px 10px;">
    <?php endif; ?>
    <?php print $row; $i++; ?>
	</div>
   
<?php endforeach; ?>
</div>

<style>
.products-list img {
	width: 260px;
	height: 180px;
}

.views-field-name-field, .products-list div {
	width: 260px;
}
</style>
<script type="text/javascript">
if (jQuery(location).attr('href').indexOf('applicazioni_prodotto') > -1) {
	jQuery('.products-list a').each(function() {
		jQuery(this).attr("href", jQuery(this).attr("href") + "/applicazioni_prodotto"); 
	});
}
</script>
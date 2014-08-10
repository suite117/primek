<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php //print print_r(array_keys(get_defined_vars()), 1); ?>

<div class="large-12 products-list">
	
<?php foreach ($rows as $id => $row): ?>
    <div class="large-3 column" style="text-align: center;">
    	<?php print $row ?>
	</div>
    
<?php endforeach; ?>
	
</div>


<script type="text/javascript">

	jQuery('.products-list a').each(function() {
		jQuery(this).attr("href", jQuery(this).attr("href") + "/applicazioni_prodotto"); 
	});
</script>
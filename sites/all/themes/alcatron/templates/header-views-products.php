<?php
global $language;
$current_url = url(current_path(), array('absolute' => TRUE));
$isSubCategory = false;
if (strpos($current_url, "products/") > 0) {

	$isSubCategory = true;
	$paths = explode("/", $current_url);

	if (strpos($current_url, "applicazioni_prodotto") > 0)
		$term_name = $paths[count($paths) - 2];
	else
		$term_name = $paths[count($paths) - 1];
	$label = str_replace("-", " ", $term_name);

	$taxonomy_term = taxonomy_get_term_by_name($label, 'products');
	//dsm();
	$label = $taxonomy_term[19] -> name_field[$language -> language][0]['value'];
}
?>
<div class="panels-flexible-row panels-flexible-row-22-main-row panels-flexible-row-first clearfix main-content-top">

	<div class="panel-pane pane-page-breadcrumb" style="float: right">

		<div class="pane-content">
			<ul class="breadcrumbs right">
				<?php global $base_url; //dsm($base_url); ?>
				<li>
					<a href="<?= $base_url . '/' . $language -> language ?>">Home</a>
				</li>
				<li>
					<a href="<?= $base_url . '/' .$language -> language ?>/products-list">
						<?= t('Products') ?>
					</a>
				</li>
				<?php if($isSubCategory) : ?>
				<li>
					<a href="<?= $base_url . '/' .$language -> language . '/products-list/' . $term_name ?>"><?= $label ?></a>
				</li>
				<?php endif; ?>
			</ul>
		</div>

	</div>

	<div class="panel-pane pane-page-title" style="padding-top: 3px">

		<div class="pane-content">
			<?php if($isSubCategory) : ?>
				<h2><?= $label ?></h2>
			<?php else : ?>
				<h2><?= t('Products') ?></h2>
			<?php endif; ?>
		</div>

	</div>

</div>

<style>
	.main-content-top {
		margin-bottom: 50px !important;
	}
</style>
<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
 //dpm($row);

?>

<?php

global $base_url;
global $language;
//dsm($row);
//dsm($language->language);

$current_url = url(current_path(), array('absolute' => TRUE));
$url = drupal_get_path_alias('node/' . $row -> nid, $language -> language);
$anc = "applicazioni_prodotto";
//dsm($current_url);
if (strpos($current_url, $anc))
	$url = $url . "#" . $anc;
?>


<div  data-content="#demo-content<?= $row -> nid ?>" class="ho-box demo7 demo7-container">
    <img style="max-width: 262px" src="<?php print file_create_url($row -> field_field_image[0]['rendered']['#item']['uri']); ?>" title="" />
</div>
<div class="ho-content" id="demo-content<?= $row -> nid ?>">
    <div class="hover-content-block">
    	<div class="views-field-title">
	    	<div class="field-title"><strong><?php print $row -> node_title; ?></strong>
	    	</div>
	    	<div class="field-slogan">
		    	<?php print @$row -> field_field_slogan[0]['rendered']['#markup']; ?>
		    </div>
	    	<?php if (isset($row -> field_field_descrizione[0])) : ?>
		   		<div><?php print substr($row -> field_field_descrizione[0]['rendered']['#markup'], 0, 180); ?>
		   			
		   		</div>
	   		<?php endif; ?>
	   		<a href="<?= $base_url . '/' . $language -> language . '/' . $url ?>"><?= t('Read more') ?></a>
   		</div>
   	</div>
</div>

<?php //$node = node_load($row -> nid); ?>

<style>
	.demo7 {
		width: 260px;
		
		display: inline-block;
	}
	
		
</style>			
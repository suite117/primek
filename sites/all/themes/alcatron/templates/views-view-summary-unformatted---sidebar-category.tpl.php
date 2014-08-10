<?php

/**
 * @file
 * Default simple view template to display a group of summary lines.
 *
 * This wraps items in a span if set to inline, or a div if not.
 *
 * @ingroup views_templates
 */
?>
<div class="wid_content">
	<ul class="categories">
<?php foreach ($rows as $id => $row): $terms = taxonomy_get_term_by_name($row->taxonomy_term_data_name); 
foreach ($terms as $id => $term){
   $term_id= $term->tid;
 }
 ?>
  <li>
  <?php print (!empty($options['inline']) ? '<span' : '<div') . ' class="views-summary views-summary-unformatted ">'; ?>
    <?php if (!empty($row->separator)) { print $row->separator; } ?>
    <a href="<?php print $row->url; ?>taxonomy/term/<?php print $term_id;?>"<?php print !empty($row_classes[$id]) ? ' class="' . $row_classes[$id] . '"' : ''; ?>><?php print $row->link; ?>
	 <?php if (!empty($options['count'])): ?>
      <span>(<?php print $row->count; ?>)</span>
    <?php endif; ?>
	</a>
   
  <?php print !empty($options['inline']) ? '</span>' : '</div>'; ?>
  </li>
<?php endforeach; ?>
</ul>
</div>


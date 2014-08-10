<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<div class="large-12">
<ul class="portfolio-content portfolio-items <?php echo theme_get_setting('alcatron_portfolio_column');?>" id="portolio-columns">
<?php foreach ($rows as $id => $row): ?>
    <?php print $row; ?>
<?php endforeach; ?>
	</ul>
</div>
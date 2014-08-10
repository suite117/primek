<?php
	//dsm(get_defined_vars());
?>
<div style="">
	
</div>
<dt class="title">
  <a href="<?php print $url; ?>"><?php print $title; ?></a>
</dt>
<dd>
  <?php if ($snippet) : ?>
    <p class="search-snippet"><?php print $snippet; ?></p>
  <?php endif; ?>
  <?php if ($info) : ?>
    <p class="search-info"><?php // print $info; ?></p>
  <?php endif; ?>

  <?php // Print our new variable
   if (!empty($new_var)) : ?>
    <div class="mums-recipe"><?php //print $new_var; ?></div>
  <?php endif; ?>
</dd>
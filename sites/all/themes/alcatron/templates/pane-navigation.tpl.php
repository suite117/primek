<?php
/**
 * @file
 *
 * Theme implementation to display the messages area, which is normally
 * included roughly in the content area of a page.
 *
 * This utilizes the following variables thata re normally found in
 * page.tpl.php:
 * - $main_menu
 * - $secondary_menu
 * - $breadcrumb
 * - $mission
 *
 * Additional items can be added via theme_preprocess_pane_messages(). See
 * template_preprocess_pane_messages() for examples.
 */
 ?>
 
<div id="navigationAlcatron" class="menu <?php if (!empty($main_menu)) { print "withprimary"; } if (!empty($secondary_menu)) { print " withsecondary"; } ?> ">
                <?php if (!empty($main_menu)): ?>
                   <?php print $main_menu; ?>
                <?php endif; ?>
</div>				

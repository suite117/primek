<?php

/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct URL of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type; for example, "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type; for example, story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode; for example, "full", "teaser".
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined; for example, $node->body becomes $body. When needing to
 * access a field's raw values, developers/themers are strongly encouraged to
 * use these variables. Otherwise they will have to explicitly specify the
 * desired field language; for example, $node->body['en'], thus overriding any
 * language negotiation rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 *
 * @ingroup themeable
 */
?>
<?php //dsm($content); ?>

<div id="node-<?php print $node -> nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
	<div class="large-7 float-left right-margin">
        <article >
			<div class="post_img">
				<?php print render($content['field_image']); ?>
			</div>
		</article>
		<div>
	<div class="category">
		<?php print render($content['field_category1']); ?>
	</div>
  </div>
	</div>
  <?php //print $user_picture; ?>
   <aside class="large-5 float-left">
  <div id="node_content" class="content"<?php print $content_attributes; ?>>
    <?php
	// We hide the comments and links now so that we can render them later.
	hide($content['comments']);
	hide($content['links']);
	hide($content['field_image']);
	hide($content['field_category_blog']);
	//print render($content);
	//print render($content['links']);
	//print render($content['comments']);
	print render($content['body']);
?>
</div>
</aside>
</div>
<div class="large-12 float-left" style="height: 10px;">&nbsp;</div>
<div class="large-12 float-left">
	<div class="large-4 float-left right-margin tags">
		<?php
		if (@$content['field_tags'])
			print render($content['field_tags']);
		?>
	</div>
	<aside class="large-8 float-left">
		<div class="large-6 float-left">
			<a href="#" class="download-prodotto">Download scheda prodotto</a>
		</div>
		<div class="large-6 float-left info text-right" style="margin-top: -3px">
			<p>
				richiedi info: <a href="mailto:ifo@primek.it">info@primek.it</a>
				&nbsp;&nbsp;&nbsp;&nbsp;chiamaci: 0923 966490
			</p>
		</div>
	</aside>
	
</div>

<div class="large-12 float-left" style="height: 80px;">&nbsp;</div>

<div class="large-7 float-left right-margin">
	
	<?php
	if (@$content['field_applicazioni_prodotti'])
		print render($content['field_applicazioni_prodotti']);
	?>
	
	
</div>

<aside class="applicazioni-prodotto large-5 float-left">
	<div class="applicazioni-title" >
		<a name="applicazioni_prodotto">Applicazioni prodotto</a>
	</div>
	<div class="content"<?php print $content_attributes; ?>>
		<?php

		if (@$content['field_applicazioni_prodotto'])
			print render($content['field_applicazioni_prodotto']);
		?>
	</div>
</aside>

<div class="large-12 float-left" style="height: 80px;">&nbsp;</div>

<div class="large-12 float-left">
	<?php
	if (@$content['field_finiture_prodotto']) : ?>
		<div class="large-12 applicazioni-title">
			Finiture prodotto
		</div>
		<div class="large-12">	
			<?php
			for ($i = 0; $i < count($content['field_finiture_prodotto']['#items']); $i++) {
				if ($i != 0)
					$finiture = 'finiture';
				else {
					$finiture = 'finiture1';
				}
				//print render($content['field_finiture_prodotto']);
				print '<div class="float-left ' . @$finiture . '"><img src="';
				print file_create_url($content['field_finiture_prodotto']['#items'][$i]['uri']);
				print '" />';
				print '<div class="large-12">' . $content['field_finiture_prodotto']['#items'][$i]['title'] . '</div>';
				print '</div>';
			}
		?>
</div>
<?php endif ?>

</div>

<script type="text/javascript">
	jQuery(".pane-node-title").prependTo(jQuery("#node_content"));
	jQuery(document).ready(function() {
		console.log(jQuery(".post_img div"), jQuery(".post_img div").height());
		jQuery("#node_content").height(jQuery(".post_img div").height());
	});

</script>

<style>
	.theme-light.slider-wrapper {
		padding: 0;
	}

	.pane-node-title, .applicazioni-title {
		font-size: 16px;
		padding: 0 0 15px;
		text-transform: uppercase;
	}

	.applicazioni-prodotto {
		font-family: inherit;
		font-size: 0.9em;
		font-weight: 300;
		line-height: 1.6;
		margin-bottom: 1.25em;
		text-rendering: optimizelegibility;
		padding: 0px 30px 5px 30px;
		margin-top: -2px;
	}

	.download-prodotto a:hover {
		color: #CE2724;
	}

	.info {
		padding-top: 31px;
		
		color: #D02724;
	}

	.finiture {
		margin: 15px;
		position: relative;
	}

	.finiture1 {
		margin-top: 15px;
		position: relative;
	}

	.finiture img, .finiture1 img {
		width: 110px;
		height: 110px;
		padding-bottom: 10px;
	}
	.field-name-field-tags {
		margin-top: 29px;
	}

	.field-name-field-tags div {
		display: inline-block;
	}
	
	.field-name-field-tags .field-items div {
		padding: 0 5px;
	}

</style>


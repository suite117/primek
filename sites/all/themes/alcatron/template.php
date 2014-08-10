<?php


/* pagina ricerca risultati */
function alcatron_preprocess_search_result(&$variables) {
	global $language;
	$variables['new_var'] = t('Definire una nuova Nuova variabile');

	$result = $variables['result'];
	//dsm($result);
	//if (strlen($result['snippet']) < 10) {
	$variables['snippet'] = drupal_substr($result['node'] -> body[$language -> language][0]['value'], 0, 260) . "...";
	//}
}

/**
 * Implements hook_panels_pane_content_alter().
*/

function alcatron_panels_pane_content_alter($content, $pane, $args, $context) {
	//dsm($content->title);
  if ($content->title) {
    $content->title = t($content->title);
  }
  return $content;
}

function alcatron_preprocess_panels_pane(&$vars) {
    $content = $vars['output'];
    $vars['title'] = !empty($content->title) ? t('@title', array('@title' => $content->title)) : '';
	//dsm($vars['title']);
}


function alcatron_breadcrumb($variables) {
	$breadcrumb = $variables['breadcrumb'];
	//dsm($breadcrumb);
	$title = ' ' . drupal_get_title();
	if (!empty($title)) {
		array_push($breadcrumb, $title);
	}
	//$variables['breadcrumb']  =  implode(' / ', $variables['breadcrumb']);

	if (!empty($breadcrumb)) {
		$crumbs = '<ul class="breadcrumbs right">';
		foreach ($breadcrumb as $value) {
			$crumbs .= '<li>' . $value . '</li>';
		}
		$crumbs .= '</ul>';
	}
	return $crumbs;
}

function alcatron_form_alter(&$form, &$form_state, $form_id) {

	/*if ($form_id == 'search-form') {
	 dsm($form);
	 } */
	/* form ricerca */
	if ($form_id == 'search_block_form') {
		$form['search_block_form']['#title'] = t('Search');
		// Change the text on the label element
		$form['search_block_form']['#title_display'] = 'invisible';
		// Toggle label visibilty
		$form['search_block_form']['#size'] = 40;
		// define size of the textfield
		$form['search_block_form']['#default_value'] = t('Search');
		// Set a default value for the textfield
		//$form['actions']['submit']['#value'] = t('GO!');
		// Change the text on the submit button
		//$form['actions']['submit'] = array('#type' => 'image_button', '#src' => base_path() . path_to_theme() . '/images/search-button.png');
		//$form['actions']['submit'] = array('#type' => 'image_button');
		// Add extra attributes to the text box
		//$form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = 'Search';}";
		$form['search_block_form']['#attributes']['onclick'] = "this.value = ''";
		// Prevent user from searching the default text
		$form['#attributes']['onsubmit'] = "if(this.search_block_form.value=='Search'){ alert('Please enter a search'); return false; }";
		// Alternative (HTML5) placeholder attribute instead of using the javascript
		$form['search_block_form']['#attributes']['placeholder'] = t('Search');
	} 

	if ($form_id == 'contact_site_form') {

		// Adds a wrapper div and title in footer contact us to the whole form
		// theme_get_setting('contact_us_title')
		$form['#prefix'] = '<h4 class="footer-title">' . t('Contact us') . '</h4><div class="footer_part_content">';
		$form['#suffix'] = '</div>';

		// Adds a wrapper div to the element NAME
		$form['name']['#prefix'] = '<div class="small-6 float-left right-margin">';
		$form['name']['#suffix'] = '</div>';
		$form['name']['#title'] = Null;
		$form['name']['#description'] = Null;
		// Change text on form
		$form['name']['#attributes'] = array('placeholder' => t('Name (required)'));

		$form['mail']['#prefix'] = '<div class="small-6 float-left">';
		$form['mail']['#suffix'] = '</div>';
		$form['mail']['#title'] = Null;
		$form['mail']['#description'] = Null;
		// Change text on form
		$form['mail']['#attributes'] = array('placeholder' => t('E-mail (required)'));

		$form['subject']['#prefix'] = '<div class="small-12 float-left">';
		$form['subject']['#suffix'] = '</div>';
		$form['subject']['#title'] = Null;
		$form['subject']['#description'] = Null;
		// Change text on form
		$form['subject']['#attributes'] = array('placeholder' => t('Subject'));

		$form['message']['#prefix'] = '<div class="small-12 float-left">';
		$form['message']['#suffix'] = '</div>';
		$form['message']['#title'] = Null;
		$form['message']['#description'] = Null;
		// Change text on form
		$form['message']['#attributes'] = array('placeholder' => t('Message'));

		$form['copy']['#prefix'] = '<div class="small-12 float-left">';
		$form['copy']['#suffix'] = '</div>';
		$form['copy']['#attributes'] = array('class' => array('checkbox'));

		$form['actions']['submit']['#prefix'] = '<div class="small-12">';
		$form['actions']['submit']['#suffix'] = '</div>';
		$form['actions']['submit']['#title'] = Null;
		$form['actions']['submit']['#description'] = Null;
		// Change text on form
		$form['actions']['submit']['#value'] = t('Send');
		$form['actions']['submit']['#attributes'] = array('class' => array('button', 'right'));

	}

	if ($form['#id'] == 'newsletter-subscribe-form') {
		// Adds a wrapper div and title in footer Newsletter to the whole form
		// theme_get_setting('alcatron_newsletter_title')
		$form['#prefix'] = '<h4 class="footer-title">' . t('Get our newsletter') . '</h4><div class="footer_part_content"><p>' . theme_get_setting('alcatron_newsletter_dialog') . '</p>';
		$form['#suffix'] = '</div>';

		$form['email']['#prefix'] = '<div class="small-9 float-left">';
		$form['email']['#suffix'] = '</div>';
		$form['email']['#title'] = Null;
		$form['email']['#description'] = Null;
		// Change text on form
		$form['email']['#attributes'] = array('placeholder' => t('E-mail (required)'));

		$form['newsletter-submit']['#prefix'] = '<div class="small-3 float-left">';
		$form['newsletter-submit']['#suffix'] = '</div>';
		$form['newsletter-submit']['#title'] = Null;
		$form['newsletter-submit']['#description'] = Null;
		// Change text on form
		$form['newsletter-submit']['#value'] = t('Send');
		$form['newsletter-submit']['#attributes'] = array('class' => array('button', 'postfix'));

	}

	if (strpos($form['#id'], 'webform-client-form') !== false) {

		// Adds a wrapper div and title in footer Newsletter to the whole form
		$form['#prefix'] = '<div class="contact_form">';
		$form['#suffix'] = '</div>';

		$form['submitted']['name']['#prefix'] = '<div class="large-6 float-left right-margin">';
		$form['submitted']['name']['#suffix'] = '</div>';
		$form['submitted']['name']['#title'] = Null;
		$form['submitted']['name']['#description'] = Null;
		// Change text on form
		$form['submitted']['name']['#attributes'] = array('placeholder' => t('Name (required)'));

		$form['submitted']['email']['#prefix'] = '<div class="large-6 float-left right-margin">';
		$form['submitted']['email']['#suffix'] = '</div>';
		$form['submitted']['email']['#title'] = Null;
		$form['submitted']['email']['#description'] = Null;
		// Change text on form
		$form['submitted']['email']['#attributes'] = array('placeholder' => t('Email (required)'));

		/*$form['submitted']['website']['#prefix'] = '<div class="large-4 float-left">';
		$form['submitted']['website']['#suffix'] = '</div>';
		$form['submitted']['website']['#title'] = Null;
		$form['submitted']['website']['#description'] = Null;
		// Change text on form
		$form['submitted']['website']['#attributes'] = array('placeholder' => t('Website'));
		*/
		
		$form['submitted']['message']['#prefix'] = '<div class="large-12 clearfix">';
		$form['submitted']['message']['#suffix'] = '</div>';
		$form['submitted']['message']['#title'] = Null;
		$form['submitted']['message']['#description'] = Null;
		// Change text on form
		$form['submitted']['message']['#attributes'] = array('placeholder' => t('Your Message...'));

		$form['actions']['submit']['#prefix'] = '<div class="large-3 right">';
		$form['actions']['submit']['#suffix'] = '</div>';
		$form['actions']['submit']['#title'] = Null;
		$form['actions']['submit']['#value'] = t('Send us a message');
		// Change text on form
		$form['actions']['submit']['#attributes'] = array('class' => array('button', 'right'));

		//dpm($form);
	}

}

function alcatron_form_comment_form_alter(&$form, &$form_state) {
	$form['#prefix'] = '<div class="contact_form">';
	$form['#suffix'] = '</div>';
	$form['author']['#prefix'] = '<div class="large-5 float-left right-margin">';
	$form['author']['#suffix'] = '</div>';
	$form['author']['status']['#title'] = Null;
	$form['author']['status']['#description'] = Null;
	// Change text on form
	$form['author']['status']['#attributes'] = array('placeholder' => t('Name'));

	$form['subject']['#prefix'] = '<div class="large-7 float-left">';
	$form['subject']['#suffix'] = '</div>';
	$form['subject']['#title'] = Null;
	$form['subject']['#description'] = Null;
	// Change text on form
	$form['subject']['#attributes'] = array('placeholder' => t('Subject'));

	$form['actions']['submit']['#prefix'] = '<div class="large-3 right">';
	$form['actions']['submit']['#suffix'] = '</div>';
	$form['actions']['submit']['#title'] = Null;
	$form['actions']['submit']['#value'] = t('Add a Comment');
	// Change text on form
	$form['actions']['submit']['#attributes'] = array('class' => array('button', 'right'));

	$form['actions']['preview']['#prefix'] = '<div class="large-3 right">';
	$form['actions']['preview']['#suffix'] = '</div>';
	$form['actions']['preview']['#title'] = Null;
	$form['actions']['preview']['#value'] = t('Preview');
	// Change text on form
	$form['actions']['preview']['#attributes'] = array('class' => array('button', 'right'));

}

function alcatron_preprocess_html(&$variables) {

	if (theme_get_setting('alcatron_menu_override') == 'yes') {
		drupal_add_css(drupal_get_path('theme', 'alcatron') . '/css/overight_tb_menu.css', array('group' => CSS_THEME, 'type' => 'file'));
	} else {

	}
	if (theme_get_setting('alcatron_theme') == 'light') {
		drupal_add_css(drupal_get_path('theme', 'alcatron') . '/css/style.css', array('group' => CSS_THEME, 'type' => 'file'));
	} else {
		drupal_add_css(drupal_get_path('theme', 'alcatron') . '/css/dark_style.css', array('group' => CSS_THEME, 'type' => 'file'));
	}

}

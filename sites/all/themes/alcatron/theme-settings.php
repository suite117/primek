<?php

/**
 * @file
 * Theme setting callbacks for the garland theme.
 */

/**
 * Implements hook_form_FORM_ID_alter().
 *
 * @param $form
 *   The form.
 * @param $form_state
 *   The form state.
 */
function alcatron_form_system_theme_settings_alter(&$form, &$form_state) {

  $form['additional_fields'] = array(
    '#type' => 'fieldset',
    '#title' => t('Theme Custom Settings'),
    '#weight' => 50,
    '#collapsible' => true,
    '#collapsed' => true,
  );
  
  $form['additional_fields']['alcatron_theme'] = array(
    '#type' => 'select',
    '#title' => t('Select Style'),
    '#options' => array(
      'light' => t('Light'),
      'dark' => t('Dark')
    ),
    '#default_value' => theme_get_setting('alcatron_theme'),
    '#description' => t('Specify your desire theming.'),
    // Place this above the color scheme options.
    '#weight' => -3,
  );
  
   $form['additional_fields']['alcatron_menu_override'] = array(
    '#type' => 'select',
    '#title' => t('Do Override Tb Mganunu CSS'),
    '#options' => array(
      'yes' => t('Want'),
      'no' => t('Do Not Want')
    ),
    '#default_value' => theme_get_setting('alcatron_menu_override'),
    '#description' => t('If you select want, our basic menu show in site.'),
    // Place this above the color scheme options.
    '#weight' => -4,
  );
  
   $form['additional_fields']['alcatron_portfolio_column'] = array(
    '#type' => 'select',
    '#title' => t('Select Your Columns'),
    '#options' => array(
	  'large-block-grid-6' => t('6 Columns'),
	  'large-block-grid-5' => t('5 Columns'),
      'large-block-grid-4' => t('4 Columns'),
      'large-block-grid-3' => t('3 Columns'),
	  'large-block-grid-2' => t('2 Columns')
    ),
    '#default_value' => theme_get_setting('alcatron_portfolio_column'),
    '#description' => t('Select column to show in portfolio sections'),
    // Place this above the color scheme options.
    '#weight' => -4,
  );
  
   $form['additional_fields_form_button'] = array(
    '#type' => 'fieldset',
    '#title' => t('Theme Custom Form and Button Settings'),
    '#weight' => 51,
    '#collapsible' => true,
    '#collapsed' => true,
  );
   $form['additional_fields_form_button']['additional_fields_newsletter'] = array(
    '#type' => 'fieldset',
    '#title' => t('Theme Custom Newsletter'),
    '#weight' => 1,
    '#collapsible' => true,
    '#collapsed' => true,
  );
  
  $form['additional_fields_form_button']['additional_fields_newsletter']['alcatron_newsletter_title'] = array(
    '#type' => 'textfield',
    '#title' => t('Change Title'),
    '#default_value' => theme_get_setting('alcatron_newsletter_title'),
    '#description' => t('Specify the newsletter title.'),
    // Place this above the color scheme options.
    '#weight' => 1,
  );
  $form['additional_fields_form_button']['additional_fields_newsletter']['alcatron_newsletter_dialog'] = array(
    '#type' => 'textarea',
    '#title' => t('Change Dialog'),
    '#default_value' => theme_get_setting('alcatron_newsletter_dialog'),
    '#description' => t('Specify the newsletter dialog. Which is appearing bellow title'),
    // Place this above the color scheme options.
    '#weight' => 2,
  );
  
  $form['additional_fields_form_button']['additional_fields_contact_us_fotter'] = array(
    '#type' => 'fieldset',
    '#title' => t('Theme Custom Footer Cantact Us'),
    '#weight' => 2,
    '#collapsible' => true,
    '#collapsed' => true,
  );
  
  $form['additional_fields_form_button']['additional_fields_contact_us_fotter']['contact_us_title'] = array(
    '#type' => 'textfield',
    '#title' => t('Change Title'),
    '#default_value' => theme_get_setting('contact_us_title'),
    '#description' => t('Specify the Contact us title.'),
    // Place this above the color scheme options.
    '#weight' => 1
  );
  
  
  
}

<?php

namespace Drupal\custom_module\Form;

use Drupal\Core\Form\ConfigFormBase;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Core\Form\FormStateInterface;

/**
 * Defines a form that configures forms module settings.
 */
class ModuleConfigurationForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'custom_module_admin_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'custom_module.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, Request $request = NULL) {
    $config = $this->config('custom_module.settings');
	//echo '<pre>'; print_r( $config); exit;
	
    $form['type'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Message type'),
      '#default_value' => $config->get('type'),
    );
	
	$form['message'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Message text'),
      '#default_value' => $config->get('message'),
    );
	
	
	$form['langcode'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('langcode'),
      '#default_value' => $config->get('langcode'),
    );
	
	
	$form['env'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Env variable'),
      '#default_value' => $config->get('env'),
    );
	
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();
	
    $this->config('custom_module.settings')
      ->set('type', $values['type'])
	  ->set('message', $values['message'])
	  ->set('langcode', $values['langcode'])
	  ->set('env', $values['env'])
      ->save();
  }

}

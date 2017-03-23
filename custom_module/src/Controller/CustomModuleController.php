<?php

namespace Drupal\custom_module\Controller;
use Drupal\Core\Controller\ControllerBase;

class CustomModuleController extends ControllerBase {
  
  public function getDemo() {
	 
	 // Updating value set by config table
	/*$config = \Drupal::service('config.factory')->getEditable('custom_module.settings');
	$config->set('message', 'Anand Phadnis');
	$config->save();*/
	
	// Reading values from config table
	$config = \Drupal::config('custom_module.settings');
	//sepcific value
	//$message = $config->get('message');
	//echo $message; exit;
	 // All values
	$all = $config->get();
	//echo '<pre>'; print_r($all); exit;	
	//die('over');
	
	return array(
      '#theme' => 'test_twig',
      '#test_var' => $all,
    );
	
	
  }

}

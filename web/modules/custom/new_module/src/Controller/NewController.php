<?php
namespace Drupal\new_module\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\views\ViewExecutable;
use Drupal\views\Views;

class NewController extends ControllerBase {
  public function new() {
    $views_on_site = Views::getViewsAsOptions();
      // dd($views_on_site);
      return [
        '#theme' => 'my_template',
        '#viewsonsite' => $views_on_site,
      ];
      
  }
}
<?php

namespace Drupal\tralala\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class TralalaController.
 *
 * @package Drupal\tralala\Controller
 */
class TralalaController extends ControllerBase {

  /**
   * Hello.
   *
   * @return string
   *   Return Hello string.
   */
  public function hello($name) {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: hello with parameter(s):'.$name),
    ];
  }

}

<?php
/**
 * Provides a Article Block
 *
 * @Block(
 *   id = "article_block",
 *   admin_label = @Translation("Article Block"),
 * )
 */

namespace Drupal\vox_custom\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Entity\Entity;
use Drupal\node\Entity\Node;
use Drupal\Core\Menu;


class ArticleBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {

    $ids = \Drupal::entityQuery('node')
      ->condition('type', 'article')
      ->execute();

    $nodes = Node::loadMultiple($ids);
    $language = \Drupal::languageManager()->getCurrentLanguage()->getId();

    $isActive = ' class="is-active"';
    $listItems = '';
    $bodyItems = '';

    foreach ($nodes as $node) {
      $node = $node->getTranslation($language);

      $listItems .= '<li> <a href="#node-' . $node->id() . '"' . $isActive . '>' . $node->getTitle() . '</a> </li>';

      $imgUrl = '';
      if (isset($node->field_image->entity)) {
        $imgUrl = file_create_url($node->field_image->entity->getFileUri());
      }
      $imageHtml = '<img class="product-image"  src="' . $imgUrl . '">';

      $bodyItems .= '<div id="node-' . $node->id() . '">
                    <h1 class="title">' . $node->getTitle() . '</h1>
                    <div class="col-sm-5">' . $imageHtml . '</div >
                    <div class="col-sm-7 product-content">' . $node->body->value . '</div>
                </div > ';

      $isActive = '';
    }

    $html = ' <div class="">
        <div class="col-md-3" >
            <div >
                <nav role = "navigation" id = "block-sidebarmenu" >
                    <ul class="tabs" >
      ' . $listItems . '
                    </ul >
                </nav >
            </div >
        </div >
        <div class="col-md-9" >
            <div id = "block-mamas-product-content" >
        ' . $bodyItems . '
            </div >
        </div >
    </div > ';


    return array(
      '#markup' => $html,
      '#attached' => array(
        'library' => array(
          'vox_custom/custom-js',
        ),
      ),
    );

  }
}

<?php
/**
 * @file
 * Contains \Drupal\custom_block\Plugin\Block\CustomBlock
 */

// Add namespace
namespace Drupal\custom_block\Plugin\Block;

// Add classes
use Drupal\Core\Block\BlockBase;
use \Drupal\Core\Entity\EntityInterface;
use \Drupal\Core\Entity\Query\EntityQueryInterface;
use Drupal\node\Entity\Node;
use Drupal\field\FieldConfigInterface;
//Add Annotations
/**
 * Provides custom block
 * 
 * @Block(
 *  id = "custom_block",
 *  admin_label = @Translation("Custom Block")
 * )
 */

 //Define Class
 class CustomBlock extends BlockBase{
    //create block
    public function build(){

        $node = \Drupal::entityTypeManager()->getStorage('node')->load($nid);

        return array(
            '#markup' => t('Latest Posts'),
        );
    }
 }
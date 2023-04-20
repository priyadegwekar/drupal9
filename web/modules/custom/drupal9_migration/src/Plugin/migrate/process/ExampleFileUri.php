<?php

/**
 * @file
 * Contains \Drupal\drupal9_migration\Plugin\migrate\process\ExampleFileUri.
 */

namespace Drupal\drupal9_migration\Plugin\migrate\process;

use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\Row;
use Drupal\migrate\MigrateSkipRowException;

/**
 * Process the file url into a D8 compatible URL.
 *
 * @MigrateProcessPlugin(
 *   id = "example_file_uri"
 * )
 */
class ExampleFileUri extends ProcessPluginBase {

  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    list($filepath, $filename) = $value;
    $destination_base_uri = 'public://files';
    return $destination_base_uri . $filename;
  }
}
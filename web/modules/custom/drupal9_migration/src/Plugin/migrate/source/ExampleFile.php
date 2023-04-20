<?php

/**
 * @file
 * Contains \Drupal\drupal9_migration\Plugin\migrate\source\ExampleFile.
 */

namespace Drupal\drupal9_migration\Plugin\migrate\source;

use Drupal\migrate\Row;
use Drupal\migrate\Plugin\migrate\source\SqlBase;

/**
 * Example file source from database.
 * We extend the SqlBase source that is used to retrieve values from sql.
 *
 * @MigrateSource(
 *   id = "example_file"
 * )
 */
class ExampleFile extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    // We use $this->select() and set the query that will generate our Rows
    $query = $this->select('file', 'f')
      ->fields('f')
      ->orderBy('created_at');

    return $query;
  }

  /**
   * {@inheritdoc}
   */
  public function prepareRow(Row $row) { // Row is a now a class with helpful methods.
    // Set the complete external path to the image.
    $local_path = '/sites/default/files/2023-04';
    $filepath = $row->getSourceProperty('filepath');
    // We update the file path from the row within the local path in our computer.
    $row->setSourceProperty('filepath', $local_path . $filepath);
    // Retrieve the filename as our process plugin require it.
    $file_name = basename($filepath);
    // Set the row property "name".
    $row->setSourceProperty('name', $file_name);

    return parent::prepareRow($row);
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    return array(
      'id' => $this->t('File ID'),
      'name' => $this->t('File name'),
      'content_type' => $this->t('File Mime Type'),
      'file_status' => $this->t('The published status of a file.'),
      'created_at' => $this->t('The date YYYY-MM-DD H:i:s time that the file was added.'),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    // The row property that represent the unique id for the id map.
    $ids['id']['type'] = 'integer';
    return $ids;
  }

}
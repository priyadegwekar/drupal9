<?php
/**
 * @file
 * Contains \Drupal\mymodule\Plugin\QueueWorker\EmailQueue.
 */
namespace Drupal\custom_queue\Plugin\QueueWorker;
use Drupal\Core\Queue\QueueWorkerBase;
/**
 * Processes Tasks for Learning.
 *
 * @QueueWorker(
 *   id = "email_queue",
 *   title = @Translation("Learning task worker: email queue"),
 *   cron = {"time" = 60}
 * )
 */
class EmailQueue extends QueueWorkerBase {
  /**
   * {@inheritdoc}
   */
  public function processItem($data) {
    // dd('priya');
    // exit();
    $mailManager = \Drupal::service('plugin.manager.mail');
    
    $params = $data;
    $mailManager->mail('custom_queue', 'email_queue', $data['email'], 'en', $params , $send = TRUE);
  }
}
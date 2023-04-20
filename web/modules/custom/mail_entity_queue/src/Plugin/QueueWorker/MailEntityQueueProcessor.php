<?php

/**
* Handles sending of email.
*
* 
*/
/**
*
* @QueueWorker(
* id = "mail_queue",
* title = "My custom Queue Worker",
* cron = {"time" = 10}
* )
*/
namespace Drupal\mail_entity_queue\Plugin\QueueWorker;

use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Queue\QueueWorkerBase;
use Drupal\Core\Mail\MailManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
*
* @inheritdoc
*/
class MailEntityQueueProcessor extends QueueWorkerBase implements ContainerFactoryPluginInterface {

/**
*
* @var Drupal\Core\Mail\MailManager
*/
protected $mail;
/**
* constructor
*/
public function __construct(MailManager $mail) {
$this->mail = $mail;
}

/**
* {@inheritdoc}
*/
public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
return new static(
$container->get('plugin.manager.mail')
);
}

/**
* Processes a single item of Queue.
*
*/

/**
* Processes an item in the queue.
*
* @param mixed $data
*   The queue item data.
*
* @throws \Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException
* @throws \Drupal\Component\Plugin\Exception\PluginNotFoundException
* @throws \Drupal\Core\Entity\EntityStorageException
* @throws \Exception
*/

public function processItem($data) {
// $params['subject'] = t('query');
// $params['message'] = $data->query;
// $params['from'] = $data->email;
// $params['username'] = $data->username;
// $to = \Drupal::config('system.site')->get('mail');
// $this->mail->mail('mail_entity_queue','query_mail',$to,'en',$params,NULL,true);
$nid = $data->nid;
$update = $data->update;

}
}
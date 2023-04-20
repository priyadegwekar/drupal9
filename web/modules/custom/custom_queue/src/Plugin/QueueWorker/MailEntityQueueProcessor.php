<?php


namespace Drupal\custom_queue\Plugin\QueueWorker;

use Drupal\Core\Annotation\QueueWorker;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Queue\QueueWorkerBase;
use Drupal\Core\Mail\MailManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\user\Entity\User;
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
public function __construct(array $configuration, $plugin_id, $plugin_definition, MailManager $mail) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
$this->mail = $mail;
}

/**
* Used to grab functionality from the container.
*
* @param \Symfony\Component\DependencyInjection\ContainerInterface $container
*   The container.
* @param array $configuration
*   Configuration array.
* @param mixed $plugin_id
*   The plugin id.
* @param mixed $plugin_definition
*   The plugin definition.
*
* @return static
*/

/**
* {@inheritdoc}
*/
public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
return new static(
    $configuration,
    $plugin_id,
    $plugin_definition,
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
//dd($data);
// $account = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());

// dd($account);
$params['from'] = $data['email'];
// dd($params['from']);
$to = \Drupal::config('system.site')->get('mail');

//dd($to);

$result  =  $this->mail->mail('custom_queue', 'query_mail', $to, 'en', $params, \Drupal::config('system.site')->get('mail'), true);
// $nid = $data->nid;
// $update = $data->update;
if ($result['result'] !== true) {
    // drupal_set_message(t('There was a problem sending your message and it was not sent.'), 'error');
    \Drupal::messenger()->addError(t('There was a problem sending your message and it was not sent.'));
}
  else {
    // drupal_set_message(t('Your message has been sent.'));
    \Drupal::messenger()->addMessage(t('Your message has been sent.'));

}
}
}
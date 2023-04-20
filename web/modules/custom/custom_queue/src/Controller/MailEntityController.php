<?php
namespace Drupal\custom_queue\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Queue\QueueFactory;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Messenger\MessengerInterface;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use Drupal\user\Entity\User;
/**
 * Class ExQueueController.
 *
 * Demonstrates the use of the Queue API
 * There is two routes.
 * 1) \Drupal\exqueue01\Controller\ExQueueController::getData
 * The getData() methods allows to load external data and
 * for each array element create a queue element
 * Then on Cron run, we create a page node for each element with
 * 2) \Drupal\exqueue01\Controller\ExQueueController::deleteTheQueue
 * The deleteTheQueue() methods delete the queue "exqueue_import"
 * and all its elements
 * Once the queue is created with tha data, on Cron run
 * we create a new page node for each item in the queue with the QueueWorker
 * plugin ExQueue01.php .
 */
class MailEntityController extends ControllerBase {
  /**
   * Drupal\Core\Messenger\MessengerInterface definition.
   *
   * @var \Drupal\Core\Messenger\MessengerInterface
   */
  protected $messenger;
  /**
   * Symfony\Component\DependencyInjection\ContainerAwareInterface definition.
   *
   * @var \Symfony\Component\DependencyInjection\ContainerAwareInterface
   */
  protected $queueFactory;
  /**
   * GuzzleHttp\ClientInterface definition.
   *
   * @var \GuzzleHttp\ClientInterface
   */
  protected $client;
  /**
   * Inject services.
   */
  public function __construct(MessengerInterface $messenger, QueueFactory $queue, ClientInterface $client) {
    $this->messenger = $messenger;
    $this->queueFactory = $queue;
    $this->client = $client;
  }
  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('messenger'),
      $container->get('queue'),
      $container->get('http_client')
    );
  }
 
  /**
   * Getdata from external source and create a item queue for each data.
   *
   * @return array
   *   Return string.
   */
  public function sendEmail() {
  //  /** @var QueueFactory $queue_factory */
  //   $queue_factory = \Drupal::service(‘queue’);
  //   /** @var QueueInterface $queue */
  //   $queue = $this->queueFactory->get('mail_queue');
  //   $item->email = $form_state->getValue(’email’);
  //   $queue->createItem($element);
    
    // $queue = \Drupal::queue('mail_queue');
    // dd($queue);
    // $queue->createQueue();
    
    $queue = \Drupal::queue('mail_queue');
    $queue->createQueue();
    $current_user = \Drupal::currentUser();
    // dd($current_user);
    // exit();
    //send to queue
    // foreach ($current_user as $account) {
                // $data['email'] = $account->getEmail();
                // $data['lang'] = $account->getPreferredLangcode();
                $data['email'] = $current_user->getEmail();
                $queue->createItem($data);
                //dd($data);
    // }
    return array(
      '#type' => 'markup',
      '#markup' => $this->t('@count queue items are created.', array('@count' => count($data))),
    );

  }
}



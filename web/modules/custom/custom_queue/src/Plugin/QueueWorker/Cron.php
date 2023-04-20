<?php
/**
*
* 
*/

namespace Drupal\custom_queue\Plugin\QueueWorker;

/**
*
* @QueueWorker(
* id = "mail_queue",
* title = "My custom Queue Worker",
* cron = {"time" = 10}
* )
*/
class Cron extends MailEntityQueueProcessor {

}
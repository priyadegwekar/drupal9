<?php
/**
 * @file
 * Contains \Drupal\Learning\Form\FormQueue.
 */

namespace Drupal\custom_queue\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Contribute form.
 */
class FormQueue extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
     return 'queue_forms';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['email'] = array(
      '#type' => 'textfield',
      '#title' => t('Email'),
      '#required' => TRUE,
    );
    $form['subject'] = array(
      '#type' => 'textfield',
      '#title' => t('Subject'),
      '#required' => TRUE,
    );
    $form['message'] = array(
      '#type' => 'textarea',
      '#title' => t('Message'),
      '#required' => TRUE,
    );
    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Submit'),
    );
    return $form;
  }

  /**
   * {@inheritdoc}
   */
//   public function validateForm(array &$form, FormStateInterface $form_state) {
//     // Validate email
//     if (!valid_email_address($form_state->getValues()['email'])) {
//        $form_state->setErrorByName('Email', $this->t('Email address is not a valid one.'));
//     }
//   }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $data['email'] = $form_state->getValues()['email'];
    $data['subject'] = $form_state->getValues()['subject'];
    $data['message'] = $form_state->getValues()['message'];
    $queue = \Drupal::queue('email_queue');
    // dd($queue);
    // exit();
    $queue->createQueue();
    $queue->createItem($data);
    dd($data);
  }
}
?>
<?php

namespace Drupal\faq\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\faq\Form\FAQNewTopicForm;
use Drupal\faq\FAQTopic;

class FAQController extends ControllerBase {

  public function listTopic() {

    return array(
      '#title' => $this->currentUser(),
      '#theme' => 'topic',
      '#test_var' => '',
      '#list_topics' => FAQTopic::getTopics(),
    );
  }

  public function viewTopic($id = '') {

    $topic = FAQTopic::getTopicId($id);

    return array(
      '#theme' => 'topic',
      '#test_var' => '',
      '#current_topic' => $topic,
    );
  }

  public function newTopic(){

    $output = array();

    $output['#title'] = 'Вопрос';
    //$output['#markup'] = FAQNewTopicForm::getFormId;

    return $this->formBuilder()->getForm(FAQNewTopicForm::class);
  }
}

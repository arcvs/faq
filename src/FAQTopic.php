<?php

namespace Drupal\faq;

class FAQTopic {

  public function viewTopic($id = '') {

    $output = array();

    $output['#title'] = 'Topic #';
    $output['#markup'] = $id;

    return $output;
  }


  public function getTopics() {

    $result = db_select('example', 'e')
      ->fields('e', array('id', 'question'))
      ->orderBy('e.id', 'DESC')
      ->execute();

    return $result;
  }

  public function getTopicId($id = '') {

    $result = db_select('example', 'e')
      ->fields('e', array('id', 'question', 'answer'))
      ->condition('e.id', $id)
      ->execute();

    return $result;
  }

  public function createTopic($question = '') {

    $fields = array('question' => $question);

    db_insert('example')
      ->fields($fields)
      ->execute();
  }
}

<?php

namespace Drupal\faq\Form;

use Drupal\Core\Form\FormBase;  
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Database\Connection;
use Drupal\faq\FAQTopic;

/**
 * Наследуемся от базового класса Form API
 * @see \Drupal\Core\Form\FormBase
 */
class FAQNewTopicForm extends FormBase {

  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['question'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Ваш вопрос (?)'),
      //'#description' => $this->t('Имя не должно содержать цифр'),
      '#required' => TRUE,
    ];

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Задать вопрос'),
    ];

    return $form;
  }

  // метод, который будет возвращать название формы
  public function getFormId() {
    return 'new_topic_form';
  }

  // ф-я валидации
  //public function validateForm(array &$form, FormStateInterface $form_state) {
  //$title = $form_state->getValue('title');
  //$is_number = preg_match("/[\d]+/", $title, $match);

  //if ($is_number > 0) {
  //$form_state->setErrorByName('title', $this->t('Строка содержит цифру.'));
  //}
  //}

  public function submitForm(array &$form, FormStateInterface $form_state) {

    $question = $form_state->getValue('question');

    FAQTopic::createTopic($question);

    drupal_set_message(t('Вы ввели: %question.', ['%question' => $question]));
  }

}

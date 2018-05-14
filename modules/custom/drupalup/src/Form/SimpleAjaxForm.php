<?php
namespace Drupal\drupalup\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;

class SimpleAjaxForm extends FormBase {
    
    public function getFormId() {
        return 'drupalup_simple_ajax_form';
    }
    
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['message'] = [
            '#type' => 'markup',
            '#markup' => '<div class="result_message"></div>',
        ];
        
        $form['number_1'] = [
            '#type' => 'textfield',
            '#title' => $this-> t['First number'],
        ];
        
        $form['number_2'] = [
            '#type' => 'textfield',
            '#title' => $this-> t['Second number'],
        ];
        
        $form['actions'] = [
            '#type' => 'button',
            '#value' => $this-> t['Calculate'],
            '#ajax' => [
                'callback' => '::setMessage',
            ]
        ];
        
        return $form;
    }
    public function setMessage(array &$form, FormStateInterface $form_state) {
        $response = new AjaxResponse();
        
        $response->addCommand(
            new HtmlCommand(
            '.result_message',
                    '<div class="my_top_message">'.$this->t('the result is @result', ['@result' => ($form_state->getValue('number_1') + $form_state->getValue('number_2'))]).'</div>'
            )
        );
       return $response; 
    }
    
    public function submitForm(array &$form, FormStateInterface $form_state) {
        
    }
}
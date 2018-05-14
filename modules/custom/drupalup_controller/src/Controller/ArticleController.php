<?php

namespace Drupal\drupalup_controller\Controller;

class ArticleController {
    
    public function page() {
        $items = array(
            array('name' => 'article one'),
            array('name' => 'article two'),
            array('name' => 'article three'),
            array('name' => 'article four'),
        );
        
        return array(
            '#theme' => 'article_list',
            '#items' => $items,
            '#title' => 'Our Article List'
        );
    }
}
<?php

function drupalup_controller_theme($existing, $type, $theme, $path) {

return array(
        'article_list' => array(
           'variables' => array('items' => array(), 'title'=> '')
        )
    );
}
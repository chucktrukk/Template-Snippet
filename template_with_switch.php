<?php


$tpl_path = $modx->config['base_path'].'site/templates/';
$template_id = $modx->documentObject['template'];

switch($template_id)
{
    # Home
    case 1:
        $output = file_get_contents($tpl_path.'home.html');
        break;
    # FAQ
    case 2:
        $output = file_get_contents($tpl_path.'faq.html');
    
    default:
        /* You could also set a default file here */
        $output = 'No file found';
        break;
}

echo $output;
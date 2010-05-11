<?php 
    /* /site/snippets/template.php */
    
    $modx->setPlaceholder('tpl.path', 'site/templates');
    $modx->setPlaceholder('tpl.page', 'default.html');
    $modx->setPlaceholder('tpl.content', 'content/default.html');
    
    foreach($modx->event->params as $key => $value):
      $modx->setPlaceholder('tpl.'.$key, $value);
    endforeach;
    
    /* To use:
        <link href="[+tpl.path+]/css/style.css" media="screen" rel="stylesheet" type="text/css" />
        <script src="[+tpl.path+]/js/javascript.js" type="text/javascript"></script>
        <img src="[+tpl.path+]/images/myimage.jpg" alt="" title="" />
    */
    
    $tpl = $modx->config['base_path'].$modx->getPlaceholder('tpl.path').'/'.$modx->getPlaceholder('tpl.page');
    
    if( ! is_readable($tpl) )
    {
      echo sprintf('%s/%s was not found.', $modx->getPlaceholder('tpl.path'), $modx->getPlaceholder('tpl.page'));
      return;
    }
    
    $settings_id = 17; /* Whatever page you want to pull from */
    $settings = $modx->getTemplateVarOutput(true, $settings_id);
    
    foreach($settings as $name => $tv)
    {
        $modx->setPlaceholder('mysite.'.$name, $tv);
    }
    
    /* To use placeholders:
        [+mysite.Address+]
       or
        <script type="text/javascript"> 
        try{ 
            var pageTracker = _gat._getTracker("[+mysite.GoogleAnalytics");
            pageTracker._trackPageview();
            } catch(err) {} 
        </script> 
    */
    
    /* Example for debugging */
    if( isset($_SESSION['mgrShortname']) && $_SESSION['mgrShortname'] == 'admin')
    {
        echo '<pre>';
        print_r($modx->documentObject);
        echo '</pre>';
    }
    
    include_once($tpl);




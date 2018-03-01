<?php

$tabs = array();

$applications = $model->searchApps();

if(empty($applications)){ echo 'No Applications Found';}

foreach ($applications as $app) {
    $appname = str_replace('_', ' ', $app);
    $tabs[$appname] = array(
        'id' => '_' . $app,
        'content' => $this->renderPartial('logs', array('app'=>$app
                ), true),
    );
}
$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs' => $tabs,
    'id' => 'applicationtabs',
    'options' => array(
        'collapsible' => false,
        'selected' => '0',
        'cookie' => array('expires' => '1', 'path' => '/'),
    ),
));

<?php

// controller to host connector action
class ElfinderController extends CController
{
    public function actions()
    {
        //die('ok');
        return array(
            'connector' => array(
                'class' => 'ext.elFinder.ElFinderConnectorAction',
                'settings' => array(
                    'root' => Yii::getPathOfAlias('webroot') . '/uploads/',
                    'URL' => Yii::app()->baseUrl . '/uploads/',
                    'rootAlias' => 'Home',
                    'mimeDetect' => 'none'
                )
            ),
        );
    }
    public function actionIndex()
    {
        $this->widget('ext.elFinder.ServerFileInput', array(
            'model' => $model,
            'attribute' => 'serverFile',
            'connectorRoute' => 'admin/elfinder/connector',
            )
        );
        //die('123');
    }
}
<?php

// controller to host connector action
class AdminController extends CController
{
	public function actions()
	{
		return array(
			'fileUploaderConnector' => "ext.ezzeelfinder.ElFinderConnectorAction",
		);
	}
	public function actionFileUploader()
	{
		$this->render('fileUploader');
	}
}
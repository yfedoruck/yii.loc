<?php

Yii::import("ext.ezzeelfinder.ElFinderWidget");

include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "php" . DIRECTORY_SEPARATOR . "elFinderConnector.class.php";
include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "php" . DIRECTORY_SEPARATOR . "elFinder.class.php";
include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "php" . DIRECTORY_SEPARATOR . "elFinderVolumeDriver.class.php";
include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "php" . DIRECTORY_SEPARATOR . "elFinderVolumeLocalFileSystem.class.php";

/**
 * Implements ElFinder connector's construction.
 *
 * @author Dmitriy Pushkov <ezze@ezze.org>
 * @version 0.0.5
 */
class ElFinderConnectorAction extends CAction
{
    /**
     * A name of get parameter used to pass ElFinder connector's configuration options.
     */
    const GET_PARAM_ELFINDER_CONNECTOR_OPTIONS = "elfinder_connector_options";

    /**
     * Retrieves connector's configuration from URL parameter and creates
     * an instance of ElFinder connector.
     */
    public function run()
    {
		//function logger(){
			//die('logger!');
		//};
        // Defining default connector options
        $connectorOptions = array(
			//'bind' => array(
				//'mkdir mkfile rename duplicate upload rm paste' => 'logger'
			//),
            'roots' => array(
                array(
                    'driver'  => "LocalFileSystem",
                    'path' => realpath(Yii::app()->basePath . "/../files"),
                    'URL' => "/files",
                    'accessControl' => "access"
                ),
				array(
					'driver'        => 'LocalFileSystem',   // driver for accessing file system (REQUIRED)
					'path'          => '../Dropbox/',         // path to files (REQUIRED)
					'URL'           => dirname($_SERVER['PHP_SELF']) . '/../Dropbox/', // URL to files (REQUIRED)
					'accessControl' => 'access'             // disable and hide dot starting files (OPTIONAL)
				),
            )
        );

        // Retrieving connector's options from GET-request
        $connectorOptionsEncoded = Yii::app()->request->getParam(self::GET_PARAM_ELFINDER_CONNECTOR_OPTIONS);
        if ($connectorOptionsEncoded)
        {
            $connectorOptionsSerialized = base64_decode($connectorOptionsEncoded);
            $connectorOptionsUnserialized = unserialize($connectorOptionsSerialized);
            if (is_array($connectorOptionsUnserialized))
            {
                $connectorOptions = array_merge($connectorOptions, $connectorOptionsUnserialized);
            }
        }

        // Running ElFinder
        $connector = new elFinderConnector(new elFinder($connectorOptions));
        $connector->run();
    }

}

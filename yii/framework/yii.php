<?php
/**
 * Yii bootstrap file.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link http://www.yiiframework.com/
 * @copyright 2008-2013 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 * @package system
 * @since 1.0
 */

require(dirname(__FILE__).'/YiiBase.php');

/**
 * Yii is a helper class serving common framework functionalities.
 *
 * It encapsulates {@link YiiBase} which provides the actual implementation.
 * By writing your own Yii class, you can customize some functionalities of YiiBase.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @package system
 * @since 1.0
 */
class Yii extends YiiBase
{
    public static function d ($var){
        Yii::import('application.vendors.*');
        require_once('Zend/Debug.php');
        zend_debug::dump($var);
    }
    public static function met($class, $method){
        $rc = new ReflectionClass($class);
        $objects = $rc->getMethods();
        foreach($objects as $key => $ob){
           if($ob->getName() != $method)
              unset($objects[$key]);
        }
        yii::d($objects);
    }
    public static function ms($var){
        return yii::d(get_class_methods($var));
    }
    public static function vs($var){
        return yii::d(get_class_vars($var));
    }
    public static function cs($obj){
        echo yii::d($obj);
    }
}

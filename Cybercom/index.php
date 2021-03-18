<?php 
require_once './Controller/Core/Front.php';
class Mage{
	public static function init(){
		\Controller\Core\Front::init();
	}

	public static function prepareClass($key,$nameSpace)
	{
		$classname = $nameSpace."_".$key;
		$classname = str_replace("_"," ", $classname);
		$classname = ucwords($classname);
		$classname = str_replace(' ','\\', $classname);
		return $classname;
	}

	public static function loadFileByClassName($classname)
	{
		$classname = str_replace('\\',' ', $classname);
		$classname = ucwords($classname);
		$classname = str_replace(' ','/', $classname);
		$classname = $classname.'.php';
		require_once $classname;
	}

	public function getController($classname)
	{
		Mage::loadFileByClassName($classname);		
		return new $classname();
	}

	public function getModel($classname)
	{
		Mage::loadFileByClassName($classname);		
		return new $classname();
	}

	public function getBlock($classname)
	{
		Mage::loadFileByClassName($classname);		
		return new $classname();
	}
}
Mage::init();
?>
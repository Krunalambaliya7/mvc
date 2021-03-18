<?php 

namespace Controller\Core;
\Mage::loadFileByClassName('Model\Core\Request');
class Front{
	public static function init()
	{
		$request = new \Model\Core\Request();
		$controllerName = ucfirst($request->getControllerName());
		$actionName = $request->getActionName().'Action';

		//$controllerName = 'Controller\Admin\\'.$controllerName;
		$controllerName = \Mage::prepareClass($controllerName,'Controller');
		$controller = \Mage::getController($controllerName);
		$controller->$actionName();
	}
}

?>
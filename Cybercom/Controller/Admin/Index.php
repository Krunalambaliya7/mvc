<?php 

namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');

class Index extends \Controller\Core\Admin{
	
	public function indexAction(){
		try {
			$layout = \Mage::getBlock('Block\Admin\Layout');
			$dashBoard = \Mage::getBlock('Block\Admin\Dashboard\Grid');
			$layout->getChild('content')->addChild($dashBoard,'dashBoard');
			echo $layout->toHtml();
			
		} catch (Exception $e) {
			$e->getMessage();
		}
		
	}
}
?>
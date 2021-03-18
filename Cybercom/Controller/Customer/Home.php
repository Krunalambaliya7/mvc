<?php 
namespace Controller\Customer;
\Mage::loadFileByClassName('Controller\Core\Customer');

class Home extends \Controller\Core\Customer
{
	public function indexAction()
	{
		$layout = \Mage::getBlock('Block\Customer\Layout');
		$home = \Mage::getBlock('Block\Home\Index');
		$layout->getChild('content')->addChild($home,'home');
		echo $layout->toHtml();
	}
}
?>
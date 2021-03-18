<?php 
namespace Controller\Core;
\Mage::loadFileByClassName('Controller\Core\Abstracts');
class Customer extends Abstracts
{

	protected $message = NULL;

	public function __construct(){
		parent::__construct();
	}

	public function setMessage()
	{
		$this->message = \Mage::getModel('Model\Customer\Message');
		return $this;
	}

	public function getMessage()
	{
		if (!$this->message) {
			$this->setMessage();
		}
		return $this->message;
	}
}

?>
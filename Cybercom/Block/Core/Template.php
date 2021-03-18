<?php
namespace Block\Core;
class Template
{
	protected $request = NULL;
	protected $url = NULL;
	protected $template = NULL;
	protected $message = NULL;
	protected $controller;
	protected $children = [];
	protected $tabs = [];

	public function __construct(){
		$this->setRequest();
		$this->setUrl();
	}

	public function setRequest(){
		$this->request = \Mage::getModel('Model\Core\Request');
	}

	public function getRequest(){
		return $this->request;
	}

	public function setUrl(){
		$this->url = \Mage::getModel('Model\Core\Url');
	}

	public function getUrl(){
		return $this->url;
	}

	public function setTemplate($template)
 	{
 		$this->template = $template;
 		return $this;
 	}

 	public function getTemplate()
 	{
 		return $this->template;
 	}

	public function toHtml()
	{
		ob_start();
		require_once $this->getTemplate();
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}

	public function setChildren(array $children = [])
	{
		$this->children = $children;
		return $this;
	}

	public function getChildren()
	{
		return $this->children;
	}

	public function addChild(Template $child , $key)
	{
		if (!$key) {
			$key = get_class($child);
		}
		$this->children[$key] = $child;
		return $this;
	}

	public function getChild($key)
	{
		if (!array_key_exists($key, $this->children)) {
			return false;
		}
		return $this->children[$key];
	}

	public function removeChild($key)
	{
		if (array_key_exists($key, $this->children)) {
			unset($this->children[$key]);
		}
		return $this;
	}

	public function setMessage()
	{
		$this->message = \Mage::getModel('Model\Admin\Message');
		return $this;
	}

	public function getMessage()
	{
		if (!$this->message) {
			$this->setMessage();
		}
		return $this->message;
	}

	public function baseUrl($subUrl = NULL)
	{
		return $this->getUrl()->baseUrl($subUrl);
	}
	
 	public function setDefaultTab($defaultTab)
 	{
 		$this->defaultTab = $defaultTab;
 		return $this;
 	}

 	public function getDefaultTab()
 	{
 		return $this->defaultTab;
 	}

 	public function setTabs(array $tabs)
 	{
 		$this->tabs = $tabs;
 		return $this;
 	}

 	public function getTabs()
 	{
 		return $this->tabs;
 	}

 	public function addTab($key,$tabs = [])
 	{
 		$this->tabs[$key] = $tabs;
 		return $this;
 	}
}

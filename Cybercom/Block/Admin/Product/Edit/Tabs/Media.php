<?php 

namespace Block\Admin\Product\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');

class Media extends \Block\Core\Template
{
	protected $media = NULL;
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/Admin/Product/Form/Tabs/media.php');
	}

	public function setMedia($media = NULL)
	{
		if(!$media)
		{
			$id = $this->getRequest()->getGet('id');
			$media = \Mage::getModel('Model\Product\Media');
			$media = $media->fetchMedia($id);
		}
		$this->media = $media;
		return $this;
	}

	public function getMedia()
	{
		if (!$this->media) {
			$this->setMedia();
		}
		return $this->media; 
	}
}
?>
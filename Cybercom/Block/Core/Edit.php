<?php 
namespace Block\Core;
\Mage::loadFileByClassName('Block\Core\Template');
class Edit extends \Block\Core\Template
{
	protected $tab = NULL;
	protected $tableRow = NULL;

	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/core/edit.php');
	}
	public function getTabContent()
	{
		$tabBlock = $this->getTab();
		$tabs = $tabBlock->getTabs();
		$tab = $this->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
		if (!array_key_exists($tab, $tabs)) {
			return false;
		}
		$blockClassName = $tabs[$tab]['block'];
		$block = \Mage::getBlock($blockClassName);
		$this->setTableRow($this->getTableRow());
		return $block->toHtml();
	}

	public function getTabHtml()
 	{
 		return $this->getTab()->tohtml();
 	}

 	public function setTab($tab)
 	{	
 		/*if (!$tab) {
 			return NULL;
 		}*/
 		$this->tab = $tab;
 		return $this;
 	}

 	public function getTab()
 	{
 		if (!$this->tab) {
 			$this->setTab();
 		}
 		return $this->tab;
 	}

 	public function setTableRow(\Model\Core\Table $tableRow)
 	{
 		$this->tableRow = $tableRow;
 		return $this;
 	}

 	public function getTableRow()
 	{
 		return $this->tableRow;
 	}
}
?>
<?php
namespace Beetroot\Test\Block;

use \Beetroot\Test\Helper\Data as CampaignHelper;

class Display extends \Magento\Framework\View\Element\Template
{
    protected $_helper;
    protected $_campaign;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        CampaignHelper $helper,
        \Beetroot\Test\Model\CampaignFactory $campaign,
        $data = []
    )
    {
        $this->_campaign = $campaign;
        $this->_helper = $helper;
        parent::__construct($context);
    }

    public function _prepareLayout()
    {
        try {
            $campaignModel = $this->_campaign->create();

            $collection = $campaignModel->getCollection();
            //echo get_class($collection);
            foreach($collection as $item){
                //echo $item->getTitle();
                //var_dump($item->getData());
            }
            //exit;
        } catch (Exception $exception) {
            die($exception->getCode());
        } finally {
            //echo 'Something went wrong';
        }

    }

    public function getHelloWorldTxt()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();

        $productCollection = $objectManager->create('Magento\Catalog\Model\ResourceModel\Product\CollectionFactory');

        $collection = $productCollection->create()
            ->addAttributeToSelect('*')
            ->load();

        $count = 0;
        $artificialLimit = 2;
        foreach ($collection as $product){
            $count++;
            if ($count <= $artificialLimit)
            echo 'Name  =  '.$product->getName().'<br>';
        }

        echo '<h2>' . $this->_helper->test() . '</h2>';
    }
}
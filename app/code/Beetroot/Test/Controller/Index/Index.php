<?php

namespace Beetroot\Test\Controller\Index;

use Magento\Framework\App\Action\Context;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_resultPageFactory;
    protected $_helper;
    protected $_campaign;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Beetroot\Test\Model\CampaignFactory $campaignFactory,
        \Beetroot\Test\Helper\Data $helper
    )
    {
        $this->_helper = $helper;

        $this->_campaign = $campaignFactory;
        $this->_resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $campaign = $this->_campaign->create();
        echo get_class($campaign);

        $data = [
            'location_id' => NULL,
            'description' => 'magento 2 blog',
            'title' => 'Test module',
            'latitude' => '10.4545',
            'longitude' => '20.5454',
            'is_active' => 1,
            'creation_time' => date('Y-m-d H:i:s'),
            'update_time' => date('Y-m-d H:i:s')
        ];
        //$campaign->load(1);
        //$campaign->setData('description', 'new description from code')->save();
        $campaign->setData($data)->save();
        $campaign->setActive(true);
        var_dump($campaign->getData());


        $resultPage = $this->_resultPageFactory->create();
        return $resultPage;
    }
}
<?php
namespace Beetroot\Test\Setup;

use Magento\Framework\Module\Setup\Migration;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallData implements InstallDataInterface
{
    /**
     * factory
     *
     * @var \Beetroot\Test\Model\CampaignFactory
     */
    private $_campaignFactory;

    /**
     * Init
     *
     * @param \Beetroot\Test\Model\CampaignFactory $campaignFactory
     */
    public function __construct(\Beetroot\Test\Model\CampaignFactory $campaignFactory)
    {
        //die('installer');
        $this->_campaignFactory = $campaignFactory;
    }

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $data = [
            'location_id' => 'Madison Square Garden',
            'description' => 'magento 2 blog',
            'title' => 'Test module',
            'latitude' => '10.4545',
            'longitude' => '20.5454',
            'is_active' => 1,
            'creation_time' => '',
            'update_time' => ''
        ];
        $this->_campaignFactory->create()->setData($data)->save();
    }

}
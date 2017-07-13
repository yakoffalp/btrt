<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Beetroot\Test\Setup;

use Magento\Catalog\Api\Data\ProductAttributeInterface;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;

/**
 * Upgrade Data script
 * @codeCoverageIgnore
 */
class UpgradeData implements UpgradeDataInterface
{
    /**
     * factory
     *
     * @var \Beetroot\Test\Model\CampaignFactory
     */
    private $_campaignFactory;

    /**
     * UpgradeData constructor.
     * @param \Beetroot\Test\Model\CampaignFactory $campaignFactory
     */
    public function __construct(\Beetroot\Test\Model\CampaignFactory $campaignFactory)
    {
        $this->_campaignFactory = $campaignFactory;
    }

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        if ($context->getVersion()
            && version_compare($context->getVersion(), '1.0.1') < 0
        ) {
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
            $this->_campaignFactory->create()->setData($data)->save();
            //die ('upgrade');
        }
    }
}
<?php namespace Beetroot\Test\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * Installs DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        $table = $installer->getConnection()
            ->newTable($installer->getTable('campaign_info'))
            ->addColumn(
                'location_id',
                Table::TYPE_SMALLINT,
                null,
                ['identity' => true, 'nullable' => false, 'primary' => true],
                'Location ID'
            )
            ->addColumn('description', Table::TYPE_TEXT, 100, ['nullable' => true, 'default' => null])
            ->addColumn('title', Table::TYPE_TEXT, 255, ['nullable' => false], 'Location Title')
            ->addColumn('latitude', Table::TYPE_DECIMAL, '10,6', ['nullable' => false], 'Latitude')
            ->addColumn('longitude', Table::TYPE_DECIMAL, '10,6', ['nullable' => false], 'Longitude')
            ->addColumn('is_active', Table::TYPE_SMALLINT, null, ['nullable' => false, 'default' => '1'], 'Is Active?')
            ->addColumn('creation_time', Table::TYPE_DATETIME, null, ['nullable' => false], 'Creation Time')
            ->addColumn('update_time', Table::TYPE_DATETIME, null, ['nullable' => false], 'Update Time')
            ->addIndex($installer->getIdxName('locator_data', ['location_id']), ['location_id'])
            ->setComment('General campaign information');

        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }

}

<?php
namespace Beetroot\Test\Model\ResourceModel\Campaign;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'location_id';
    protected $_eventPrefix = 'campaign_collection';
    protected $_eventObject = 'campaign_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Beetroot\Test\Model\Campaign', 'Beetroot\Test\Model\ResourceModel\Campaign');
    }

    /**
     * Get SQL for get record count.
     * Extra GROUP BY strip added.
     *
     * @return \Magento\Framework\DB\Select
     */
    public function getSelectCountSql()
    {
        $countSelect = parent::getSelectCountSql();
        $countSelect->reset(\Zend_Db_Select::GROUP);
        return $countSelect;
    }
    /**
     * @param string $valueField
     * @param string $labelField
     * @param array $additional
     * @return array
     */
    protected function _toOptionArray($valueField = 'location_id', $labelField = 'title', $additional = [])
    {
        return parent::_toOptionArray($valueField, $labelField, $additional);
    }
}

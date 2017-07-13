<?php
namespace Beetroot\Test\Model\ResourceModel;


class Campaign extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Date model
     *
     * @var \Magento\Framework\Stdlib\DateTime\DateTime
     */
    protected $_date;

    /**
     * constructor
     *
     * @param \Magento\Framework\Stdlib\DateTime\DateTime $date
     * @param \Magento\Framework\Model\ResourceModel\Db\Context $context
     */
    public function __construct(
        \Magento\Framework\Stdlib\DateTime\DateTime $date,
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    )
    {
        $this->_date = $date;
        parent::__construct($context);
    }


    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('campaign_info', 'location_id');
    }

    /**
     * Retrieves Post Name from DB by passed id.
     *
     * @param string $id
     * @return string|bool
     */
    public function getPostNameById($id)
    {
        $adapter = $this->getConnection();
        $select = $adapter->select()
            ->from($this->getMainTable(), 'title')
            ->where('location_id = :location_id');
        $binds = ['location_id' => (int)$id];
        return $adapter->fetchOne($select, $binds);
    }
    /**
     * before save callback
     *
     * @param \Magento\Framework\Model\AbstractModel|\Beetroot\Test\Model\Campaign $object
     * @return $this
     */
    protected function _beforeSave(\Magento\Framework\Model\AbstractModel $object)
    {
        $object->setUpdatedAt($this->_date->date());
        if ($object->isObjectNew()) {
            $object->setCreatedAt($this->_date->date());
        }
        return parent::_beforeSave($object);
    }
}
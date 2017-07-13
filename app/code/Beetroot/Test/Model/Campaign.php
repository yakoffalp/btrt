<?php
namespace Beetroot\Test\Model;

use Magento\Framework\App\ResourceConnection;
use Magento\Framework\DataObject\IdentityInterface;

/**
 *  CSV Import Handler
 */

class Campaign extends \Magento\Framework\Model\AbstractModel implements IdentityInterface
{

    /**
     * @var string
     */
    protected $_cacheTag = 'campaign_info';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'campaign_info';

    const CACHE_TAG = 'campaign_info';

    public function _construct()
    {
        $this->_init('Beetroot\Test\Model\ResourceModel\Campaign');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
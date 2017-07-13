<?php

namespace Beetroot\Test\Helper;

use Magento\Framework\App\Helper\AbstractHelper;


class Data extends AbstractHelper
{
    protected $storeManager;
    protected $objectManager;
    const SCOPE_TYPE_DEFAULT = 'default';
    const XML_PATH_HELLOWORLD = 'helloworld/';


    public function test()
    {
        return 'Here block ends';
    }
}
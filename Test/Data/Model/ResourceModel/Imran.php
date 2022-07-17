<?php
namespace Test\Data\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Imran extends AbstractDb
{
    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init('student', 'address_id');
    }
}

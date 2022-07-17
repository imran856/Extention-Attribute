<?php
namespace Test\Data\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Rps extends AbstractDb
{
    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init('imran', 'entity_id');
    }
}

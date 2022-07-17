<?php

namespace Test\Data\Model\ResourceModel\RpsCollection;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Test\Data\Model\ResourceModel\Rps as ResourceModel;
use Test\Data\Model\Rps as Model;

class Collection extends AbstractCollection
{
    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}

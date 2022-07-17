<?php

namespace Test\Data\Model\ResourceModel\RpsCollection;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Test\Data\Model\ResourceModel\Imran as ResourceModel;
use Test\Data\Model\Imran as Model;

class ImranCollection extends AbstractCollection
{
    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}

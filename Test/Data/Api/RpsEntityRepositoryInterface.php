<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Test\Data\Api;

use Test\Data\Api\Data\RpsEntityInterface;
use Test\Data\Model\ResourceModel\RpsCollection\Collection;

interface RpsEntityRepositoryInterface
{
    /**
     * Get entity by id
     *
     * @param string $entityId
     * @return RpsEntityInterface
     */
    public function getById(string $entityId);

    /**
     * Get Collection
     *
     * @return Collection
     */
    public function getCollection();

}

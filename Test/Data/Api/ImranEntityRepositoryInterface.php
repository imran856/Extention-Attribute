<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Test\Data\Api;

use Test\Data\Api\Data\ImranEntityInterface;

interface ImranEntityRepositoryInterface
{
    /**
     * Get entity by id
     *
     * @param string $entityId
     * @return ImranEntityInterface[]
     */
    public function getAddressByEntityId($entityId);
    /**
     * Get address by id
     *
     * @param string $addressId
     * @return ImranEntityInterface
     */

    public function getAddressById($addressId);
    /**
     * @param $id
     * @return \Test\Data\Api\Data\ImranEntityInterface
     */
    public function save($id);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Test\Data\Api\Data\ImranSearchResultsInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);
}

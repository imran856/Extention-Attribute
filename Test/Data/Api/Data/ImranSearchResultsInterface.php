<?php

namespace Test\Data\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface for preorder Complete search results.
 * @api
 */
interface ImranSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get test Complete list.
     *
     * @return \Test\Data\Api\Data\ImranEntityInterface[]
     */
    public function getItems();

    /**
     * Set test Complete list.
     *
     * @param \Test\Data\Api\Data\ImranEntityInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
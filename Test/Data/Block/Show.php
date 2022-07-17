<?php

namespace Test\Data\Block;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Test\Data\Model\ImranEntityRepository;

class Show extends Template
{
    /**
     * @var ImranEntityRepository
     */
    protected ImranEntityRepository $_productRepository;

    /**
     * @var SearchCriteriaBuilder
     */
    protected SearchCriteriaBuilder $_searchCriteriaBuilder;

    public function __construct(
        Context               $context,
        ImranEntityRepository $productRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->_productRepository = $productRepository;
        $this->_searchCriteriaBuilder = $searchCriteriaBuilder;
        parent::__construct($context);
    }

    public function showData()
    {
        $searchCriteria = $this->_searchCriteriaBuilder
            ->create();
        return $this->_productRepository->getList($searchCriteria)->getItems();
    }
}

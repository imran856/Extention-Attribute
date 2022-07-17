<?php
namespace Test\Data\Block;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Webapi\Rest\Request;
use Test\Data\Api\ImranEntityRepositoryInterface;

class Edit extends Template
{
    /**
     * @var PageFactory
     */
    private PageFactory $pageFactory;

    /**
     * @var Context
     */
    private Context $context;

    /**
     * @var ImranEntityRepositoryInterface
     */
    private ImranEntityRepositoryInterface $ImranEntityRepositoryInterface;

    /**
     * @var SearchCriteriaBuilder
     */
    protected SearchCriteriaBuilder $SearchCriteriaBuilder;

    /**
     * @var Request
     */
    protected Request $request;

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        ImranEntityRepositoryInterface $ImranEntityRepositoryInterface,
        SearchCriteriaBuilder $SearchCriteriaBuilder,
        Request $request,
        array $data = []
    ) {
        $this->pageFactory = $pageFactory;
        $this->SearchCriteriaBuilder = $SearchCriteriaBuilder;
        $this->ImranEntityRepositoryInterface = $ImranEntityRepositoryInterface;
        $this->request = $request;
        return parent::__construct($context, $data);
    }

    public function edit()
    {
        $filter = $this->request->getParam('id');
        return $this->ImranEntityRepositoryInterface->getAddressById($filter);
    }
}

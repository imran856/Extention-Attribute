<?php
namespace Test\Data\Controller\Index;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResourceConnection;
use Magento\Framework\Controller\Result\JsonFactory;
use Test\Data\Api\RpsEntityRepositoryInterface;
use Test\Data\Model\ImranEntityRepository;

class Index extends Action
{
    /**
     * @var Context
     */
    protected Context $context;

    /**
     * @var resourceConnection
     */
    protected resourceConnection $resourceConnection;

    /**
     * @var JsonFactory
     */
    protected JsonFactory $JsonFactory;

    /**
     * @var RpsEntityRepositoryInterface
     */
    private RpsEntityRepositoryInterface $RpsEntityRepositoryInterface;

    /**
     * @var ImranEntityRepository
     */
    protected ImranEntityRepository $_productRepository;

    /**
     * @var SearchCriteriaBuilder
     */
    protected SearchCriteriaBuilder $_searchCriteriaBuilder;

    public function __construct(
        Context $context,
        JsonFactory $JsonFactory,
        RpsEntityRepositoryInterface $rpsEntityRepositoryInterface,
        resourceConnection $resourceConnection,
        ImranEntityRepository $productRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->RpsEntityRepositoryInterface = $rpsEntityRepositoryInterface;
        $this->JsonFactory = $JsonFactory;
        $this->_productRepository = $productRepository;
        $this->_searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->resourceConnection = $resourceConnection;
        return parent::__construct($context);
    }

    public function execute()
    {
        $json = $this->JsonFactory->create();
        $data =  $this->RpsEntityRepositoryInterface->getById(1);
        $ww = ['comp_name'=>$data->getCompName(),
            'office_time'=>$data->getOfficeTime(),
            'desc'=>$data->getDesc()];
        return $json->setData($ww);
//
//        $searchCriteria = $this->_searchCriteriaBuilder
//            ->create();
//        $data = $this->_productRepository->getList($searchCriteria)->getItems();
//        foreach ($data as $datas) {
//            print_r($datas->getFeedback());
//            echo "<br>";
//        }
    }
}

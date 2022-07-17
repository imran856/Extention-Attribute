<?php
namespace Test\Data\Model;

use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SearchCriteriaInterface;
use Test\Data\Api\Data\ImranEntityInterface;
use Test\Data\Api\Data\ImranSearchResultsInterface;
use Test\Data\Api\Data\ImranSearchResultsInterfaceFactory;
use Test\Data\Api\ImranEntityRepositoryInterface;
use Test\Data\Model\ImranFactory;
use Test\Data\Model\ResourceModel\Imran as ResourceModel;
use Test\Data\Model\ResourceModel\RpsCollection\ImranCollectionFactory;

class ImranEntityRepository implements ImranEntityRepositoryInterface
{
    /**
     * @var ImranCollectionFactory
     */
    private ImranCollectionFactory $collectionFactory;
    /**
     * @var ImranFactory
     */
    private ImranFactory $imranFactory;

    /**
     * @var ImranSearchResultsInterfaceFactory
     */
    protected ImranSearchResultsInterfaceFactory $imranSearchResultsInterfaceFactory;

    /**
     * @var FilterBuilder
     */
    private FilterBuilder $filterBuilder;
    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCriteriaBuilder;
    /**
     * @var ResourceModel
     */
    private ResourceModel $resourceModel;

    /**
     * @var CollectionProcessorInterface
     */
    protected CollectionProcessorInterface $collectionProcessor;
    /**
     * @var ImranEntityRepository
     */
    protected ImranEntityRepository $_productRepository;

    /**
     * @var SearchCriteriaBuilder
     */
    protected SearchCriteriaBuilder $_searchCriteriaBuilder;
    /**
     * AddressEntityRepository constructor.
     * @param ImranCollectionFactory $collectionFactory
     * @param ImranFactory $imranFactory
     * @param ResourceModel $resourceModel
     */
    public function __construct(
        ImranCollectionFactory $collectionFactory,
        ImranSearchResultsInterfaceFactory $imranSearchResultsInterfaceFactory,
        ImranFactory $imranFactory,
        ResourceModel $resourceModel,
        CollectionProcessorInterface $collectionProcessor,
        FilterBuilder $filterBuilder,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->imranFactory = $imranFactory;
        $this->resourceModel = $resourceModel;
        $this->imranSearchResultsInterfaceFactory = $imranSearchResultsInterfaceFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->filterBuilder = $filterBuilder;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * Get entity by id
     *
     * @param string $entityId
     * @return ImranEntityInterface[]|null
     */
    public function getAddressByEntityId($entityId)
    {
        $filter = $this->filterBuilder->setField('entity_id')
            ->setConditionType('eq')
            ->setValue($entityId)
            ->create();
        $searchCriteria = $this->searchCriteriaBuilder->addFilters([$filter])->create();
        return $this->getList($searchCriteria)->getItems();
    }

    /**
     * Get address by id
     *
     * @param string $addressId
     * @return ImranEntityInterface
     */
    public function getAddressById($addressId)
    {
        $address = $this->imranFactory->create();
        $this->resourceModel->load($address, $addressId);
        return $address;
    }
    /**
     * @inheritdoc
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function save($id)
    {
        $saves = $this->imranFactory->create();
        $this->resourceModel->load($saves, $id);
        return $saves;
    }
    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return ImranSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->collectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);
        $searchResult = $this->imranSearchResultsInterfaceFactory->create();
        $searchResult->setSearchCriteria($searchCriteria);
        $searchResult->setItems($collection->getItems());
        $searchResult->setTotalCount($collection->getSize());
        return $searchResult;
    }
}

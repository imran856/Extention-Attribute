<?php
namespace Test\Data\Plugin;

use Test\Data\Api\RpsEntityRepositoryInterface;
use Test\Data\Api\Data\ImranEntityExtensionFactory;
use Test\Data\Api\ImranEntityRepositoryInterface as Subject;
use Test\Data\Api\Data\ImranEntityInterface;

class EntityLoad
{
    /**
     * @var ImranEntityExtensionFactory
     */
    private ImranEntityExtensionFactory $imranEntityExtensionFactory;
    /**
     * @var RpsEntityRepositoryInterface
     */
    private RpsEntityRepositoryInterface $rpsEntityRepository;

    /**
     * EntityLoad constructor.
     * @param RpsEntityRepositoryInterface $rpsEntityRepository
     * @param ImranEntityExtensionFactory $imranEntityExtensionFactory
     */
    public function __construct(
        RpsEntityRepositoryInterface $rpsEntityRepository,
        ImranEntityExtensionFactory $imranEntityExtensionFactory
    ) {
        $this->imranEntityExtensionFactory = $imranEntityExtensionFactory;
        $this->rpsEntityRepository = $rpsEntityRepository;
    }

    /**
     * Get by id
     *
     * @param Subject $subject
     * @param ImranEntityInterface $result
     */
    public function afterGetAddressById(Subject $subject, $result)
    {
        $extensionAttributes = $result->getExtensionAttributes();
        $entityExtension = $extensionAttributes ? $extensionAttributes : $this->imranEntityExtensionFactory->create();
        $entity = $this->rpsEntityRepository->getById($result->getEntityId());
        $entityExtension->setEntityCustomer($entity);
        return $result->setExtensionAttributes($entityExtension);
    }
}

<?php
namespace Test\Data\Plugin;

use Test\Data\Api\Data\RpsEntityExtension;
use Test\Data\Api\Data\RpsEntityExtensionFactory;
use Test\Data\Api\RpsEntityRepositoryInterface as Subject;
use Test\Data\Api\Data\RpsEntityInterface;
use Test\Data\Api\ImranEntityRepositoryInterface;

class AddressLoad
{
    /**
     * @var RpsEntityExtension
     */
    private RpsEntityExtension $rpsEntityExtension;
    /**
     * @var RpsEntityExtensionFactory
     */
    private RpsEntityExtensionFactory $rpsEntityExtensionFactory;
    /**
     * @var ImranEntityRepositoryInterface
     */
    private ImranEntityRepositoryInterface $imranEntityRepository;

    /**
     * AddressLoad constructor.
     * @param RpsEntityExtension $rpsEntityExtension
     * @param RpsEntityExtensionFactory $RpsEntityExtensionFactory
     * @param ImranEntityRepositoryInterface $imranEntityRepository
     */
    public function __construct(
        RpsEntityExtension $rpsEntityExtension,
        RpsEntityExtensionFactory $rpsEntityExtensionFactory,
        ImranEntityRepositoryInterface $imranEntityRepository
    ) {
        $this->rpsEntityExtension = $rpsEntityExtension;
        $this->rpsEntityExtensionFactory = $rpsEntityExtensionFactory;
        $this->imranEntityRepository = $imranEntityRepository;
    }

    /**
     * Get by id
     *
     * @param Subject $subject
     * @param RpsEntityInterface $result
     */
    public function afterGetById(Subject $subject, $result)
    {
        $extensionAttributes = $result->getExtensionAttributes();
        $entityExtension = $extensionAttributes ? $extensionAttributes : $this->rpsEntityExtensionFactory->create();
        $address = $this->imranEntityRepository->getAddressByEntityId($result->getId());
        $entityExtension->setEntityAddress($address);
        return $result->setExtensionAttributes($entityExtension);
    }
}

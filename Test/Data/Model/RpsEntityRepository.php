<?php
namespace Test\Data\Model;

use Test\Data\Api\RpsEntityRepositoryInterface;
use Test\Data\Model\ResourceModel\Rps as ResourceModel;
use Test\Data\Model\RpsFactory as Rps;

class RpsEntityRepository implements RpsEntityRepositoryInterface
{

    /**
     * @var ResourceModel
     */
    private ResourceModel $ResourceModel;
    /**
     * @var Rps
     */
    private Rps $RpsFactory;

    /**
     * RpsEntityRepository constructor.
     *
     * @param ResourceModel $ResourceModel
     * @param Rps $RpsFactory
     */
    public function __construct(
        ResourceModel $ResourceModel,
        Rps $RpsFactory
    ) {
        $this->ResourceModel = $ResourceModel;
        $this->RpsFactory = $RpsFactory;
    }

    /**
     * Get entity by id
     *
     * @param string $id
     * @return \Test\Data\Api\Data\RpsEntityInterface
     */
    public function getById(string $id)
    {
        $entity = $this->RpsFactory->create();
        $this->ResourceModel->load($entity, $id);
        return $entity;
    }

    /**
     * Get Collection
     *
     * @return Collection
     */
    public function getCollection(): Collection
    {
        return $entityCollection =  $this->collection->load();
    }
}

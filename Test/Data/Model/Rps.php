<?php

namespace Test\Data\Model;

use Test\Data\Api\Data\RpsEntityInterface;
use Magento\Framework\Model\AbstractExtensibleModel;
use Test\Data\Api\Data\RpsEntityExtensionInterface;
use \Magento\Framework\Model\AbstractModel;
use Test\Data\Model\ResourceModel\Imran as ResourceModel;

class Rps extends AbstractExtensibleModel implements RpsEntityInterface
{
    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init("Test\Data\Model\ResourceModel\Rps");
    }


    /**
     * Get FirstName
     *
     * @return string
     */
    public function getCompName(): string
    {
        return $this->getData(self::COMPNAME);
    }

    /**
     * Get LastName
     *
     * @return string
     */
    public function getOfficeTime():string
    {
        return $this->getData(self::OFFICETIME);
    }

    /**
     *  Get Email
     *
     * @return string
     */
    public function getDesc(): string
    {
        return $this->getData(self::DESC);
    }
    /**
     * Retrieve existing extension attributes object or create a new one.
     *
     * @return \Test\Data\Api\Data\RpsEntityExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }
    /**
     * Set an extension attributes object.
     *
     * @param \Test\Data\Api\Data\RpsEntityExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(RpsEntityExtensionInterface $extensionAttributes)
    {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

}

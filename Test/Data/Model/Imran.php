<?php

namespace Test\Data\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use Test\Data\Api\Data\ImranEntityExtensionInterface;
use Test\Data\Api\Data\ImranEntityInterface;
use Test\Data\Model\ResourceModel\Imran as ResourceModel;

class Imran extends AbstractExtensibleModel implements ImranEntityInterface
{
    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    /**
     * Get SchoolTime
     * @return string
     */
    public function getSchoolTime()
    {
        return $this->getData(self::SCHOOLTIME);
    }


    /**
     * Get Feedback
     *
     * @return string
     */
    public function getFeedback()
    {
        return $this->getData(self::FEEDBACK);
    }

    /**
     * Set SchoolTime
     *
     * @param $schooltime
     * @return Imran
     */
    public function setSchoolTime($schooltime): Imran
    {
        return $this->setData(self::SCHOOLTIME, $schooltime);
    }

    /**
     * Set Feedback
     *
     * @param string $feedback
     * @return Imran
     */
    public function setFeedback($feedback)
    {
        return $this->setData(self::FEEDBACK, $feedback);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     *
     * @return ImranEntityExtensionInterface
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }
    /**
     * Set an extension attributes object.
     *
     * @param ImranEntityExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(ImranEntityExtensionInterface $extensionAttributes)
    {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}

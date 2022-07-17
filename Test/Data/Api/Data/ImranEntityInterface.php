<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Test\Data\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface ImranEntityInterface extends ExtensibleDataInterface
{
    public const ID = 'address_id';
    public const ENTITY_ID = 'entity_id';
    public const SCHOOLTIME = 'school_time';
    public const FEEDBACK = 'feedback';

    /**
     * Get Id
     *
     * @return int
     */
    public function getId();
    /**
     * Get Entity ID
     *
     * @return int
     */

    public function getEntityId();


    /**
     * Get School Time
     *
     * @return string
     */
    public function getSchoolTime();

    /**
     * Get Feedback
     *
     * @return string
     */
    public function getFeedback();

    /**
     * set SchoolTime
     *
     * @param $schooltime
     *  @return string
     */
    public function setSchoolTime($schooltime);

    /**
     * set Feedback
     *
     * @param string $feedback
     * @return string
     */
    public function setFeedback($feedback);

    /**
     * Retrieve existing extension attributes object or create a new one.
     *
     * @return \Test\Data\Api\Data\ImranEntityExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     *
     * @param \Test\Data\Api\Data\ImranEntityExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(\Test\Data\Api\Data\ImranEntityExtensionInterface
                                           $extensionAttributes);
}

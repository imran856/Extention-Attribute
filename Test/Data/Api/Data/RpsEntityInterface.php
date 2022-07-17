<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Test\Data\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface RpsEntityInterface extends ExtensibleDataInterface
{
    public const ID = 'entity_id';
    public const COMPNAME = 'comp_name';
    public const OFFICETIME = 'office_time';
    public const DESC = 'desc';

    /**
     * Get ID
     *
     * @return int
     */
    public function getId();

    /**
     * Get FIRSTName
     *
     * @return string
     */
    public function getCompName(): string;

    /**
     * Get LASTNAME
     *
     * @return string
     */
    public function getOfficeTime(): string;

    /**
     * Get EMAIL
     *
     * @return string
     */
    public function getDesc(): string;

    /**
     * Retrieve existing extension attributes object or create a new one.
     *
     * @return \Test\Data\Api\Data\RpsEntityExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     *
     * @param \Test\Data\Api\Data\RpsEntityExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(\Test\Data\Api\Data\RpsEntityExtensionInterface
                                           $extensionAttributes);
}

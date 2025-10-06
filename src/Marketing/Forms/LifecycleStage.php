<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type lifecycle_stage = array{objectTypeID: string, value: string}
 */
final class LifecycleStage implements BaseModel
{
    /** @use SdkModel<lifecycle_stage> */
    use SdkModel;

    #[Api('objectTypeId')]
    public string $objectTypeID;

    #[Api]
    public string $value;

    /**
     * `new LifecycleStage()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LifecycleStage::with(objectTypeID: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LifecycleStage)->withObjectTypeID(...)->withValue(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $objectTypeID, string $value): self
    {
        $obj = new self;

        $obj->objectTypeID = $objectTypeID;
        $obj->value = $value;

        return $obj;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj->objectTypeID = $objectTypeID;

        return $obj;
    }

    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }
}

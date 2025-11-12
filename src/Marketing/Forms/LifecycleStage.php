<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type LifecycleStageShape = array{objectTypeId: string, value: string}
 */
final class LifecycleStage implements BaseModel
{
    /** @use SdkModel<LifecycleStageShape> */
    use SdkModel;

    /**
     * The objectTypeId for both contact and company.
     */
    #[Api]
    public string $objectTypeId;

    /**
     * The internal name of the contact's lifecycle stage set when submitting a form.
     */
    #[Api]
    public string $value;

    /**
     * `new LifecycleStage()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LifecycleStage::with(objectTypeId: ..., value: ...)
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
    public static function with(string $objectTypeId, string $value): self
    {
        $obj = new self;

        $obj->objectTypeId = $objectTypeId;
        $obj->value = $value;

        return $obj;
    }

    /**
     * The objectTypeId for both contact and company.
     */
    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj->objectTypeId = $objectTypeID;

        return $obj;
    }

    /**
     * The internal name of the contact's lifecycle stage set when submitting a form.
     */
    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }
}

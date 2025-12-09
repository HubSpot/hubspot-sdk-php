<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type LifecycleStageShape = array{objectTypeID: string, value: string}
 */
final class LifecycleStage implements BaseModel
{
    /** @use SdkModel<LifecycleStageShape> */
    use SdkModel;

    /**
     * The objectTypeId for both contact and company.
     */
    #[Required('objectTypeId')]
    public string $objectTypeID;

    /**
     * The internal name of the contact's lifecycle stage set when submitting a form.
     */
    #[Required]
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
        $self = new self;

        $self['objectTypeID'] = $objectTypeID;
        $self['value'] = $value;

        return $self;
    }

    /**
     * The objectTypeId for both contact and company.
     */
    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    /**
     * The internal name of the contact's lifecycle stage set when submitting a form.
     */
    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}

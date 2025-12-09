<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Limits;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type AtLimitRecordSampleShape = array{label: string, objectID: int}
 */
final class AtLimitRecordSample implements BaseModel
{
    /** @use SdkModel<AtLimitRecordSampleShape> */
    use SdkModel;

    /**
     * The label associated with a record that is at its limit.
     */
    #[Required]
    public string $label;

    /**
     * The objectId of the object that is at its limit.
     */
    #[Required('objectId')]
    public int $objectID;

    /**
     * `new AtLimitRecordSample()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AtLimitRecordSample::with(label: ..., objectID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AtLimitRecordSample)->withLabel(...)->withObjectID(...)
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
    public static function with(string $label, int $objectID): self
    {
        $self = new self;

        $self['label'] = $label;
        $self['objectID'] = $objectID;

        return $self;
    }

    /**
     * The label associated with a record that is at its limit.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * The objectId of the object that is at its limit.
     */
    public function withObjectID(int $objectID): self
    {
        $self = clone $this;
        $self['objectID'] = $objectID;

        return $self;
    }
}

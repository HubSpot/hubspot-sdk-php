<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Limits;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type NearLimitRecordSampleShape = array{
 *   label: string, objectID: int, percentage: float, usage: int
 * }
 */
final class NearLimitRecordSample implements BaseModel
{
    /** @use SdkModel<NearLimitRecordSampleShape> */
    use SdkModel;

    /**
     * The primary identifier of the record.
     */
    #[Required]
    public string $label;

    /**
     * The unique identifier for the object.
     */
    #[Required('objectId')]
    public int $objectID;

    /**
     * The percentage of the limit that has been used.
     */
    #[Required]
    public float $percentage;

    /**
     * The number of records currently in use.
     */
    #[Required]
    public int $usage;

    /**
     * `new NearLimitRecordSample()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NearLimitRecordSample::with(
     *   label: ..., objectID: ..., percentage: ..., usage: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NearLimitRecordSample)
     *   ->withLabel(...)
     *   ->withObjectID(...)
     *   ->withPercentage(...)
     *   ->withUsage(...)
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
    public static function with(
        string $label,
        int $objectID,
        float $percentage,
        int $usage
    ): self {
        $self = new self;

        $self['label'] = $label;
        $self['objectID'] = $objectID;
        $self['percentage'] = $percentage;
        $self['usage'] = $usage;

        return $self;
    }

    /**
     * The primary identifier of the record.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * The unique identifier for the object.
     */
    public function withObjectID(int $objectID): self
    {
        $self = clone $this;
        $self['objectID'] = $objectID;

        return $self;
    }

    /**
     * The percentage of the limit that has been used.
     */
    public function withPercentage(float $percentage): self
    {
        $self = clone $this;
        $self['percentage'] = $percentage;

        return $self;
    }

    /**
     * The number of records currently in use.
     */
    public function withUsage(int $usage): self
    {
        $self = clone $this;
        $self['usage'] = $usage;

        return $self;
    }
}

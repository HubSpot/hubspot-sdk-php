<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Limits;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type NearLimitRecordSampleShape = array{
 *   label: string, objectId: int, percentage: float, usage: int
 * }
 */
final class NearLimitRecordSample implements BaseModel
{
    /** @use SdkModel<NearLimitRecordSampleShape> */
    use SdkModel;

    /**
     * The primary identifier of the record.
     */
    #[Api]
    public string $label;

    /**
     * The unique identifier for the object.
     */
    #[Api]
    public int $objectId;

    /**
     * The percentage of the limit that has been used.
     */
    #[Api]
    public float $percentage;

    /**
     * The number of records currently in use.
     */
    #[Api]
    public int $usage;

    /**
     * `new NearLimitRecordSample()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NearLimitRecordSample::with(
     *   label: ..., objectId: ..., percentage: ..., usage: ...
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
        int $objectId,
        float $percentage,
        int $usage
    ): self {
        $obj = new self;

        $obj->label = $label;
        $obj->objectId = $objectId;
        $obj->percentage = $percentage;
        $obj->usage = $usage;

        return $obj;
    }

    /**
     * The primary identifier of the record.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    /**
     * The unique identifier for the object.
     */
    public function withObjectID(int $objectID): self
    {
        $obj = clone $this;
        $obj->objectId = $objectID;

        return $obj;
    }

    /**
     * The percentage of the limit that has been used.
     */
    public function withPercentage(float $percentage): self
    {
        $obj = clone $this;
        $obj->percentage = $percentage;

        return $obj;
    }

    /**
     * The number of records currently in use.
     */
    public function withUsage(int $usage): self
    {
        $obj = clone $this;
        $obj->usage = $usage;

        return $obj;
    }
}

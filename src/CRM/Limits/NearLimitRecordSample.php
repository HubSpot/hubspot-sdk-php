<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Limits;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type NearLimitRecordSampleShape = array{
 *   label: string, objectID: int, percentage: float, usage: int
 * }
 */
final class NearLimitRecordSample implements BaseModel
{
    /** @use SdkModel<NearLimitRecordSampleShape> */
    use SdkModel;

    #[Api]
    public string $label;

    #[Api('objectId')]
    public int $objectID;

    #[Api]
    public float $percentage;

    #[Api]
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
        $obj = new self;

        $obj->label = $label;
        $obj->objectID = $objectID;
        $obj->percentage = $percentage;
        $obj->usage = $usage;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    public function withObjectID(int $objectID): self
    {
        $obj = clone $this;
        $obj->objectID = $objectID;

        return $obj;
    }

    public function withPercentage(float $percentage): self
    {
        $obj = clone $this;
        $obj->percentage = $percentage;

        return $obj;
    }

    public function withUsage(int $usage): self
    {
        $obj = clone $this;
        $obj->usage = $usage;

        return $obj;
    }
}

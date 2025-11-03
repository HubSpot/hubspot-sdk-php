<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Limits;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type CustomObjectLimitResponseShape = array{
 *   limit: int, percentage: float, usage: int
 * }
 */
final class CustomObjectLimitResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<CustomObjectLimitResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public int $limit;

    #[Api]
    public float $percentage;

    #[Api]
    public int $usage;

    /**
     * `new CustomObjectLimitResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CustomObjectLimitResponse::with(limit: ..., percentage: ..., usage: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CustomObjectLimitResponse)
     *   ->withLimit(...)
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
    public static function with(int $limit, float $percentage, int $usage): self
    {
        $obj = new self;

        $obj->limit = $limit;
        $obj->percentage = $percentage;
        $obj->usage = $usage;

        return $obj;
    }

    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

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

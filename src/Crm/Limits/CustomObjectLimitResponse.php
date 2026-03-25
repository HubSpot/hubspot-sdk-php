<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Limits;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type CustomObjectLimitResponseShape = array{
 *   limit: int, percentage: float, usage: int
 * }
 */
final class CustomObjectLimitResponse implements BaseModel
{
    /** @use SdkModel<CustomObjectLimitResponseShape> */
    use SdkModel;

    /**
     * The maximum number of custom objects allowed.
     */
    #[Required]
    public int $limit;

    /**
     * The percentage of the custom object limit that is currently used.
     */
    #[Required]
    public float $percentage;

    /**
     * The current number of custom objects used.
     */
    #[Required]
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
        $self = new self;

        $self['limit'] = $limit;
        $self['percentage'] = $percentage;
        $self['usage'] = $usage;

        return $self;
    }

    /**
     * The maximum number of custom objects allowed.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * The percentage of the custom object limit that is currently used.
     */
    public function withPercentage(float $percentage): self
    {
        $self = clone $this;
        $self['percentage'] = $percentage;

        return $self;
    }

    /**
     * The current number of custom objects used.
     */
    public function withUsage(int $usage): self
    {
        $self = clone $this;
        $self['usage'] = $usage;

        return $self;
    }
}

<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicWebinarFilter\FilterType;

/**
 * @phpstan-type PublicWebinarFilterShape = array{
 *   filterType: value-of<FilterType>, operator: string, webinarId?: string|null
 * }
 */
final class PublicWebinarFilter implements BaseModel
{
    /** @use SdkModel<PublicWebinarFilterShape> */
    use SdkModel;

    /** @var value-of<FilterType> $filterType */
    #[Api(enum: FilterType::class)]
    public string $filterType;

    #[Api]
    public string $operator;

    #[Api(optional: true)]
    public ?string $webinarId;

    /**
     * `new PublicWebinarFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicWebinarFilter::with(filterType: ..., operator: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicWebinarFilter)->withFilterType(...)->withOperator(...)
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
     *
     * @param FilterType|value-of<FilterType> $filterType
     */
    public static function with(
        string $operator,
        FilterType|string $filterType = 'WEBINAR',
        ?string $webinarId = null,
    ): self {
        $obj = new self;

        $obj['filterType'] = $filterType;
        $obj['operator'] = $operator;

        null !== $webinarId && $obj['webinarId'] = $webinarId;

        return $obj;
    }

    /**
     * @param FilterType|value-of<FilterType> $filterType
     */
    public function withFilterType(FilterType|string $filterType): self
    {
        $obj = clone $this;
        $obj['filterType'] = $filterType;

        return $obj;
    }

    public function withOperator(string $operator): self
    {
        $obj = clone $this;
        $obj['operator'] = $operator;

        return $obj;
    }

    public function withWebinarID(string $webinarID): self
    {
        $obj = clone $this;
        $obj['webinarId'] = $webinarID;

        return $obj;
    }
}

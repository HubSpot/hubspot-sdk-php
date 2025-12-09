<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicWebinarFilter\FilterType;

/**
 * @phpstan-type PublicWebinarFilterShape = array{
 *   filterType: value-of<FilterType>, operator: string, webinarID?: string|null
 * }
 */
final class PublicWebinarFilter implements BaseModel
{
    /** @use SdkModel<PublicWebinarFilterShape> */
    use SdkModel;

    /** @var value-of<FilterType> $filterType */
    #[Required(enum: FilterType::class)]
    public string $filterType;

    #[Required]
    public string $operator;

    #[Optional('webinarId')]
    public ?string $webinarID;

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
        ?string $webinarID = null,
    ): self {
        $obj = new self;

        $obj['filterType'] = $filterType;
        $obj['operator'] = $operator;

        null !== $webinarID && $obj['webinarID'] = $webinarID;

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
        $obj['webinarID'] = $webinarID;

        return $obj;
    }
}

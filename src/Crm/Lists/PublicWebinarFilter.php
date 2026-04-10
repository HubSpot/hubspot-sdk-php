<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Lists\PublicWebinarFilter\FilterType;

/**
 * @phpstan-type PublicWebinarFilterShape = array{
 *   filterType: FilterType|value-of<FilterType>,
 *   operator: string,
 *   webinarID?: string|null,
 * }
 */
final class PublicWebinarFilter implements BaseModel
{
    /** @use SdkModel<PublicWebinarFilterShape> */
    use SdkModel;

    /**
     * Indicates the type of filter, (WEBINAR).
     *
     * @var value-of<FilterType> $filterType
     */
    #[Required(enum: FilterType::class)]
    public string $filterType;

    /**
     * Specifies the operation to be performed by the filter (HAS_WEBINAR_REGISTRATION, NOT_HAS_WEBINAR_REGISTRATION, HAS_WEBINAR_ATTENDANCE, NOT_HAS_WEBINAR_ATTENDANCE).
     */
    #[Required]
    public string $operator;

    /**
     * The ID of the webinar associated with the filter.
     */
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
        $self = new self;

        $self['filterType'] = $filterType;
        $self['operator'] = $operator;

        null !== $webinarID && $self['webinarID'] = $webinarID;

        return $self;
    }

    /**
     * Indicates the type of filter, (WEBINAR).
     *
     * @param FilterType|value-of<FilterType> $filterType
     */
    public function withFilterType(FilterType|string $filterType): self
    {
        $self = clone $this;
        $self['filterType'] = $filterType;

        return $self;
    }

    /**
     * Specifies the operation to be performed by the filter (HAS_WEBINAR_REGISTRATION, NOT_HAS_WEBINAR_REGISTRATION, HAS_WEBINAR_ATTENDANCE, NOT_HAS_WEBINAR_ATTENDANCE).
     */
    public function withOperator(string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }

    /**
     * The ID of the webinar associated with the filter.
     */
    public function withWebinarID(string $webinarID): self
    {
        $self = clone $this;
        $self['webinarID'] = $webinarID;

        return $self;
    }
}

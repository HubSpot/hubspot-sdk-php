<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Lists\PublicPrivacyAnalyticsFilter\FilterType;

/**
 * @phpstan-type PublicPrivacyAnalyticsFilterShape = array{
 *   filterType: FilterType|value-of<FilterType>,
 *   operator: string,
 *   privacyName: string,
 * }
 */
final class PublicPrivacyAnalyticsFilter implements BaseModel
{
    /** @use SdkModel<PublicPrivacyAnalyticsFilterShape> */
    use SdkModel;

    /**
     * Specifies the type of filter (PRIVACY).
     *
     * @var value-of<FilterType> $filterType
     */
    #[Required(enum: FilterType::class)]
    public string $filterType;

    /**
     * Defines the operation to be applied within the filter (PRIVACY_CONSENT_GRANTED, PRIVACY_CONSENT_NOT_GRANTED).
     */
    #[Required]
    public string $operator;

    /**
     * The name of the privacy setting used in the filter.
     */
    #[Required]
    public string $privacyName;

    /**
     * `new PublicPrivacyAnalyticsFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicPrivacyAnalyticsFilter::with(
     *   filterType: ..., operator: ..., privacyName: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicPrivacyAnalyticsFilter)
     *   ->withFilterType(...)
     *   ->withOperator(...)
     *   ->withPrivacyName(...)
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
        string $privacyName,
        FilterType|string $filterType = 'PRIVACY',
    ): self {
        $self = new self;

        $self['filterType'] = $filterType;
        $self['operator'] = $operator;
        $self['privacyName'] = $privacyName;

        return $self;
    }

    /**
     * Specifies the type of filter (PRIVACY).
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
     * Defines the operation to be applied within the filter (PRIVACY_CONSENT_GRANTED, PRIVACY_CONSENT_NOT_GRANTED).
     */
    public function withOperator(string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }

    /**
     * The name of the privacy setting used in the filter.
     */
    public function withPrivacyName(string $privacyName): self
    {
        $self = clone $this;
        $self['privacyName'] = $privacyName;

        return $self;
    }
}

<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicPrivacyAnalyticsFilter\FilterType;

/**
 * @phpstan-type PublicPrivacyAnalyticsFilterShape = array{
 *   filterType: value-of<FilterType>, operator: string, privacyName: string
 * }
 */
final class PublicPrivacyAnalyticsFilter implements BaseModel
{
    /** @use SdkModel<PublicPrivacyAnalyticsFilterShape> */
    use SdkModel;

    /** @var value-of<FilterType> $filterType */
    #[Required(enum: FilterType::class)]
    public string $filterType;

    #[Required]
    public string $operator;

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
        $obj = new self;

        $obj['filterType'] = $filterType;
        $obj['operator'] = $operator;
        $obj['privacyName'] = $privacyName;

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

    public function withPrivacyName(string $privacyName): self
    {
        $obj = clone $this;
        $obj['privacyName'] = $privacyName;

        return $obj;
    }
}

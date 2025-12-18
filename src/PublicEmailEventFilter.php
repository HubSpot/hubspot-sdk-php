<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicEmailEventFilter\FilterType;
use HubspotSDK\PublicEmailEventFilter\Operator;

/**
 * @phpstan-import-type PruningRefineByShape from \HubspotSDK\PublicEmailEventFilter\PruningRefineBy
 *
 * @phpstan-type PublicEmailEventFilterShape = array{
 *   appID: string,
 *   emailID: string,
 *   filterType: FilterType|value-of<FilterType>,
 *   level: string,
 *   operator: Operator|value-of<Operator>,
 *   clickURL?: string|null,
 *   pruningRefineBy?: PruningRefineByShape|null,
 * }
 */
final class PublicEmailEventFilter implements BaseModel
{
    /** @use SdkModel<PublicEmailEventFilterShape> */
    use SdkModel;

    #[Required('appId')]
    public string $appID;

    #[Required('emailId')]
    public string $emailID;

    /** @var value-of<FilterType> $filterType */
    #[Required(enum: FilterType::class)]
    public string $filterType;

    #[Required]
    public string $level;

    /** @var value-of<Operator> $operator */
    #[Required(enum: Operator::class)]
    public string $operator;

    #[Optional('clickUrl')]
    public ?string $clickURL;

    #[Optional]
    public PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null $pruningRefineBy;

    /**
     * `new PublicEmailEventFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicEmailEventFilter::with(
     *   appID: ..., emailID: ..., filterType: ..., level: ..., operator: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicEmailEventFilter)
     *   ->withAppID(...)
     *   ->withEmailID(...)
     *   ->withFilterType(...)
     *   ->withLevel(...)
     *   ->withOperator(...)
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
     * @param Operator|value-of<Operator> $operator
     * @param FilterType|value-of<FilterType> $filterType
     * @param PruningRefineByShape|null $pruningRefineBy
     */
    public static function with(
        string $appID,
        string $emailID,
        string $level,
        Operator|string $operator,
        FilterType|string $filterType = 'EMAIL_EVENT',
        ?string $clickURL = null,
        PublicNumOccurrencesRefineBy|array|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null $pruningRefineBy = null,
    ): self {
        $self = new self;

        $self['appID'] = $appID;
        $self['emailID'] = $emailID;
        $self['filterType'] = $filterType;
        $self['level'] = $level;
        $self['operator'] = $operator;

        null !== $clickURL && $self['clickURL'] = $clickURL;
        null !== $pruningRefineBy && $self['pruningRefineBy'] = $pruningRefineBy;

        return $self;
    }

    public function withAppID(string $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }

    public function withEmailID(string $emailID): self
    {
        $self = clone $this;
        $self['emailID'] = $emailID;

        return $self;
    }

    /**
     * @param FilterType|value-of<FilterType> $filterType
     */
    public function withFilterType(FilterType|string $filterType): self
    {
        $self = clone $this;
        $self['filterType'] = $filterType;

        return $self;
    }

    public function withLevel(string $level): self
    {
        $self = clone $this;
        $self['level'] = $level;

        return $self;
    }

    /**
     * @param Operator|value-of<Operator> $operator
     */
    public function withOperator(Operator|string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }

    public function withClickURL(string $clickURL): self
    {
        $self = clone $this;
        $self['clickURL'] = $clickURL;

        return $self;
    }

    /**
     * @param PruningRefineByShape $pruningRefineBy
     */
    public function withPruningRefineBy(
        PublicNumOccurrencesRefineBy|array|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation $pruningRefineBy,
    ): self {
        $self = clone $this;
        $self['pruningRefineBy'] = $pruningRefineBy;

        return $self;
    }
}

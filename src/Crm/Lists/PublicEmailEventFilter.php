<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Lists\PublicEmailEventFilter\FilterType;
use HubspotSDK\Crm\Lists\PublicEmailEventFilter\Operator;

/**
 * @phpstan-import-type PruningRefineByVariants from \HubspotSDK\Crm\Lists\PublicEmailEventFilter\PruningRefineBy
 * @phpstan-import-type PruningRefineByShape from \HubspotSDK\Crm\Lists\PublicEmailEventFilter\PruningRefineBy
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

    /**
     * The ID of the application associated with the email event filter.
     */
    #[Required('appId')]
    public string $appID;

    /**
     * The ID of the email associated with the event filter.
     */
    #[Required('emailId')]
    public string $emailID;

    /**
     * Indicates the type of filter (EMAIL_EVENT).
     *
     * @var value-of<FilterType> $filterType
     */
    #[Required(enum: FilterType::class)]
    public string $filterType;

    /**
     * Specifies the level of the email event, such as EMAIL_API_CAMPAIGN_GROUP.
     */
    #[Required]
    public string $level;

    /**
     * Defines the operation to be applied within the filter (BOUNCED, LINK_CLICKED, MARKED_SPAM, OPENED, OPENED_BUT_LINK_NOT_CLICKED, OPENED_BUT_NOT_REPLIED, RECEIVED, RECEIVED_BUT_NOT_OPENED, REPLIED, SENT, SENT_BUT_LINK_NOT_CLICKED, SENT_BUT_NOT_RECEIVED, UNSUBSCRIBED).
     *
     * @var value-of<Operator> $operator
     */
    #[Required(enum: Operator::class)]
    public string $operator;

    /**
     * The URL that was clicked in the email event.
     */
    #[Optional('clickUrl')]
    public ?string $clickURL;

    /**
     * Specifies the criteria for refining the filter by pruning.
     *
     * @var PruningRefineByVariants|null $pruningRefineBy
     */
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

    /**
     * The ID of the application associated with the email event filter.
     */
    public function withAppID(string $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }

    /**
     * The ID of the email associated with the event filter.
     */
    public function withEmailID(string $emailID): self
    {
        $self = clone $this;
        $self['emailID'] = $emailID;

        return $self;
    }

    /**
     * Indicates the type of filter (EMAIL_EVENT).
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
     * Specifies the level of the email event, such as EMAIL_API_CAMPAIGN_GROUP.
     */
    public function withLevel(string $level): self
    {
        $self = clone $this;
        $self['level'] = $level;

        return $self;
    }

    /**
     * Defines the operation to be applied within the filter (BOUNCED, LINK_CLICKED, MARKED_SPAM, OPENED, OPENED_BUT_LINK_NOT_CLICKED, OPENED_BUT_NOT_REPLIED, RECEIVED, RECEIVED_BUT_NOT_OPENED, REPLIED, SENT, SENT_BUT_LINK_NOT_CLICKED, SENT_BUT_NOT_RECEIVED, UNSUBSCRIBED).
     *
     * @param Operator|value-of<Operator> $operator
     */
    public function withOperator(Operator|string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }

    /**
     * The URL that was clicked in the email event.
     */
    public function withClickURL(string $clickURL): self
    {
        $self = clone $this;
        $self['clickURL'] = $clickURL;

        return $self;
    }

    /**
     * Specifies the criteria for refining the filter by pruning.
     *
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

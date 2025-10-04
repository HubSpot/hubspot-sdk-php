<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationPublicNotAllFilterBranch\Filter;
use HubspotSDK\Automation\AutomationPublicNotAllFilterBranch\FilterBranch;
use HubspotSDK\Automation\AutomationPublicNotAllFilterBranch\FilterBranchType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_public_not_all_filter_branch = array{
 *   filterBranches: list<AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch>,
 *   filterBranchOperator: string,
 *   filterBranchType: value-of<FilterBranchType>,
 *   filters: list<AutomationPublicPropertyFilter|AutomationPublicAssociationInListFilter|AutomationPublicPageViewAnalyticsFilter|AutomationPublicCtaAnalyticsFilter|AutomationPublicEventAnalyticsFilter|AutomationPublicFormSubmissionFilter|AutomationPublicFormSubmissionOnPageFilter|AutomationPublicIntegrationEventFilter|AutomationPublicEmailSubscriptionFilter|AutomationPublicCommunicationSubscriptionFilter|AutomationPublicCampaignInfluencedFilter|AutomationPublicSurveyMonkeyFilter|AutomationPublicSurveyMonkeyValueFilter|AutomationPublicWebinarFilter|AutomationPublicEmailEventFilter|AutomationPublicPrivacyAnalyticsFilter|AutomationPublicAdsSearchFilter|AutomationPublicAdsTimeFilter|AutomationPublicInListFilter|AutomationPublicNumAssociationsFilter|AutomationPublicUnifiedEventsFilter|AutomationPublicPropertyAssociationInListFilter|AutomationPublicConstantFilter>,
 * }
 */
final class AutomationPublicNotAllFilterBranch implements BaseModel
{
    /** @use SdkModel<automation_public_not_all_filter_branch> */
    use SdkModel;

    /**
     * @var list<AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch> $filterBranches
     */
    #[Api(list: FilterBranch::class)]
    public array $filterBranches;

    #[Api]
    public string $filterBranchOperator;

    /** @var value-of<FilterBranchType> $filterBranchType */
    #[Api(enum: FilterBranchType::class)]
    public string $filterBranchType;

    /**
     * @var list<AutomationPublicPropertyFilter|AutomationPublicAssociationInListFilter|AutomationPublicPageViewAnalyticsFilter|AutomationPublicCtaAnalyticsFilter|AutomationPublicEventAnalyticsFilter|AutomationPublicFormSubmissionFilter|AutomationPublicFormSubmissionOnPageFilter|AutomationPublicIntegrationEventFilter|AutomationPublicEmailSubscriptionFilter|AutomationPublicCommunicationSubscriptionFilter|AutomationPublicCampaignInfluencedFilter|AutomationPublicSurveyMonkeyFilter|AutomationPublicSurveyMonkeyValueFilter|AutomationPublicWebinarFilter|AutomationPublicEmailEventFilter|AutomationPublicPrivacyAnalyticsFilter|AutomationPublicAdsSearchFilter|AutomationPublicAdsTimeFilter|AutomationPublicInListFilter|AutomationPublicNumAssociationsFilter|AutomationPublicUnifiedEventsFilter|AutomationPublicPropertyAssociationInListFilter|AutomationPublicConstantFilter> $filters
     */
    #[Api(list: Filter::class)]
    public array $filters;

    /**
     * `new AutomationPublicNotAllFilterBranch()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationPublicNotAllFilterBranch::with(
     *   filterBranches: ...,
     *   filterBranchOperator: ...,
     *   filterBranchType: ...,
     *   filters: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationPublicNotAllFilterBranch)
     *   ->withFilterBranches(...)
     *   ->withFilterBranchOperator(...)
     *   ->withFilterBranchType(...)
     *   ->withFilters(...)
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
     * @param list<AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch> $filterBranches
     * @param list<AutomationPublicPropertyFilter|AutomationPublicAssociationInListFilter|AutomationPublicPageViewAnalyticsFilter|AutomationPublicCtaAnalyticsFilter|AutomationPublicEventAnalyticsFilter|AutomationPublicFormSubmissionFilter|AutomationPublicFormSubmissionOnPageFilter|AutomationPublicIntegrationEventFilter|AutomationPublicEmailSubscriptionFilter|AutomationPublicCommunicationSubscriptionFilter|AutomationPublicCampaignInfluencedFilter|AutomationPublicSurveyMonkeyFilter|AutomationPublicSurveyMonkeyValueFilter|AutomationPublicWebinarFilter|AutomationPublicEmailEventFilter|AutomationPublicPrivacyAnalyticsFilter|AutomationPublicAdsSearchFilter|AutomationPublicAdsTimeFilter|AutomationPublicInListFilter|AutomationPublicNumAssociationsFilter|AutomationPublicUnifiedEventsFilter|AutomationPublicPropertyAssociationInListFilter|AutomationPublicConstantFilter> $filters
     * @param FilterBranchType|value-of<FilterBranchType> $filterBranchType
     */
    public static function with(
        array $filterBranches,
        string $filterBranchOperator,
        array $filters,
        FilterBranchType|string $filterBranchType = 'NOT_ALL',
    ): self {
        $obj = new self;

        $obj->filterBranches = $filterBranches;
        $obj->filterBranchOperator = $filterBranchOperator;
        $obj['filterBranchType'] = $filterBranchType;
        $obj->filters = $filters;

        return $obj;
    }

    /**
     * @param list<AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch> $filterBranches
     */
    public function withFilterBranches(array $filterBranches): self
    {
        $obj = clone $this;
        $obj->filterBranches = $filterBranches;

        return $obj;
    }

    public function withFilterBranchOperator(string $filterBranchOperator): self
    {
        $obj = clone $this;
        $obj->filterBranchOperator = $filterBranchOperator;

        return $obj;
    }

    /**
     * @param FilterBranchType|value-of<FilterBranchType> $filterBranchType
     */
    public function withFilterBranchType(
        FilterBranchType|string $filterBranchType
    ): self {
        $obj = clone $this;
        $obj['filterBranchType'] = $filterBranchType;

        return $obj;
    }

    /**
     * @param list<AutomationPublicPropertyFilter|AutomationPublicAssociationInListFilter|AutomationPublicPageViewAnalyticsFilter|AutomationPublicCtaAnalyticsFilter|AutomationPublicEventAnalyticsFilter|AutomationPublicFormSubmissionFilter|AutomationPublicFormSubmissionOnPageFilter|AutomationPublicIntegrationEventFilter|AutomationPublicEmailSubscriptionFilter|AutomationPublicCommunicationSubscriptionFilter|AutomationPublicCampaignInfluencedFilter|AutomationPublicSurveyMonkeyFilter|AutomationPublicSurveyMonkeyValueFilter|AutomationPublicWebinarFilter|AutomationPublicEmailEventFilter|AutomationPublicPrivacyAnalyticsFilter|AutomationPublicAdsSearchFilter|AutomationPublicAdsTimeFilter|AutomationPublicInListFilter|AutomationPublicNumAssociationsFilter|AutomationPublicUnifiedEventsFilter|AutomationPublicPropertyAssociationInListFilter|AutomationPublicConstantFilter> $filters
     */
    public function withFilters(array $filters): self
    {
        $obj = clone $this;
        $obj->filters = $filters;

        return $obj;
    }
}

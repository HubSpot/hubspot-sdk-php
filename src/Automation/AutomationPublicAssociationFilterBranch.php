<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationPublicAssociationFilterBranch\Filter;
use HubspotSDK\Automation\AutomationPublicAssociationFilterBranch\FilterBranch;
use HubspotSDK\Automation\AutomationPublicAssociationFilterBranch\FilterBranchType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_public_association_filter_branch = array{
 *   associationCategory: string,
 *   associationTypeID: int,
 *   filterBranches: list<AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch>,
 *   filterBranchOperator: string,
 *   filterBranchType: value-of<FilterBranchType>,
 *   filters: list<AutomationPublicPropertyFilter|AutomationPublicAssociationInListFilter|AutomationPublicPageViewAnalyticsFilter|AutomationPublicCtaAnalyticsFilter|AutomationPublicEventAnalyticsFilter|AutomationPublicFormSubmissionFilter|AutomationPublicFormSubmissionOnPageFilter|AutomationPublicIntegrationEventFilter|AutomationPublicEmailSubscriptionFilter|AutomationPublicCommunicationSubscriptionFilter|AutomationPublicCampaignInfluencedFilter|AutomationPublicSurveyMonkeyFilter|AutomationPublicSurveyMonkeyValueFilter|AutomationPublicWebinarFilter|AutomationPublicEmailEventFilter|AutomationPublicPrivacyAnalyticsFilter|AutomationPublicAdsSearchFilter|AutomationPublicAdsTimeFilter|AutomationPublicInListFilter|AutomationPublicNumAssociationsFilter|AutomationPublicUnifiedEventsFilter|AutomationPublicPropertyAssociationInListFilter|AutomationPublicConstantFilter>,
 *   objectTypeID: string,
 *   operator: string,
 * }
 */
final class AutomationPublicAssociationFilterBranch implements BaseModel
{
    /** @use SdkModel<automation_public_association_filter_branch> */
    use SdkModel;

    #[Api]
    public string $associationCategory;

    #[Api('associationTypeId')]
    public int $associationTypeID;

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

    #[Api('objectTypeId')]
    public string $objectTypeID;

    #[Api]
    public string $operator;

    /**
     * `new AutomationPublicAssociationFilterBranch()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationPublicAssociationFilterBranch::with(
     *   associationCategory: ...,
     *   associationTypeID: ...,
     *   filterBranches: ...,
     *   filterBranchOperator: ...,
     *   filterBranchType: ...,
     *   filters: ...,
     *   objectTypeID: ...,
     *   operator: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationPublicAssociationFilterBranch)
     *   ->withAssociationCategory(...)
     *   ->withAssociationTypeID(...)
     *   ->withFilterBranches(...)
     *   ->withFilterBranchOperator(...)
     *   ->withFilterBranchType(...)
     *   ->withFilters(...)
     *   ->withObjectTypeID(...)
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
     * @param list<AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch> $filterBranches
     * @param list<AutomationPublicPropertyFilter|AutomationPublicAssociationInListFilter|AutomationPublicPageViewAnalyticsFilter|AutomationPublicCtaAnalyticsFilter|AutomationPublicEventAnalyticsFilter|AutomationPublicFormSubmissionFilter|AutomationPublicFormSubmissionOnPageFilter|AutomationPublicIntegrationEventFilter|AutomationPublicEmailSubscriptionFilter|AutomationPublicCommunicationSubscriptionFilter|AutomationPublicCampaignInfluencedFilter|AutomationPublicSurveyMonkeyFilter|AutomationPublicSurveyMonkeyValueFilter|AutomationPublicWebinarFilter|AutomationPublicEmailEventFilter|AutomationPublicPrivacyAnalyticsFilter|AutomationPublicAdsSearchFilter|AutomationPublicAdsTimeFilter|AutomationPublicInListFilter|AutomationPublicNumAssociationsFilter|AutomationPublicUnifiedEventsFilter|AutomationPublicPropertyAssociationInListFilter|AutomationPublicConstantFilter> $filters
     * @param FilterBranchType|value-of<FilterBranchType> $filterBranchType
     */
    public static function with(
        string $associationCategory,
        int $associationTypeID,
        array $filterBranches,
        string $filterBranchOperator,
        array $filters,
        string $objectTypeID,
        string $operator,
        FilterBranchType|string $filterBranchType = 'ASSOCIATION',
    ): self {
        $obj = new self;

        $obj->associationCategory = $associationCategory;
        $obj->associationTypeID = $associationTypeID;
        $obj->filterBranches = $filterBranches;
        $obj->filterBranchOperator = $filterBranchOperator;
        $obj['filterBranchType'] = $filterBranchType;
        $obj->filters = $filters;
        $obj->objectTypeID = $objectTypeID;
        $obj->operator = $operator;

        return $obj;
    }

    public function withAssociationCategory(string $associationCategory): self
    {
        $obj = clone $this;
        $obj->associationCategory = $associationCategory;

        return $obj;
    }

    public function withAssociationTypeID(int $associationTypeID): self
    {
        $obj = clone $this;
        $obj->associationTypeID = $associationTypeID;

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

    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj->objectTypeID = $objectTypeID;

        return $obj;
    }

    public function withOperator(string $operator): self
    {
        $obj = clone $this;
        $obj->operator = $operator;

        return $obj;
    }
}

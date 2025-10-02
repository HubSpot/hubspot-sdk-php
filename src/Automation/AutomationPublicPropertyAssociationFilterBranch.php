<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationPublicPropertyAssociationFilterBranch\Filter;
use HubspotSDK\Automation\AutomationPublicPropertyAssociationFilterBranch\FilterBranch;
use HubspotSDK\Automation\AutomationPublicPropertyAssociationFilterBranch\FilterBranchType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_public_property_association_filter_branch = array{
 *   filterBranches: list<AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch>,
 *   filterBranchOperator: string,
 *   filterBranchType: value-of<FilterBranchType>,
 *   filters: list<AutomationPublicPropertyFilter|AutomationPublicAssociationInListFilter|AutomationPublicPageViewAnalyticsFilter|AutomationPublicCtaAnalyticsFilter|AutomationPublicEventAnalyticsFilter|AutomationPublicFormSubmissionFilter|AutomationPublicFormSubmissionOnPageFilter|AutomationPublicIntegrationEventFilter|AutomationPublicEmailSubscriptionFilter|AutomationPublicCommunicationSubscriptionFilter|AutomationPublicCampaignInfluencedFilter|AutomationPublicSurveyMonkeyFilter|AutomationPublicSurveyMonkeyValueFilter|AutomationPublicWebinarFilter|AutomationPublicEmailEventFilter|AutomationPublicPrivacyAnalyticsFilter|AutomationPublicAdsSearchFilter|AutomationPublicAdsTimeFilter|AutomationPublicInListFilter|AutomationPublicNumAssociationsFilter|AutomationPublicUnifiedEventsFilter|AutomationPublicPropertyAssociationInListFilter|AutomationPublicConstantFilter>,
 *   objectTypeID: string,
 *   operator: string,
 *   propertyWithObjectID: string,
 * }
 */
final class AutomationPublicPropertyAssociationFilterBranch implements BaseModel
{
    /** @use SdkModel<automation_public_property_association_filter_branch> */
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

    #[Api('objectTypeId')]
    public string $objectTypeID;

    #[Api]
    public string $operator;

    #[Api('propertyWithObjectId')]
    public string $propertyWithObjectID;

    /**
     * `new AutomationPublicPropertyAssociationFilterBranch()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationPublicPropertyAssociationFilterBranch::with(
     *   filterBranches: ...,
     *   filterBranchOperator: ...,
     *   filterBranchType: ...,
     *   filters: ...,
     *   objectTypeID: ...,
     *   operator: ...,
     *   propertyWithObjectID: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationPublicPropertyAssociationFilterBranch)
     *   ->withFilterBranches(...)
     *   ->withFilterBranchOperator(...)
     *   ->withFilterBranchType(...)
     *   ->withFilters(...)
     *   ->withObjectTypeID(...)
     *   ->withOperator(...)
     *   ->withPropertyWithObjectID(...)
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
        string $objectTypeID,
        string $operator,
        string $propertyWithObjectID,
        FilterBranchType|string $filterBranchType = 'PROPERTY_ASSOCIATION',
    ): self {
        $obj = new self;

        $obj->filterBranches = $filterBranches;
        $obj->filterBranchOperator = $filterBranchOperator;
        $obj->filterBranchType = $filterBranchType instanceof FilterBranchType ? $filterBranchType->value : $filterBranchType;
        $obj->filters = $filters;
        $obj->objectTypeID = $objectTypeID;
        $obj->operator = $operator;
        $obj->propertyWithObjectID = $propertyWithObjectID;

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
        $obj->filterBranchType = $filterBranchType instanceof FilterBranchType ? $filterBranchType->value : $filterBranchType;

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

    public function withPropertyWithObjectID(string $propertyWithObjectID): self
    {
        $obj = clone $this;
        $obj->propertyWithObjectID = $propertyWithObjectID;

        return $obj;
    }
}

<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicPropertyAssociationFilterBranch\Filter;
use HubspotSDK\PublicPropertyAssociationFilterBranch\FilterBranch;
use HubspotSDK\PublicPropertyAssociationFilterBranch\FilterBranchType;

/**
 * @phpstan-type PublicPropertyAssociationFilterBranchShape = array{
 *   filterBranches: list<mixed>,
 *   filterBranchOperator: string,
 *   filterBranchType: value-of<FilterBranchType>,
 *   filters: list<PublicPropertyFilter|PublicAssociationInListFilter|PublicPageViewAnalyticsFilter|PublicCtaAnalyticsFilter|PublicEventAnalyticsFilter|PublicFormSubmissionFilter|PublicFormSubmissionOnPageFilter|PublicIntegrationEventFilter|PublicEmailSubscriptionFilter|PublicCommunicationSubscriptionFilter|PublicCampaignInfluencedFilter|PublicSurveyMonkeyFilter|PublicSurveyMonkeyValueFilter|PublicWebinarFilter|PublicEmailEventFilter|PublicPrivacyAnalyticsFilter|PublicAdsSearchFilter|PublicAdsTimeFilter|PublicInListFilter|PublicNumAssociationsFilter|PublicUnifiedEventsFilter|PublicPropertyAssociationInListFilter|PublicConstantFilter>,
 *   objectTypeId: string,
 *   operator: string,
 *   propertyWithObjectId: string,
 * }
 */
final class PublicPropertyAssociationFilterBranch implements BaseModel
{
    /** @use SdkModel<PublicPropertyAssociationFilterBranchShape> */
    use SdkModel;

    /** @var list<mixed> $filterBranches */
    #[Api(list: FilterBranch::class)]
    public array $filterBranches;

    #[Api]
    public string $filterBranchOperator;

    /** @var value-of<FilterBranchType> $filterBranchType */
    #[Api(enum: FilterBranchType::class)]
    public string $filterBranchType;

    /**
     * @var list<PublicPropertyFilter|PublicAssociationInListFilter|PublicPageViewAnalyticsFilter|PublicCtaAnalyticsFilter|PublicEventAnalyticsFilter|PublicFormSubmissionFilter|PublicFormSubmissionOnPageFilter|PublicIntegrationEventFilter|PublicEmailSubscriptionFilter|PublicCommunicationSubscriptionFilter|PublicCampaignInfluencedFilter|PublicSurveyMonkeyFilter|PublicSurveyMonkeyValueFilter|PublicWebinarFilter|PublicEmailEventFilter|PublicPrivacyAnalyticsFilter|PublicAdsSearchFilter|PublicAdsTimeFilter|PublicInListFilter|PublicNumAssociationsFilter|PublicUnifiedEventsFilter|PublicPropertyAssociationInListFilter|PublicConstantFilter> $filters
     */
    #[Api(list: Filter::class)]
    public array $filters;

    #[Api]
    public string $objectTypeId;

    #[Api]
    public string $operator;

    #[Api]
    public string $propertyWithObjectId;

    /**
     * `new PublicPropertyAssociationFilterBranch()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicPropertyAssociationFilterBranch::with(
     *   filterBranches: ...,
     *   filterBranchOperator: ...,
     *   filterBranchType: ...,
     *   filters: ...,
     *   objectTypeId: ...,
     *   operator: ...,
     *   propertyWithObjectId: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicPropertyAssociationFilterBranch)
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
     * @param list<mixed> $filterBranches
     * @param list<PublicPropertyFilter|PublicAssociationInListFilter|PublicPageViewAnalyticsFilter|PublicCtaAnalyticsFilter|PublicEventAnalyticsFilter|PublicFormSubmissionFilter|PublicFormSubmissionOnPageFilter|PublicIntegrationEventFilter|PublicEmailSubscriptionFilter|PublicCommunicationSubscriptionFilter|PublicCampaignInfluencedFilter|PublicSurveyMonkeyFilter|PublicSurveyMonkeyValueFilter|PublicWebinarFilter|PublicEmailEventFilter|PublicPrivacyAnalyticsFilter|PublicAdsSearchFilter|PublicAdsTimeFilter|PublicInListFilter|PublicNumAssociationsFilter|PublicUnifiedEventsFilter|PublicPropertyAssociationInListFilter|PublicConstantFilter> $filters
     * @param FilterBranchType|value-of<FilterBranchType> $filterBranchType
     */
    public static function with(
        array $filterBranches,
        string $filterBranchOperator,
        array $filters,
        string $objectTypeId,
        string $operator,
        string $propertyWithObjectId,
        FilterBranchType|string $filterBranchType = 'PROPERTY_ASSOCIATION',
    ): self {
        $obj = new self;

        $obj->filterBranches = $filterBranches;
        $obj->filterBranchOperator = $filterBranchOperator;
        $obj['filterBranchType'] = $filterBranchType;
        $obj->filters = $filters;
        $obj->objectTypeId = $objectTypeId;
        $obj->operator = $operator;
        $obj->propertyWithObjectId = $propertyWithObjectId;

        return $obj;
    }

    /**
     * @param list<mixed> $filterBranches
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
     * @param list<PublicPropertyFilter|PublicAssociationInListFilter|PublicPageViewAnalyticsFilter|PublicCtaAnalyticsFilter|PublicEventAnalyticsFilter|PublicFormSubmissionFilter|PublicFormSubmissionOnPageFilter|PublicIntegrationEventFilter|PublicEmailSubscriptionFilter|PublicCommunicationSubscriptionFilter|PublicCampaignInfluencedFilter|PublicSurveyMonkeyFilter|PublicSurveyMonkeyValueFilter|PublicWebinarFilter|PublicEmailEventFilter|PublicPrivacyAnalyticsFilter|PublicAdsSearchFilter|PublicAdsTimeFilter|PublicInListFilter|PublicNumAssociationsFilter|PublicUnifiedEventsFilter|PublicPropertyAssociationInListFilter|PublicConstantFilter> $filters
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
        $obj->objectTypeId = $objectTypeID;

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
        $obj->propertyWithObjectId = $propertyWithObjectID;

        return $obj;
    }
}

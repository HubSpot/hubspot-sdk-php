<?php

declare(strict_types=1);

namespace HubspotSDK\PublicNotAllFilterBranch;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\PublicAdsSearchFilter;
use HubspotSDK\PublicAdsTimeFilter;
use HubspotSDK\PublicAssociationInListFilter;
use HubspotSDK\PublicCampaignInfluencedFilter;
use HubspotSDK\PublicCommunicationSubscriptionFilter;
use HubspotSDK\PublicConstantFilter;
use HubspotSDK\PublicCtaAnalyticsFilter;
use HubspotSDK\PublicEmailEventFilter;
use HubspotSDK\PublicEmailSubscriptionFilter;
use HubspotSDK\PublicEventAnalyticsFilter;
use HubspotSDK\PublicFormSubmissionFilter;
use HubspotSDK\PublicFormSubmissionOnPageFilter;
use HubspotSDK\PublicInListFilter;
use HubspotSDK\PublicIntegrationEventFilter;
use HubspotSDK\PublicNumAssociationsFilter;
use HubspotSDK\PublicPageViewAnalyticsFilter;
use HubspotSDK\PublicPrivacyAnalyticsFilter;
use HubspotSDK\PublicPropertyAssociationInListFilter;
use HubspotSDK\PublicPropertyFilter;
use HubspotSDK\PublicSurveyMonkeyFilter;
use HubspotSDK\PublicSurveyMonkeyValueFilter;
use HubspotSDK\PublicUnifiedEventsFilter;
use HubspotSDK\PublicWebinarFilter;

/**
 * @phpstan-import-type PublicPropertyFilterShape from \HubspotSDK\PublicPropertyFilter
 * @phpstan-import-type PublicAssociationInListFilterShape from \HubspotSDK\PublicAssociationInListFilter
 * @phpstan-import-type PublicPageViewAnalyticsFilterShape from \HubspotSDK\PublicPageViewAnalyticsFilter
 * @phpstan-import-type PublicCtaAnalyticsFilterShape from \HubspotSDK\PublicCtaAnalyticsFilter
 * @phpstan-import-type PublicEventAnalyticsFilterShape from \HubspotSDK\PublicEventAnalyticsFilter
 * @phpstan-import-type PublicFormSubmissionFilterShape from \HubspotSDK\PublicFormSubmissionFilter
 * @phpstan-import-type PublicFormSubmissionOnPageFilterShape from \HubspotSDK\PublicFormSubmissionOnPageFilter
 * @phpstan-import-type PublicIntegrationEventFilterShape from \HubspotSDK\PublicIntegrationEventFilter
 * @phpstan-import-type PublicEmailSubscriptionFilterShape from \HubspotSDK\PublicEmailSubscriptionFilter
 * @phpstan-import-type PublicCommunicationSubscriptionFilterShape from \HubspotSDK\PublicCommunicationSubscriptionFilter
 * @phpstan-import-type PublicCampaignInfluencedFilterShape from \HubspotSDK\PublicCampaignInfluencedFilter
 * @phpstan-import-type PublicSurveyMonkeyFilterShape from \HubspotSDK\PublicSurveyMonkeyFilter
 * @phpstan-import-type PublicSurveyMonkeyValueFilterShape from \HubspotSDK\PublicSurveyMonkeyValueFilter
 * @phpstan-import-type PublicWebinarFilterShape from \HubspotSDK\PublicWebinarFilter
 * @phpstan-import-type PublicEmailEventFilterShape from \HubspotSDK\PublicEmailEventFilter
 * @phpstan-import-type PublicPrivacyAnalyticsFilterShape from \HubspotSDK\PublicPrivacyAnalyticsFilter
 * @phpstan-import-type PublicAdsSearchFilterShape from \HubspotSDK\PublicAdsSearchFilter
 * @phpstan-import-type PublicAdsTimeFilterShape from \HubspotSDK\PublicAdsTimeFilter
 * @phpstan-import-type PublicInListFilterShape from \HubspotSDK\PublicInListFilter
 * @phpstan-import-type PublicNumAssociationsFilterShape from \HubspotSDK\PublicNumAssociationsFilter
 * @phpstan-import-type PublicUnifiedEventsFilterShape from \HubspotSDK\PublicUnifiedEventsFilter
 * @phpstan-import-type PublicPropertyAssociationInListFilterShape from \HubspotSDK\PublicPropertyAssociationInListFilter
 * @phpstan-import-type PublicConstantFilterShape from \HubspotSDK\PublicConstantFilter
 *
 * @phpstan-type FilterShape = PublicPropertyFilterShape|PublicAssociationInListFilterShape|PublicPageViewAnalyticsFilterShape|PublicCtaAnalyticsFilterShape|PublicEventAnalyticsFilterShape|PublicFormSubmissionFilterShape|PublicFormSubmissionOnPageFilterShape|PublicIntegrationEventFilterShape|PublicEmailSubscriptionFilterShape|PublicCommunicationSubscriptionFilterShape|PublicCampaignInfluencedFilterShape|PublicSurveyMonkeyFilterShape|PublicSurveyMonkeyValueFilterShape|PublicWebinarFilterShape|PublicEmailEventFilterShape|PublicPrivacyAnalyticsFilterShape|PublicAdsSearchFilterShape|PublicAdsTimeFilterShape|PublicInListFilterShape|PublicNumAssociationsFilterShape|PublicUnifiedEventsFilterShape|PublicPropertyAssociationInListFilterShape|PublicConstantFilterShape
 */
final class Filter implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            PublicPropertyFilter::class,
            PublicAssociationInListFilter::class,
            PublicPageViewAnalyticsFilter::class,
            PublicCtaAnalyticsFilter::class,
            PublicEventAnalyticsFilter::class,
            PublicFormSubmissionFilter::class,
            PublicFormSubmissionOnPageFilter::class,
            PublicIntegrationEventFilter::class,
            PublicEmailSubscriptionFilter::class,
            PublicCommunicationSubscriptionFilter::class,
            PublicCampaignInfluencedFilter::class,
            PublicSurveyMonkeyFilter::class,
            PublicSurveyMonkeyValueFilter::class,
            PublicWebinarFilter::class,
            PublicEmailEventFilter::class,
            PublicPrivacyAnalyticsFilter::class,
            PublicAdsSearchFilter::class,
            PublicAdsTimeFilter::class,
            PublicInListFilter::class,
            PublicNumAssociationsFilter::class,
            PublicUnifiedEventsFilter::class,
            PublicPropertyAssociationInListFilter::class,
            PublicConstantFilter::class,
        ];
    }
}

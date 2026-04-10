<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists\PublicNotAllFilterBranch;

use HubSpotSDK\Core\Concerns\SdkUnion;
use HubSpotSDK\Core\Conversion\Contracts\Converter;
use HubSpotSDK\Core\Conversion\Contracts\ConverterSource;
use HubSpotSDK\Crm\Lists\PublicAdsSearchFilter;
use HubSpotSDK\Crm\Lists\PublicAdsTimeFilter;
use HubSpotSDK\Crm\Lists\PublicAssociationInListFilter;
use HubSpotSDK\Crm\Lists\PublicCampaignInfluencedFilter;
use HubSpotSDK\Crm\Lists\PublicCommunicationSubscriptionFilter;
use HubSpotSDK\Crm\Lists\PublicConstantFilter;
use HubSpotSDK\Crm\Lists\PublicCtaAnalyticsFilter;
use HubSpotSDK\Crm\Lists\PublicEmailEventFilter;
use HubSpotSDK\Crm\Lists\PublicEmailSubscriptionFilter;
use HubSpotSDK\Crm\Lists\PublicEventAnalyticsFilter;
use HubSpotSDK\Crm\Lists\PublicFormSubmissionFilter;
use HubSpotSDK\Crm\Lists\PublicFormSubmissionOnPageFilter;
use HubSpotSDK\Crm\Lists\PublicInListFilter;
use HubSpotSDK\Crm\Lists\PublicIntegrationEventFilter;
use HubSpotSDK\Crm\Lists\PublicNumAssociationsFilter;
use HubSpotSDK\Crm\Lists\PublicPageViewAnalyticsFilter;
use HubSpotSDK\Crm\Lists\PublicPrivacyAnalyticsFilter;
use HubSpotSDK\Crm\Lists\PublicPropertyAssociationInListFilter;
use HubSpotSDK\Crm\Lists\PublicPropertyFilter;
use HubSpotSDK\Crm\Lists\PublicSurveyMonkeyFilter;
use HubSpotSDK\Crm\Lists\PublicSurveyMonkeyValueFilter;
use HubSpotSDK\Crm\Lists\PublicUnifiedEventsFilter;
use HubSpotSDK\Crm\Lists\PublicWebinarFilter;

/**
 * @phpstan-import-type PublicPropertyFilterShape from \HubSpotSDK\Crm\Lists\PublicPropertyFilter
 * @phpstan-import-type PublicAssociationInListFilterShape from \HubSpotSDK\Crm\Lists\PublicAssociationInListFilter
 * @phpstan-import-type PublicPageViewAnalyticsFilterShape from \HubSpotSDK\Crm\Lists\PublicPageViewAnalyticsFilter
 * @phpstan-import-type PublicCtaAnalyticsFilterShape from \HubSpotSDK\Crm\Lists\PublicCtaAnalyticsFilter
 * @phpstan-import-type PublicEventAnalyticsFilterShape from \HubSpotSDK\Crm\Lists\PublicEventAnalyticsFilter
 * @phpstan-import-type PublicFormSubmissionFilterShape from \HubSpotSDK\Crm\Lists\PublicFormSubmissionFilter
 * @phpstan-import-type PublicFormSubmissionOnPageFilterShape from \HubSpotSDK\Crm\Lists\PublicFormSubmissionOnPageFilter
 * @phpstan-import-type PublicIntegrationEventFilterShape from \HubSpotSDK\Crm\Lists\PublicIntegrationEventFilter
 * @phpstan-import-type PublicEmailSubscriptionFilterShape from \HubSpotSDK\Crm\Lists\PublicEmailSubscriptionFilter
 * @phpstan-import-type PublicCommunicationSubscriptionFilterShape from \HubSpotSDK\Crm\Lists\PublicCommunicationSubscriptionFilter
 * @phpstan-import-type PublicCampaignInfluencedFilterShape from \HubSpotSDK\Crm\Lists\PublicCampaignInfluencedFilter
 * @phpstan-import-type PublicSurveyMonkeyFilterShape from \HubSpotSDK\Crm\Lists\PublicSurveyMonkeyFilter
 * @phpstan-import-type PublicSurveyMonkeyValueFilterShape from \HubSpotSDK\Crm\Lists\PublicSurveyMonkeyValueFilter
 * @phpstan-import-type PublicWebinarFilterShape from \HubSpotSDK\Crm\Lists\PublicWebinarFilter
 * @phpstan-import-type PublicEmailEventFilterShape from \HubSpotSDK\Crm\Lists\PublicEmailEventFilter
 * @phpstan-import-type PublicPrivacyAnalyticsFilterShape from \HubSpotSDK\Crm\Lists\PublicPrivacyAnalyticsFilter
 * @phpstan-import-type PublicAdsSearchFilterShape from \HubSpotSDK\Crm\Lists\PublicAdsSearchFilter
 * @phpstan-import-type PublicAdsTimeFilterShape from \HubSpotSDK\Crm\Lists\PublicAdsTimeFilter
 * @phpstan-import-type PublicInListFilterShape from \HubSpotSDK\Crm\Lists\PublicInListFilter
 * @phpstan-import-type PublicNumAssociationsFilterShape from \HubSpotSDK\Crm\Lists\PublicNumAssociationsFilter
 * @phpstan-import-type PublicUnifiedEventsFilterShape from \HubSpotSDK\Crm\Lists\PublicUnifiedEventsFilter
 * @phpstan-import-type PublicPropertyAssociationInListFilterShape from \HubSpotSDK\Crm\Lists\PublicPropertyAssociationInListFilter
 * @phpstan-import-type PublicConstantFilterShape from \HubSpotSDK\Crm\Lists\PublicConstantFilter
 *
 * @phpstan-type FilterVariants = PublicPropertyFilter|PublicAssociationInListFilter|PublicPageViewAnalyticsFilter|PublicCtaAnalyticsFilter|PublicEventAnalyticsFilter|PublicFormSubmissionFilter|PublicFormSubmissionOnPageFilter|PublicIntegrationEventFilter|PublicEmailSubscriptionFilter|PublicCommunicationSubscriptionFilter|PublicCampaignInfluencedFilter|PublicSurveyMonkeyFilter|PublicSurveyMonkeyValueFilter|PublicWebinarFilter|PublicEmailEventFilter|PublicPrivacyAnalyticsFilter|PublicAdsSearchFilter|PublicAdsTimeFilter|PublicInListFilter|PublicNumAssociationsFilter|PublicUnifiedEventsFilter|PublicPropertyAssociationInListFilter|PublicConstantFilter
 * @phpstan-type FilterShape = FilterVariants|PublicPropertyFilterShape|PublicAssociationInListFilterShape|PublicPageViewAnalyticsFilterShape|PublicCtaAnalyticsFilterShape|PublicEventAnalyticsFilterShape|PublicFormSubmissionFilterShape|PublicFormSubmissionOnPageFilterShape|PublicIntegrationEventFilterShape|PublicEmailSubscriptionFilterShape|PublicCommunicationSubscriptionFilterShape|PublicCampaignInfluencedFilterShape|PublicSurveyMonkeyFilterShape|PublicSurveyMonkeyValueFilterShape|PublicWebinarFilterShape|PublicEmailEventFilterShape|PublicPrivacyAnalyticsFilterShape|PublicAdsSearchFilterShape|PublicAdsTimeFilterShape|PublicInListFilterShape|PublicNumAssociationsFilterShape|PublicUnifiedEventsFilterShape|PublicPropertyAssociationInListFilterShape|PublicConstantFilterShape
 */
final class Filter implements ConverterSource
{
    use SdkUnion;

    public static function discriminator(): string
    {
        return 'filterType';
    }

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            'PROPERTY' => PublicPropertyFilter::class,
            'ASSOCIATION' => PublicAssociationInListFilter::class,
            'PAGE_VIEW' => PublicPageViewAnalyticsFilter::class,
            'CTA' => PublicCtaAnalyticsFilter::class,
            'EVENT' => PublicEventAnalyticsFilter::class,
            'FORM_SUBMISSION' => PublicFormSubmissionFilter::class,
            'FORM_SUBMISSION_ON_PAGE' => PublicFormSubmissionOnPageFilter::class,
            'INTEGRATION_EVENT' => PublicIntegrationEventFilter::class,
            'EMAIL_SUBSCRIPTION' => PublicEmailSubscriptionFilter::class,
            'COMMUNICATION_SUBSCRIPTION' => PublicCommunicationSubscriptionFilter::class,
            'CAMPAIGN_INFLUENCED' => PublicCampaignInfluencedFilter::class,
            'SURVEY_MONKEY' => PublicSurveyMonkeyFilter::class,
            'SURVEY_MONKEY_VALUE' => PublicSurveyMonkeyValueFilter::class,
            'WEBINAR' => PublicWebinarFilter::class,
            'EMAIL_EVENT' => PublicEmailEventFilter::class,
            'PRIVACY' => PublicPrivacyAnalyticsFilter::class,
            'ADS_SEARCH' => PublicAdsSearchFilter::class,
            'ADS_TIME' => PublicAdsTimeFilter::class,
            'IN_LIST' => PublicInListFilter::class,
            'NUM_ASSOCIATIONS' => PublicNumAssociationsFilter::class,
            'UNIFIED_EVENTS' => PublicUnifiedEventsFilter::class,
            'PROPERTY_ASSOCIATION' => PublicPropertyAssociationInListFilter::class,
            'CONSTANT' => PublicConstantFilter::class,
        ];
    }
}

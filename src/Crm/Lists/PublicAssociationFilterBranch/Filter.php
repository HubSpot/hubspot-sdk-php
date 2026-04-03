<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists\PublicAssociationFilterBranch;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Crm\Lists\PublicAdsSearchFilter;
use HubspotSDK\Crm\Lists\PublicAdsTimeFilter;
use HubspotSDK\Crm\Lists\PublicAssociationInListFilter;
use HubspotSDK\Crm\Lists\PublicCampaignInfluencedFilter;
use HubspotSDK\Crm\Lists\PublicCommunicationSubscriptionFilter;
use HubspotSDK\Crm\Lists\PublicConstantFilter;
use HubspotSDK\Crm\Lists\PublicCtaAnalyticsFilter;
use HubspotSDK\Crm\Lists\PublicEmailEventFilter;
use HubspotSDK\Crm\Lists\PublicEmailSubscriptionFilter;
use HubspotSDK\Crm\Lists\PublicEventAnalyticsFilter;
use HubspotSDK\Crm\Lists\PublicFormSubmissionFilter;
use HubspotSDK\Crm\Lists\PublicFormSubmissionOnPageFilter;
use HubspotSDK\Crm\Lists\PublicInListFilter;
use HubspotSDK\Crm\Lists\PublicIntegrationEventFilter;
use HubspotSDK\Crm\Lists\PublicNumAssociationsFilter;
use HubspotSDK\Crm\Lists\PublicPageViewAnalyticsFilter;
use HubspotSDK\Crm\Lists\PublicPrivacyAnalyticsFilter;
use HubspotSDK\Crm\Lists\PublicPropertyAssociationInListFilter;
use HubspotSDK\Crm\Lists\PublicPropertyFilter;
use HubspotSDK\Crm\Lists\PublicSurveyMonkeyFilter;
use HubspotSDK\Crm\Lists\PublicSurveyMonkeyValueFilter;
use HubspotSDK\Crm\Lists\PublicUnifiedEventsFilter;
use HubspotSDK\Crm\Lists\PublicWebinarFilter;

/**
 * @phpstan-import-type PublicPropertyFilterShape from \HubspotSDK\Crm\Lists\PublicPropertyFilter
 * @phpstan-import-type PublicAssociationInListFilterShape from \HubspotSDK\Crm\Lists\PublicAssociationInListFilter
 * @phpstan-import-type PublicPageViewAnalyticsFilterShape from \HubspotSDK\Crm\Lists\PublicPageViewAnalyticsFilter
 * @phpstan-import-type PublicCtaAnalyticsFilterShape from \HubspotSDK\Crm\Lists\PublicCtaAnalyticsFilter
 * @phpstan-import-type PublicEventAnalyticsFilterShape from \HubspotSDK\Crm\Lists\PublicEventAnalyticsFilter
 * @phpstan-import-type PublicFormSubmissionFilterShape from \HubspotSDK\Crm\Lists\PublicFormSubmissionFilter
 * @phpstan-import-type PublicFormSubmissionOnPageFilterShape from \HubspotSDK\Crm\Lists\PublicFormSubmissionOnPageFilter
 * @phpstan-import-type PublicIntegrationEventFilterShape from \HubspotSDK\Crm\Lists\PublicIntegrationEventFilter
 * @phpstan-import-type PublicEmailSubscriptionFilterShape from \HubspotSDK\Crm\Lists\PublicEmailSubscriptionFilter
 * @phpstan-import-type PublicCommunicationSubscriptionFilterShape from \HubspotSDK\Crm\Lists\PublicCommunicationSubscriptionFilter
 * @phpstan-import-type PublicCampaignInfluencedFilterShape from \HubspotSDK\Crm\Lists\PublicCampaignInfluencedFilter
 * @phpstan-import-type PublicSurveyMonkeyFilterShape from \HubspotSDK\Crm\Lists\PublicSurveyMonkeyFilter
 * @phpstan-import-type PublicSurveyMonkeyValueFilterShape from \HubspotSDK\Crm\Lists\PublicSurveyMonkeyValueFilter
 * @phpstan-import-type PublicWebinarFilterShape from \HubspotSDK\Crm\Lists\PublicWebinarFilter
 * @phpstan-import-type PublicEmailEventFilterShape from \HubspotSDK\Crm\Lists\PublicEmailEventFilter
 * @phpstan-import-type PublicPrivacyAnalyticsFilterShape from \HubspotSDK\Crm\Lists\PublicPrivacyAnalyticsFilter
 * @phpstan-import-type PublicAdsSearchFilterShape from \HubspotSDK\Crm\Lists\PublicAdsSearchFilter
 * @phpstan-import-type PublicAdsTimeFilterShape from \HubspotSDK\Crm\Lists\PublicAdsTimeFilter
 * @phpstan-import-type PublicInListFilterShape from \HubspotSDK\Crm\Lists\PublicInListFilter
 * @phpstan-import-type PublicNumAssociationsFilterShape from \HubspotSDK\Crm\Lists\PublicNumAssociationsFilter
 * @phpstan-import-type PublicUnifiedEventsFilterShape from \HubspotSDK\Crm\Lists\PublicUnifiedEventsFilter
 * @phpstan-import-type PublicPropertyAssociationInListFilterShape from \HubspotSDK\Crm\Lists\PublicPropertyAssociationInListFilter
 * @phpstan-import-type PublicConstantFilterShape from \HubspotSDK\Crm\Lists\PublicConstantFilter
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

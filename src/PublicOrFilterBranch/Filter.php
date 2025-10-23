<?php

declare(strict_types=1);

namespace HubspotSDK\PublicOrFilterBranch;

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

final class Filter implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,
     * string|Converter|ConverterSource,>
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

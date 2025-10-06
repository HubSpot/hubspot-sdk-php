<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\PublicNotAllFilterBranch;

use HubspotSDK\Automation\PublicAdsSearchFilter;
use HubspotSDK\Automation\PublicAdsTimeFilter;
use HubspotSDK\Automation\PublicAssociationInListFilter;
use HubspotSDK\Automation\PublicCampaignInfluencedFilter;
use HubspotSDK\Automation\PublicCommunicationSubscriptionFilter;
use HubspotSDK\Automation\PublicConstantFilter;
use HubspotSDK\Automation\PublicCtaAnalyticsFilter;
use HubspotSDK\Automation\PublicEmailEventFilter;
use HubspotSDK\Automation\PublicEmailSubscriptionFilter;
use HubspotSDK\Automation\PublicEventAnalyticsFilter;
use HubspotSDK\Automation\PublicFormSubmissionFilter;
use HubspotSDK\Automation\PublicFormSubmissionOnPageFilter;
use HubspotSDK\Automation\PublicInListFilter;
use HubspotSDK\Automation\PublicIntegrationEventFilter;
use HubspotSDK\Automation\PublicNumAssociationsFilter;
use HubspotSDK\Automation\PublicPageViewAnalyticsFilter;
use HubspotSDK\Automation\PublicPrivacyAnalyticsFilter;
use HubspotSDK\Automation\PublicPropertyAssociationInListFilter;
use HubspotSDK\Automation\PublicPropertyFilter;
use HubspotSDK\Automation\PublicSurveyMonkeyFilter;
use HubspotSDK\Automation\PublicSurveyMonkeyValueFilter;
use HubspotSDK\Automation\PublicUnifiedEventsFilter;
use HubspotSDK\Automation\PublicWebinarFilter;
use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

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

<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\PublicNotAllFilterBranch;

use HubspotSDK\Automation\Workflows\PublicAdsSearchFilter;
use HubspotSDK\Automation\Workflows\PublicAdsTimeFilter;
use HubspotSDK\Automation\Workflows\PublicAssociationInListFilter;
use HubspotSDK\Automation\Workflows\PublicCampaignInfluencedFilter;
use HubspotSDK\Automation\Workflows\PublicCommunicationSubscriptionFilter;
use HubspotSDK\Automation\Workflows\PublicConstantFilter;
use HubspotSDK\Automation\Workflows\PublicCtaAnalyticsFilter;
use HubspotSDK\Automation\Workflows\PublicEmailEventFilter;
use HubspotSDK\Automation\Workflows\PublicEmailSubscriptionFilter;
use HubspotSDK\Automation\Workflows\PublicEventAnalyticsFilter;
use HubspotSDK\Automation\Workflows\PublicFormSubmissionFilter;
use HubspotSDK\Automation\Workflows\PublicFormSubmissionOnPageFilter;
use HubspotSDK\Automation\Workflows\PublicInListFilter;
use HubspotSDK\Automation\Workflows\PublicIntegrationEventFilter;
use HubspotSDK\Automation\Workflows\PublicNumAssociationsFilter;
use HubspotSDK\Automation\Workflows\PublicPageViewAnalyticsFilter;
use HubspotSDK\Automation\Workflows\PublicPrivacyAnalyticsFilter;
use HubspotSDK\Automation\Workflows\PublicPropertyAssociationInListFilter;
use HubspotSDK\Automation\Workflows\PublicPropertyFilter;
use HubspotSDK\Automation\Workflows\PublicSurveyMonkeyFilter;
use HubspotSDK\Automation\Workflows\PublicSurveyMonkeyValueFilter;
use HubspotSDK\Automation\Workflows\PublicUnifiedEventsFilter;
use HubspotSDK\Automation\Workflows\PublicWebinarFilter;
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

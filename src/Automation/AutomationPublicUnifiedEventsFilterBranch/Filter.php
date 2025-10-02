<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\AutomationPublicUnifiedEventsFilterBranch;

use HubspotSDK\Automation\AutomationPublicAdsSearchFilter;
use HubspotSDK\Automation\AutomationPublicAdsTimeFilter;
use HubspotSDK\Automation\AutomationPublicAssociationInListFilter;
use HubspotSDK\Automation\AutomationPublicCampaignInfluencedFilter;
use HubspotSDK\Automation\AutomationPublicCommunicationSubscriptionFilter;
use HubspotSDK\Automation\AutomationPublicConstantFilter;
use HubspotSDK\Automation\AutomationPublicCtaAnalyticsFilter;
use HubspotSDK\Automation\AutomationPublicEmailEventFilter;
use HubspotSDK\Automation\AutomationPublicEmailSubscriptionFilter;
use HubspotSDK\Automation\AutomationPublicEventAnalyticsFilter;
use HubspotSDK\Automation\AutomationPublicFormSubmissionFilter;
use HubspotSDK\Automation\AutomationPublicFormSubmissionOnPageFilter;
use HubspotSDK\Automation\AutomationPublicInListFilter;
use HubspotSDK\Automation\AutomationPublicIntegrationEventFilter;
use HubspotSDK\Automation\AutomationPublicNumAssociationsFilter;
use HubspotSDK\Automation\AutomationPublicPageViewAnalyticsFilter;
use HubspotSDK\Automation\AutomationPublicPrivacyAnalyticsFilter;
use HubspotSDK\Automation\AutomationPublicPropertyAssociationInListFilter;
use HubspotSDK\Automation\AutomationPublicPropertyFilter;
use HubspotSDK\Automation\AutomationPublicSurveyMonkeyFilter;
use HubspotSDK\Automation\AutomationPublicSurveyMonkeyValueFilter;
use HubspotSDK\Automation\AutomationPublicUnifiedEventsFilter;
use HubspotSDK\Automation\AutomationPublicWebinarFilter;
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
            AutomationPublicPropertyFilter::class,
            AutomationPublicAssociationInListFilter::class,
            AutomationPublicPageViewAnalyticsFilter::class,
            AutomationPublicCtaAnalyticsFilter::class,
            AutomationPublicEventAnalyticsFilter::class,
            AutomationPublicFormSubmissionFilter::class,
            AutomationPublicFormSubmissionOnPageFilter::class,
            AutomationPublicIntegrationEventFilter::class,
            AutomationPublicEmailSubscriptionFilter::class,
            AutomationPublicCommunicationSubscriptionFilter::class,
            AutomationPublicCampaignInfluencedFilter::class,
            AutomationPublicSurveyMonkeyFilter::class,
            AutomationPublicSurveyMonkeyValueFilter::class,
            AutomationPublicWebinarFilter::class,
            AutomationPublicEmailEventFilter::class,
            AutomationPublicPrivacyAnalyticsFilter::class,
            AutomationPublicAdsSearchFilter::class,
            AutomationPublicAdsTimeFilter::class,
            AutomationPublicInListFilter::class,
            AutomationPublicNumAssociationsFilter::class,
            AutomationPublicUnifiedEventsFilter::class,
            AutomationPublicPropertyAssociationInListFilter::class,
            AutomationPublicConstantFilter::class,
        ];
    }
}

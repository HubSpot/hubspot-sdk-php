<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails\PublicRssEmailDetails;

enum BlogLayout: string
{
    case FULL_POST = 'FULL_POST';

    case SUMMARY_NO_FEATURED_IMAGE = 'SUMMARY_NO_FEATURED_IMAGE';

    case SUMMARY_WITH_FEATURED_IMAGE = 'SUMMARY_WITH_FEATURED_IMAGE';
}

<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\SiteSearch\SiteSearchSearchParams;

enum Type: string
{
    case LANDING_PAGE = 'LANDING_PAGE';

    case BLOG_POST = 'BLOG_POST';

    case SITE_PAGE = 'SITE_PAGE';

    case KNOWLEDGE_ARTICLE = 'KNOWLEDGE_ARTICLE';

    case LISTING_PAGE = 'LISTING_PAGE';

    case STRUCTURED_CONTENT = 'STRUCTURED_CONTENT';
}

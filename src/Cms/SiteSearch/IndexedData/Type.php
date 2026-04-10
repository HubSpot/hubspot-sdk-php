<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\SiteSearch\IndexedData;

/**
 * The type of document. Can be `SITE_PAGE`, `LANDING_PAGE`, `BLOG_POST`, `LISTING_PAGE`, or `KNOWLEDGE_ARTICLE`.
 */
enum Type: string
{
    case BLOG_POST = 'BLOG_POST';

    case KNOWLEDGE_ARTICLE = 'KNOWLEDGE_ARTICLE';

    case LANDING_PAGE = 'LANDING_PAGE';

    case LISTING_PAGE = 'LISTING_PAGE';

    case SITE_PAGE = 'SITE_PAGE';

    case STRUCTURED_CONTENT = 'STRUCTURED_CONTENT';
}

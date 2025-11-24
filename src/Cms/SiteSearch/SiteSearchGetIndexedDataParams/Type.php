<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\SiteSearch\SiteSearchGetIndexedDataParams;

/**
 * The type of document. Can be one of `SITE_PAGE`, `BLOG_POST`, or `KNOWLEDGE_ARTICLE`.
 */
enum Type: string
{
    case BLOG_POST = 'BLOG_POST';

    case KNOWLEDGE_ARTICLE = 'KNOWLEDGE_ARTICLE';

    case LANDING_PAGE = 'LANDING_PAGE';

    case LISTING_PAGE = 'LISTING_PAGE';

    case SITE_PAGE = 'SITE_PAGE';
}

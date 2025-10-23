<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\SiteSearch\SiteSearchGetIndexedDataParams;

/**
 * The type of document. Can be one of `SITE_PAGE`, `BLOG_POST`, or `KNOWLEDGE_ARTICLE`.
 */
enum Type: string
{
    case LANDING_PAGE = 'LANDING_PAGE';

    case BLOG_POST = 'BLOG_POST';

    case SITE_PAGE = 'SITE_PAGE';

    case KNOWLEDGE_ARTICLE = 'KNOWLEDGE_ARTICLE';

    case LISTING_PAGE = 'LISTING_PAGE';
}

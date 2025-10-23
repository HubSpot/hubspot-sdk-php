<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\AuditLogs\PublicAuditLog;

/**
 * The type of the object (BLOG, LANDING_PAGE, DOMAIN, HUBDB_TABLE etc.).
 */
enum ObjectType: string
{
    case BLOG = 'BLOG';

    case BLOG_POST = 'BLOG_POST';

    case LANDING_PAGE = 'LANDING_PAGE';

    case WEBSITE_PAGE = 'WEBSITE_PAGE';

    case TEMPLATE = 'TEMPLATE';

    case MODULE = 'MODULE';

    case GLOBAL_MODULE = 'GLOBAL_MODULE';

    case SERVERLESS_FUNCTION = 'SERVERLESS_FUNCTION';

    case DOMAIN = 'DOMAIN';

    case URL_MAPPING = 'URL_MAPPING';

    case EMAIL = 'EMAIL';

    case CONTENT_SETTINGS = 'CONTENT_SETTINGS';

    case HUBDB_TABLE = 'HUBDB_TABLE';

    case KNOWLEDGE_BASE_ARTICLE = 'KNOWLEDGE_BASE_ARTICLE';

    case KNOWLEDGE_BASE = 'KNOWLEDGE_BASE';

    case THEME = 'THEME';

    case CSS = 'CSS';

    case JS = 'JS';

    case CTA = 'CTA';

    case FILE = 'FILE';
}

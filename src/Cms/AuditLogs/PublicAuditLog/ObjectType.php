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

    case CONTENT_SETTINGS = 'CONTENT_SETTINGS';

    case CSS = 'CSS';

    case CTA = 'CTA';

    case DOMAIN = 'DOMAIN';

    case EMAIL = 'EMAIL';

    case FILE = 'FILE';

    case GLOBAL_MODULE = 'GLOBAL_MODULE';

    case HUBDB_TABLE = 'HUBDB_TABLE';

    case JS = 'JS';

    case KNOWLEDGE_BASE = 'KNOWLEDGE_BASE';

    case KNOWLEDGE_BASE_ARTICLE = 'KNOWLEDGE_BASE_ARTICLE';

    case LANDING_PAGE = 'LANDING_PAGE';

    case MODULE = 'MODULE';

    case SERVERLESS_FUNCTION = 'SERVERLESS_FUNCTION';

    case TEMPLATE = 'TEMPLATE';

    case THEME = 'THEME';

    case URL_MAPPING = 'URL_MAPPING';

    case WEBSITE_PAGE = 'WEBSITE_PAGE';
}

<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\AuditLogs\PublicAuditLog;

/**
 * The type of event that took place (CREATED, UPDATED, PUBLISHED, DELETED, UNPUBLISHED).
 */
enum Event: string
{
    case CREATED = 'CREATED';

    case UPDATED = 'UPDATED';

    case PUBLISHED = 'PUBLISHED';

    case DELETED = 'DELETED';

    case UNPUBLISHED = 'UNPUBLISHED';

    case RESTORE = 'RESTORE';
}

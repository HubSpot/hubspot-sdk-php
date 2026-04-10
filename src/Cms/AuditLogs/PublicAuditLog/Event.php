<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\AuditLogs\PublicAuditLog;

/**
 * The type of event that took place (CREATED, UPDATED, PUBLISHED, DELETED, UNPUBLISHED).
 */
enum Event: string
{
    case CREATED = 'CREATED';

    case DELETED = 'DELETED';

    case PUBLISHED = 'PUBLISHED';

    case RESTORE = 'RESTORE';

    case UNPUBLISHED = 'UNPUBLISHED';

    case UPDATED = 'UPDATED';
}

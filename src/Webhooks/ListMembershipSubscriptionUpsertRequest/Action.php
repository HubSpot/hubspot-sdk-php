<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks\ListMembershipSubscriptionUpsertRequest;

enum Action: string
{
    case CREATE = 'CREATE';

    case UPDATE = 'UPDATE';

    case DELETE = 'DELETE';

    case MERGE = 'MERGE';

    case RESTORE = 'RESTORE';

    case ASSOCIATION_ADDED = 'ASSOCIATION_ADDED';

    case ASSOCIATION_REMOVED = 'ASSOCIATION_REMOVED';

    case SNAPSHOT = 'SNAPSHOT';

    case APP_INSTALL = 'APP_INSTALL';

    case APP_UNINSTALL = 'APP_UNINSTALL';

    case ADDED_TO_LIST = 'ADDED_TO_LIST';

    case REMOVED_FROM_LIST = 'REMOVED_FROM_LIST';

    case GDPR_DELETE = 'GDPR_DELETE';
}

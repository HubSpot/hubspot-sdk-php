<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Imports\ImportTemplate;

/**
 * The classification of what type of template this represents, and what is its origin or purpose.
 */
enum TemplateType: string
{
    case ADMIN_DEFINED = 'admin_defined';

    case PREVIOUS_IMPORT = 'previous_import';

    case USER_FILE = 'user_file';
}

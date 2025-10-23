<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Imports\ImportTemplate;

enum TemplateType: string
{
    case ADMIN_DEFINED = 'admin_defined';

    case PREVIOUS_IMPORT = 'previous_import';

    case USER_FILE = 'user_file';
}

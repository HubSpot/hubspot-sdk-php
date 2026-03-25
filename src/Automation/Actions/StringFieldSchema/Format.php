<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\StringFieldSchema;

enum Format: string
{
    case DATE = 'DATE';

    case DATE_TIME = 'DATE_TIME';

    case OBJECT_COORDINATE = 'OBJECT_COORDINATE';

    case TIME = 'TIME';

    case URI = 'URI';
}

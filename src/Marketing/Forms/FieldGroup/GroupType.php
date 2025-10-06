<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms\FieldGroup;

enum GroupType: string
{
    case DEFAULT_GROUP = 'default_group';

    case PROGRESSIVE = 'progressive';

    case QUEUED = 'queued';
}

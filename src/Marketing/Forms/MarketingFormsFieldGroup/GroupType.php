<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms\MarketingFormsFieldGroup;

enum GroupType: string
{
    case DEFAULT_GROUP = 'default_group';

    case PROGRESSIVE = 'progressive';

    case QUEUED = 'queued';
}

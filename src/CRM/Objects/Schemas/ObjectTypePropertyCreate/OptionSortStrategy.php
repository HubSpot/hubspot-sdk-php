<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\Schemas\ObjectTypePropertyCreate;

enum OptionSortStrategy: string
{
    case DISPLAY_ORDER = 'DISPLAY_ORDER';

    case ALPHABETICAL = 'ALPHABETICAL';
}

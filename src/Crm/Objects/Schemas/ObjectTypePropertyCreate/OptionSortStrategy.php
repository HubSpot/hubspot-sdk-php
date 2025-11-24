<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Schemas\ObjectTypePropertyCreate;

/**
 * Controls how the property options will be sorted in the HubSpot UI.
 */
enum OptionSortStrategy: string
{
    case ALPHABETICAL = 'ALPHABETICAL';

    case DISPLAY_ORDER = 'DISPLAY_ORDER';
}

<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\Schemas\ObjectTypePropertyCreate;

/**
 * Controls how the property options will be sorted in the HubSpot UI.
 */
enum OptionSortStrategy: string
{
    case DISPLAY_ORDER = 'DISPLAY_ORDER';

    case ALPHABETICAL = 'ALPHABETICAL';
}

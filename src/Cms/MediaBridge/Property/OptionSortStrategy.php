<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Property;

/**
 * Specifies how to sort property options. Can be either "DISPLAY_ORDER" to defer to the displayOrder field, or "ALPHABETICAL".
 */
enum OptionSortStrategy: string
{
    case DISPLAY_ORDER = 'DISPLAY_ORDER';

    case ALPHABETICAL = 'ALPHABETICAL';
}

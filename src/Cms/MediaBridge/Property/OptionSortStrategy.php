<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge\Property;

/**
 * Specifies how to sort property options. Can be either "DISPLAY_ORDER" to defer to the displayOrder field, or "ALPHABETICAL".
 */
enum OptionSortStrategy: string
{
    case ALPHABETICAL = 'ALPHABETICAL';

    case DISPLAY_ORDER = 'DISPLAY_ORDER';
}

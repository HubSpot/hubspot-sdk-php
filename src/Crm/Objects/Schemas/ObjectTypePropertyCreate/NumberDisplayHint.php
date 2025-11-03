<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Schemas\ObjectTypePropertyCreate;

/**
 * Controls how numeric properties are formatted in the HubSpot UI.
 */
enum NumberDisplayHint: string
{
    case UNFORMATTED = 'unformatted';

    case FORMATTED = 'formatted';

    case CURRENCY = 'currency';

    case PERCENTAGE = 'percentage';

    case DURATION = 'duration';

    case PROBABILITY = 'probability';
}

<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Schemas\ObjectTypePropertyCreate;

/**
 * Controls how numeric properties are formatted in the HubSpot UI.
 */
enum NumberDisplayHint: string
{
    case CURRENCY = 'currency';

    case DURATION = 'duration';

    case FORMATTED = 'formatted';

    case PERCENTAGE = 'percentage';

    case PROBABILITY = 'probability';

    case UNFORMATTED = 'unformatted';
}

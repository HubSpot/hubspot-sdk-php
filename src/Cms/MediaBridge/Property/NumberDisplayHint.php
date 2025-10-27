<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Property;

/**
 * Hint for how a number property is displayed and validated in HubSpot's UI. Can be: "unformatted", "formatted", "currency", "percentage", "duration", or "probability".
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

<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge\Property;

/**
 * Hint for how a number property is displayed and validated in HubSpot's UI. Can be: "unformatted", "formatted", "currency", "percentage", "duration", or "probability".
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

<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge\Property1;

enum NumberDisplayHint: string
{
    case CURRENCY = 'currency';

    case DURATION = 'duration';

    case FORMATTED = 'formatted';

    case PERCENTAGE = 'percentage';

    case PROBABILITY = 'probability';

    case UNFORMATTED = 'unformatted';
}

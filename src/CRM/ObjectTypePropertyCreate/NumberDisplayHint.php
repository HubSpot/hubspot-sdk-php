<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\ObjectTypePropertyCreate;

enum NumberDisplayHint: string
{
    case UNFORMATTED = 'unformatted';

    case FORMATTED = 'formatted';

    case CURRENCY = 'currency';

    case PERCENTAGE = 'percentage';

    case DURATION = 'duration';

    case PROBABILITY = 'probability';
}

<?php

declare(strict_types=1);

namespace HubSpotSDK\Events\Definitions\TimeOffset;

enum OffsetDirection: string
{
    case FUTURE = 'FUTURE';

    case PAST = 'PAST';
}

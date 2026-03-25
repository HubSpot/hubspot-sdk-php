<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Send\TimeOffset;

enum OffsetDirection: string
{
    case FUTURE = 'FUTURE';

    case PAST = 'PAST';
}

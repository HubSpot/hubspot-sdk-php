<?php

declare(strict_types=1);

namespace HubspotSDK\Events\TimeOffset;

enum OffsetDirection: string
{
    case FUTURE = 'FUTURE';

    case PAST = 'PAST';
}

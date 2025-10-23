<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions\TimeOffset;

enum OffsetDirection: string
{
    case PAST = 'PAST';

    case FUTURE = 'FUTURE';
}

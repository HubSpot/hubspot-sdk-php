<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions\RangedTimeOperation;

enum UpperBoundEndpointBehavior: string
{
    case INCLUSIVE = 'INCLUSIVE';

    case EXCLUSIVE = 'EXCLUSIVE';
}

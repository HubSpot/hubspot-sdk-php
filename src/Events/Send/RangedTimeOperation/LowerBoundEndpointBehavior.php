<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Send\RangedTimeOperation;

enum LowerBoundEndpointBehavior: string
{
    case EXCLUSIVE = 'EXCLUSIVE';

    case INCLUSIVE = 'INCLUSIVE';
}

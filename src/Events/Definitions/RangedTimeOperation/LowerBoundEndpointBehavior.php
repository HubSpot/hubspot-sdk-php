<?php

declare(strict_types=1);

namespace HubSpotSDK\Events\Definitions\RangedTimeOperation;

enum LowerBoundEndpointBehavior: string
{
    case EXCLUSIVE = 'EXCLUSIVE';

    case INCLUSIVE = 'INCLUSIVE';
}

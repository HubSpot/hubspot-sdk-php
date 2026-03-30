<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Definitions\RangedTimeOperation;

enum LowerBoundEndpointBehavior: string
{
    case EXCLUSIVE = 'EXCLUSIVE';

    case INCLUSIVE = 'INCLUSIVE';
}

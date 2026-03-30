<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Definitions\RangedTimeOperation;

enum UpperBoundEndpointBehavior: string
{
    case EXCLUSIVE = 'EXCLUSIVE';

    case INCLUSIVE = 'INCLUSIVE';
}

<?php

declare(strict_types=1);

namespace HubspotSDK\Events\RangedTimeOperation;

enum UpperBoundEndpointBehavior: string
{
    case EXCLUSIVE = 'EXCLUSIVE';

    case INCLUSIVE = 'INCLUSIVE';
}

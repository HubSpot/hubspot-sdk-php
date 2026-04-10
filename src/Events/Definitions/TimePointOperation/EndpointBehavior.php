<?php

declare(strict_types=1);

namespace HubSpotSDK\Events\Definitions\TimePointOperation;

enum EndpointBehavior: string
{
    case EXCLUSIVE = 'EXCLUSIVE';

    case INCLUSIVE = 'INCLUSIVE';
}

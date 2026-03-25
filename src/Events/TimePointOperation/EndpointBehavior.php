<?php

declare(strict_types=1);

namespace HubspotSDK\Events\TimePointOperation;

enum EndpointBehavior: string
{
    case EXCLUSIVE = 'EXCLUSIVE';

    case INCLUSIVE = 'INCLUSIVE';
}

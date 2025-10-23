<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions\TimePointOperation;

enum EndpointBehavior: string
{
    case INCLUSIVE = 'INCLUSIVE';

    case EXCLUSIVE = 'EXCLUSIVE';
}

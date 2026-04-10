<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge\DefaultRequirements;

enum Operator: string
{
    case AND = 'AND';

    case OR = 'OR';
}

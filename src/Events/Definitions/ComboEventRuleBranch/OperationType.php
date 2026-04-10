<?php

declare(strict_types=1);

namespace HubSpotSDK\Events\Definitions\ComboEventRuleBranch;

enum OperationType: string
{
    case AND = 'AND';

    case OR = 'OR';
}

<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Definitions\ComboEventRuleBranch;

enum OperationType: string
{
    case AND = 'AND';

    case OR = 'OR';
}

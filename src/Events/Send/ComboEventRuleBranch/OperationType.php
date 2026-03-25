<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Send\ComboEventRuleBranch;

enum OperationType: string
{
    case AND = 'AND';

    case OR = 'OR';
}

<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions\ComboEventRuleBranch;

enum OperationType: string
{
    case AND = 'AND';

    case OR = 'OR';
}

<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Send\ComparativeBoolPropertyOperation;

enum Operator: string
{
    case IS_EQUAL_TO = 'IS_EQUAL_TO';

    case IS_NOT_EQUAL_TO = 'IS_NOT_EQUAL_TO';
}

<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Definitions\RegexPropertyOperation;

enum Operator: string
{
    case DOES_NOT_MATCH_REGEX = 'DOES_NOT_MATCH_REGEX';

    case MATCHES_REGEX = 'MATCHES_REGEX';
}

<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\PublicActionFunction;

enum FunctionType: string
{
    case PRE_ACTION_EXECUTION = 'PRE_ACTION_EXECUTION';

    case PRE_FETCH_OPTIONS = 'PRE_FETCH_OPTIONS';

    case POST_FETCH_OPTIONS = 'POST_FETCH_OPTIONS';

    case POST_ACTION_EXECUTION = 'POST_ACTION_EXECUTION';
}

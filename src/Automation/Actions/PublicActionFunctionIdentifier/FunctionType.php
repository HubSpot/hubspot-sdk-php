<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\PublicActionFunctionIdentifier;

/**
 * The type of function, with accepted values: POST_ACTION_EXECUTION, POST_FETCH_OPTIONS, PRE_ACTION_EXECUTION, PRE_FETCH_OPTIONS.
 */
enum FunctionType: string
{
    case POST_ACTION_EXECUTION = 'POST_ACTION_EXECUTION';

    case POST_FETCH_OPTIONS = 'POST_FETCH_OPTIONS';

    case PRE_ACTION_EXECUTION = 'PRE_ACTION_EXECUTION';

    case PRE_FETCH_OPTIONS = 'PRE_FETCH_OPTIONS';
}

<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\TestRequestContext;

/**
 * Indicates the source of the test request, with the only accepted value being 'TEST'.
 */
enum Source: string
{
    case TEST = 'TEST';
}

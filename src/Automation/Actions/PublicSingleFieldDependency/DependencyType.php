<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Actions\PublicSingleFieldDependency;

/**
 * The type of dependency, with the default value being 'SINGLE_FIELD'.
 */
enum DependencyType: string
{
    case SINGLE_FIELD = 'SINGLE_FIELD';
}

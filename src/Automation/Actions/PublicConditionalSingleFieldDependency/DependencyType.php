<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\PublicConditionalSingleFieldDependency;

/**
 * The type of dependency, with the default value being CONDITIONAL_SINGLE_FIELD.
 */
enum DependencyType: string
{
    case CONDITIONAL_SINGLE_FIELD = 'CONDITIONAL_SINGLE_FIELD';
}

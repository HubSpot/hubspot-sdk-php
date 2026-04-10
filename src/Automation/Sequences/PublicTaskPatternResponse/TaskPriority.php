<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Sequences\PublicTaskPatternResponse;

/**
 * The priority level assigned to the task.
 */
enum TaskPriority: string
{
    case HIGH = 'HIGH';

    case LOW = 'LOW';

    case MEDIUM = 'MEDIUM';

    case NONE = 'NONE';
}

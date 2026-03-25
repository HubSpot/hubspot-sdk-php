<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences\PublicSequenceStepDependencyResponse;

/**
 * The type of dependency between sequence steps with accepted values being TASK_COMPLETION or MANUAL_PAUSE.
 */
enum DependencyType: string
{
    case MANUAL_PAUSE = 'MANUAL_PAUSE';

    case TASK_COMPLETION = 'TASK_COMPLETION';
}

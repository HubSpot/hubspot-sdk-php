<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences\PublicSequenceStepResponse;

/**
 * The type of action to be performed in the sequence step.
 */
enum ActionType: string
{
    case EMAIL = 'EMAIL';

    case FINISH_ENROLLMENT = 'FINISH_ENROLLMENT';

    case TASK = 'TASK';
}

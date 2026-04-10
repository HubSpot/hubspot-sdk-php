<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Sequences\PublicTaskPatternResponse;

/**
 * The type of task, such as an email or call.
 */
enum TaskType: string
{
    case CALL = 'CALL';

    case EMAIL = 'EMAIL';

    case LINKED_IN_CONNECT = 'LINKED_IN_CONNECT';

    case LINKED_IN_MESSAGE = 'LINKED_IN_MESSAGE';

    case MEETING = 'MEETING';

    case TODO = 'TODO';
}

<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists\PublicFormSubmissionFilter;

/**
 * Specifies the operation to be performed (FILLED_OUT, NOT_FILLED_OUT).
 */
enum Operator: string
{
    case FILLED_OUT = 'FILLED_OUT';

    case NOT_FILLED_OUT = 'NOT_FILLED_OUT';
}

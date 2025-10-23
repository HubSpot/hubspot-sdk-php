<?php

declare(strict_types=1);

namespace HubspotSDK\PublicFormSubmissionOnPageFilter;

enum Operator: string
{
    case FILLED_OUT = 'FILLED_OUT';

    case NOT_FILLED_OUT = 'NOT_FILLED_OUT';
}

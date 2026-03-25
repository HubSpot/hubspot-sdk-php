<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings\ExternalLegalConsentOptions;

/**
 * The type of consent required for processing. Accepted values are: IMPLICIT, REQUIRED_CHECKBOX.
 */
enum ProcessingConsentType: string
{
    case IMPLICIT = 'IMPLICIT';

    case REQUIRED_CHECKBOX = 'REQUIRED_CHECKBOX';
}

<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling\Transcripts\TranscriptResponse;

enum TranscriptSource: string
{
    case HUBSPOT_GENERATED = 'HUBSPOT_GENERATED';

    case INTEGRATOR_GENERATED = 'INTEGRATOR_GENERATED';
}

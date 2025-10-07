<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Owners\PublicOwner;

enum Type: string
{
    case PERSON = 'PERSON';

    case QUEUE = 'QUEUE';
}

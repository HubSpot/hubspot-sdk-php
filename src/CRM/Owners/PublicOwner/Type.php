<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Owners\PublicOwner;

/**
 * The type of owner. Accepted values are: PERSON, QUEUE.
 */
enum Type: string
{
    case PERSON = 'PERSON';

    case QUEUE = 'QUEUE';
}

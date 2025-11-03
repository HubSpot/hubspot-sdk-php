<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Owners\PublicOwner;

/**
 * The type of the owner, which can be either PERSON or QUEUE.
 */
enum Type: string
{
    case PERSON = 'PERSON';

    case QUEUE = 'QUEUE';
}

<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Extensions\CardsDev\CardFetchBodyPatch;

/**
 * A deprecated field to determine the type of card returned.
 */
enum CardType: string
{
    case EXTERNAL = 'EXTERNAL';

    case SERVERLESS = 'SERVERLESS';
}

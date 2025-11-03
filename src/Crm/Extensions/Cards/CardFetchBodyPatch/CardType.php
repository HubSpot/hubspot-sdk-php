<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards\CardFetchBodyPatch;

enum CardType: string
{
    case EXTERNAL = 'EXTERNAL';

    case SERVERLESS = 'SERVERLESS';
}

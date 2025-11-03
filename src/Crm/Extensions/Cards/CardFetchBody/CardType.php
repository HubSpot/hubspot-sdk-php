<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards\CardFetchBody;

enum CardType: string
{
    case EXTERNAL = 'EXTERNAL';

    case SERVERLESS = 'SERVERLESS';
}

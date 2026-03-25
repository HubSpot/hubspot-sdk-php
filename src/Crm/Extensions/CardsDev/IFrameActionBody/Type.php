<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\CardsDev\IFrameActionBody;

/**
 * Specifies the type of action, which is 'IFRAME' for iframe actions.
 */
enum Type: string
{
    case IFRAME = 'IFRAME';
}

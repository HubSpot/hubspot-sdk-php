<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\CardsDev\ActionHookActionBody;

/**
 * Specifies the type of action, which is 'ACTION_HOOK' for action hooks.
 */
enum Type: string
{
    case ACTION_HOOK = 'ACTION_HOOK';
}

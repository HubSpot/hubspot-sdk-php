<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings\ExternalLinkDisplayInfo;

/**
 * Option for determining which avatar to display on scheduling page. Accepted values are: PROFILE_IMAGE, COMPANY_LOGO, CUSTOM_AVATAR,.
 */
enum PublicDisplayAvatarOption: string
{
    case COMPANY_LOGO = 'COMPANY_LOGO';

    case CUSTOM_AVATAR = 'CUSTOM_AVATAR';

    case PROFILE_IMAGE = 'PROFILE_IMAGE';
}

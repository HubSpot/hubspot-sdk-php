<?php

declare(strict_types=1);

namespace HubSpotSDK\Conversations\CustomChannels\PublicDeliveryIdentifier;

enum Type: string
{
    case CHANNEL_SPECIFIC_OPAQUE_ID = 'CHANNEL_SPECIFIC_OPAQUE_ID';

    case HS_EMAIL_ADDRESS = 'HS_EMAIL_ADDRESS';

    case HS_PHONE_NUMBER = 'HS_PHONE_NUMBER';

    case HS_SHORT_CODE = 'HS_SHORT_CODE';
}

<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels\ChannelAccounts\ChannelAccountListParams;

enum DeliveryIdentifierType: string
{
    case HS_EMAIL_ADDRESS = 'HS_EMAIL_ADDRESS';

    case HS_PHONE_NUMBER = 'HS_PHONE_NUMBER';

    case HS_SHORT_CODE = 'HS_SHORT_CODE';

    case CHANNEL_SPECIFIC_OPAQUE_ID = 'CHANNEL_SPECIFIC_OPAQUE_ID';
}

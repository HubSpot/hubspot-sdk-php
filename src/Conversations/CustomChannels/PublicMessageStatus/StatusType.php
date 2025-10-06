<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels\PublicMessageStatus;

enum StatusType: string
{
    case SENT = 'SENT';

    case FAILED = 'FAILED';

    case RECEIVED = 'RECEIVED';

    case READ = 'READ';
}

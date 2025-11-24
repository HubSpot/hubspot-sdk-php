<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels\PublicMessageStatus;

enum StatusType: string
{
    case FAILED = 'FAILED';

    case READ = 'READ';

    case RECEIVED = 'RECEIVED';

    case SENT = 'SENT';
}

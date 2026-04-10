<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge\ExtensionData;

enum ExtensionStatusMap: string
{
    case OK = 'OK';

    case ERROR = 'ERROR';

    case TIMEOUT = 'TIMEOUT';
}

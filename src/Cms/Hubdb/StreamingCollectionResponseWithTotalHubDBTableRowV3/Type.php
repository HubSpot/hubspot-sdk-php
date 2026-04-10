<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Hubdb\StreamingCollectionResponseWithTotalHubDBTableRowV3;

/**
 * Indicates the type of response, which is 'STREAMING' by default.
 */
enum Type: string
{
    case STREAMING = 'STREAMING';
}

<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Extensions\Cards\ActionHookActionBody;

enum HTTPMethod: string
{
    case CONNECT = 'CONNECT';

    case DELETE = 'DELETE';

    case GET = 'GET';

    case HEAD = 'HEAD';

    case OPTIONS = 'OPTIONS';

    case PATCH = 'PATCH';

    case POST = 'POST';

    case PUT = 'PUT';

    case TRACE = 'TRACE';
}

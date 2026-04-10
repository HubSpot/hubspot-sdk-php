<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Extensions\CardsDev\ActionHookActionBody;

/**
 * The HTTP method to be used when making the call, which can be set to GET, POST, PUT, DELETE, or PATCH. If using GET or DELETE.
 */
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

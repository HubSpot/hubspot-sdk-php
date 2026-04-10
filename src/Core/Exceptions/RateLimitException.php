<?php

namespace HubSpotSDK\Core\Exceptions;

class RateLimitException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'HubSpotSDK Rate Limit Exception';
}

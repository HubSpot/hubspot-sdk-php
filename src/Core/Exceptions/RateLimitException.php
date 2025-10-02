<?php

namespace HubspotSDK\Core\Exceptions;

class RateLimitException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'HubspotSDK Rate Limit Exception';
}

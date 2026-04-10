<?php

namespace HubSpotSDK\Core\Exceptions;

class AuthenticationException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'HubSpotSDK Authentication Exception';
}

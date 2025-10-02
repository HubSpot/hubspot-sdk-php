<?php

namespace HubspotSDK\Core\Exceptions;

class AuthenticationException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'HubspotSDK Authentication Exception';
}

<?php

namespace HubSpotSDK\Core\Exceptions;

class BadRequestException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'HubSpotSDK Bad Request Exception';
}

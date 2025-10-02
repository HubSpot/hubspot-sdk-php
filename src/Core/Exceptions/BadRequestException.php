<?php

namespace HubspotSDK\Core\Exceptions;

class BadRequestException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'HubspotSDK Bad Request Exception';
}

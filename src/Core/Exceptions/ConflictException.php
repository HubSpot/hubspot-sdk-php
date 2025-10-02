<?php

namespace HubspotSDK\Core\Exceptions;

class ConflictException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'HubspotSDK Conflict Exception';
}

<?php

namespace HubSpotSDK\Core\Exceptions;

class ConflictException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'HubSpotSDK Conflict Exception';
}

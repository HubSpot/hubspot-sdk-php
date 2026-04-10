<?php

namespace HubSpotSDK\Core\Exceptions;

class InternalServerException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'HubSpotSDK Internal Server Exception';
}

<?php

namespace HubSpotSDK\Core\Exceptions;

class UnprocessableEntityException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'HubSpotSDK Unprocessable Entity Exception';
}

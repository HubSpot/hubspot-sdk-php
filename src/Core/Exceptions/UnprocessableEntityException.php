<?php

namespace HubspotSDK\Core\Exceptions;

class UnprocessableEntityException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'HubspotSDK Unprocessable Entity Exception';
}

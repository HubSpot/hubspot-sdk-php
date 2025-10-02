<?php

namespace HubspotSDK\Core\Exceptions;

class InternalServerException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'HubspotSDK Internal Server Exception';
}

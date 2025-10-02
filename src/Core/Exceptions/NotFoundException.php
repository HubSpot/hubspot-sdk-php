<?php

namespace HubspotSDK\Core\Exceptions;

class NotFoundException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'HubspotSDK Not Found Exception';
}

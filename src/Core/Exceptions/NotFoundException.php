<?php

namespace HubSpotSDK\Core\Exceptions;

class NotFoundException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'HubSpotSDK Not Found Exception';
}

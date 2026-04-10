<?php

namespace HubSpotSDK\Core\Exceptions;

class PermissionDeniedException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'HubSpotSDK Permission Denied Exception';
}

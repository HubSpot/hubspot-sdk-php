<?php

namespace HubspotSDK\Core\Exceptions;

class PermissionDeniedException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'HubspotSDK Permission Denied Exception';
}

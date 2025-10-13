<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\APIObjectPropertyValue;

/**
 * This is the type of input value. This can be one of: "FIELD_DATA", "OBJECT_PROPERTY", "STATIC_VALUE", "RELATIVE_DATETIME", "TIMESTAMP", "INCREMENT", "FETCHED_OBJECT_PROPERTY", "APPEND_OBJECT_PROPERTY", "STATIC_APPEND_VALUE", "ENROLLMENT_EVENT_PROPERTY".
 */
enum Type: string
{
    case OBJECT_PROPERTY = 'OBJECT_PROPERTY';
}

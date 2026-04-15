<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks\Condition;

/**
 * A string representing the type of filter. Valid value is 'CRM_OBJECT_PROPERTY'.
 */
enum FilterType: string
{
    case CRM_OBJECT_PROPERTY = 'CRM_OBJECT_PROPERTY';
}

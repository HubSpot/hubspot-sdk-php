<?php

declare(strict_types=1);

namespace HubSpotSDK\Condition;

/**
 * A string indicating the type of filter being applied. Valid value is 'CRM_OBJECT_PROPERTY'.
 */
enum FilterType: string
{
    case CRM_OBJECT_PROPERTY = 'CRM_OBJECT_PROPERTY';
}

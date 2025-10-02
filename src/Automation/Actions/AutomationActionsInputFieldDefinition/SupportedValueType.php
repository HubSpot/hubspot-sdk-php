<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\AutomationActionsInputFieldDefinition;

enum SupportedValueType: string
{
    case STATIC_VALUE = 'STATIC_VALUE';

    case OBJECT_PROPERTY = 'OBJECT_PROPERTY';

    case FIELD_DATA = 'FIELD_DATA';

    case FETCHED_OBJECT_PROPERTY = 'FETCHED_OBJECT_PROPERTY';

    case ENROLLMENT_EVENT_PROPERTY = 'ENROLLMENT_EVENT_PROPERTY';
}

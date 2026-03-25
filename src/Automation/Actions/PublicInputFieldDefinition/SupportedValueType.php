<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\PublicInputFieldDefinition;

enum SupportedValueType: string
{
    case STATIC_VALUE = 'STATIC_VALUE';

    case OBJECT_PROPERTY = 'OBJECT_PROPERTY';
}

<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms\DropdownField;

/**
 * Determines how the field will be displayed and validated.
 */
enum FieldType: string
{
    case DROPDOWN = 'dropdown';
}

<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms\PhoneField;

/**
 * Determines how the field will be displayed and validated.
 */
enum FieldType: string
{
    case PHONE = 'phone';
}

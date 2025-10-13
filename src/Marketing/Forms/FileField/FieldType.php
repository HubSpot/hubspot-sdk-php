<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms\FileField;

/**
 * Determines how the field will be displayed and validated.
 */
enum FieldType: string
{
    case FILE = 'file';
}

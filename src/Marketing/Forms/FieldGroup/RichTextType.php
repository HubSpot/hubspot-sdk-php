<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms\FieldGroup;

/**
 * The type of rich text included. The default value is text.
 */
enum RichTextType: string
{
    case TEXT = 'text';

    case IMAGE = 'image';
}

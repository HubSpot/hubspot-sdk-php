<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\PublicFieldTypeDefinition;

/**
 * The type of object that the field references, with accepted values including OWNER.
 */
enum ReferencedObjectType: string
{
    case OWNER = 'OWNER';
}

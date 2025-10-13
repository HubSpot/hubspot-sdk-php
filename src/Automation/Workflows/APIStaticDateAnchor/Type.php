<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\APIStaticDateAnchor;

/**
 * The type of event anchor this is, can be: "CONTACT_PROPERTY_ANCHOR" or "STATIC_DATE_ANCHOR".
 */
enum Type: string
{
    case STATIC_DATE_ANCHOR = 'STATIC_DATE_ANCHOR';
}

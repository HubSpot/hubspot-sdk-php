<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\APIContactPropertyAnchor;

/**
 * The type of event anchor this is, can be: "CONTACT_PROPERTY_ANCHOR" or "STATIC_DATE_ANCHOR".
 */
enum Type: string
{
    case CONTACT_PROPERTY_ANCHOR = 'CONTACT_PROPERTY_ANCHOR';
}

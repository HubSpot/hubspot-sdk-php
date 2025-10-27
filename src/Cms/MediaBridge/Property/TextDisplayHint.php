<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Property;

/**
 * Hint for how the text is displayed and validated in HubSpot's UI. Can be: "unformatted_single_line", "multi_line", "email", "phone_number", "domain_name", "ip_address", "physical_address", or "postal_code".
 */
enum TextDisplayHint: string
{
    case UNFORMATTED_SINGLE_LINE = 'unformatted_single_line';

    case MULTI_LINE = 'multi_line';

    case EMAIL = 'email';

    case PHONE_NUMBER = 'phone_number';

    case DOMAIN_NAME = 'domain_name';

    case IP_ADDRESS = 'ip_address';

    case PHYSICAL_ADDRESS = 'physical_address';

    case POSTAL_CODE = 'postal_code';
}

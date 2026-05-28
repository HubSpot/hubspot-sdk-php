<?php

declare(strict_types=1);

namespace HubSpotSDK\Property;

/**
 * Hint for how the text is displayed and validated in HubSpot's UI. Can be: "unformatted_single_line", "multi_line", "email", "phone_number", "domain_name", "ip_address", "physical_address", or "postal_code".
 */
enum TextDisplayHint: string
{
    case DOMAIN_NAME = 'domain_name';

    case EMAIL = 'email';

    case IP_ADDRESS = 'ip_address';

    case MULTI_LINE = 'multi_line';

    case PHONE_NUMBER = 'phone_number';

    case PHYSICAL_ADDRESS = 'physical_address';

    case POSTAL_CODE = 'postal_code';

    case UNFORMATTED_SINGLE_LINE = 'unformatted_single_line';
}

<?php

declare(strict_types=1);

namespace HubSpotSDK\PropertyCreate;

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

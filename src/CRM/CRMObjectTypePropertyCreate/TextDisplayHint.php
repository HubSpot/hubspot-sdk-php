<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\CRMObjectTypePropertyCreate;

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

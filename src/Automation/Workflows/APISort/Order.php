<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\APISort;

enum Order: string
{
    case ASC = 'ASC';

    case DESC = 'DESC';
}

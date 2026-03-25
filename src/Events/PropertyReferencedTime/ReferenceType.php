<?php

declare(strict_types=1);

namespace HubspotSDK\Events\PropertyReferencedTime;

enum ReferenceType: string
{
    case ANNIVERSARY = 'ANNIVERSARY';

    case ANNIVERSARY_WITH_ZONE_SAME_LOCAL_CONVERSION = 'ANNIVERSARY_WITH_ZONE_SAME_LOCAL_CONVERSION';

    case UPDATED_AT = 'UPDATED_AT';

    case VALUE = 'VALUE';

    case VALUE_WITH_ZONE_SAME_LOCAL_CONVERSION = 'VALUE_WITH_ZONE_SAME_LOCAL_CONVERSION';
}

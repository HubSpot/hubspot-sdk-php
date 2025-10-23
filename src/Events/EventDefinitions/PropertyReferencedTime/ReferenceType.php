<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions\PropertyReferencedTime;

enum ReferenceType: string
{
    case VALUE = 'VALUE';

    case UPDATED_AT = 'UPDATED_AT';

    case ANNIVERSARY = 'ANNIVERSARY';

    case VALUE_WITH_ZONE_SAME_LOCAL_CONVERSION = 'VALUE_WITH_ZONE_SAME_LOCAL_CONVERSION';

    case ANNIVERSARY_WITH_ZONE_SAME_LOCAL_CONVERSION = 'ANNIVERSARY_WITH_ZONE_SAME_LOCAL_CONVERSION';
}

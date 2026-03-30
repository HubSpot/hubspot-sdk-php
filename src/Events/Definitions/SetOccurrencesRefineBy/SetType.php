<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Definitions\SetOccurrencesRefineBy;

enum SetType: string
{
    case ALL = 'ALL';

    case ALL_INCLUDE_EMPTY = 'ALL_INCLUDE_EMPTY';

    case ANY = 'ANY';

    case ANY_INCLUDE_EMPTY = 'ANY_INCLUDE_EMPTY';

    case NONE = 'NONE';

    case NONE_EXCLUDE_EMPTY = 'NONE_EXCLUDE_EMPTY';
}

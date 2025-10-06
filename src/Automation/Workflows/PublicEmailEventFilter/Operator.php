<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\PublicEmailEventFilter;

enum Operator: string
{
    case LINK_CLICKED = 'LINK_CLICKED';

    case MARKED_SPAM = 'MARKED_SPAM';

    case OPENED = 'OPENED';

    case OPENED_BUT_LINK_NOT_CLICKED = 'OPENED_BUT_LINK_NOT_CLICKED';

    case OPENED_BUT_NOT_REPLIED = 'OPENED_BUT_NOT_REPLIED';

    case REPLIED = 'REPLIED';

    case UNSUBSCRIBED = 'UNSUBSCRIBED';

    case BOUNCED = 'BOUNCED';

    case RECEIVED = 'RECEIVED';

    case RECEIVED_BUT_NOT_OPENED = 'RECEIVED_BUT_NOT_OPENED';

    case SENT = 'SENT';

    case SENT_BUT_LINK_NOT_CLICKED = 'SENT_BUT_LINK_NOT_CLICKED';

    case SENT_BUT_NOT_RECEIVED = 'SENT_BUT_NOT_RECEIVED';
}

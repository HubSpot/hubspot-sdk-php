<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\EventVisibilityChange;

enum EventType: string
{
    case ALL = 'ALL';

    case MEDIA_PLAYS = 'MEDIA_PLAYS';

    case MEDIA_PLAYS_PERCENT = 'MEDIA_PLAYS_PERCENT';

    case ATTENTION_SPAN = 'ATTENTION_SPAN';
}

<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings\ExternalMeetingsLinkSettings;

/**
 * The increment for available start times of meetings, spelt out as a word (e.g. 15 minute increment corresponds to `FIFTEEN`). `MEETING_DURATION` is also a valid value.
 */
enum StartTimeIncrementMinutes: string
{
    case FIFTEEN = 'FIFTEEN';

    case FIVE = 'FIVE';

    case FORTY_FIVE = 'FORTY_FIVE';

    case MEETING_DURATION = 'MEETING_DURATION';

    case NINETY = 'NINETY';

    case ONE_HUNDRED_TWENTY = 'ONE_HUNDRED_TWENTY';

    case SIXTY = 'SIXTY';

    case TEN = 'TEN';

    case THIRTY = 'THIRTY';

    case TWENTY = 'TWENTY';
}

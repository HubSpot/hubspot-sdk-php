<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling\FormattedPhoneNumber;

/**
 * The type of phone number, with accepted values including FIXED_LINE, MOBILE, VOIP, and others.
 */
enum PhoneNumberType: string
{
    case FIXED_LINE = 'FIXED_LINE';

    case FIXED_LINE_OR_MOBILE = 'FIXED_LINE_OR_MOBILE';

    case MOBILE = 'MOBILE';

    case PAGER = 'PAGER';

    case PERSONAL_NUMBER = 'PERSONAL_NUMBER';

    case PREMIUM_RATE = 'PREMIUM_RATE';

    case SHARED_COST = 'SHARED_COST';

    case TOLL_FREE = 'TOLL_FREE';

    case UAN = 'UAN';

    case UNKNOWN = 'UNKNOWN';

    case VOICEMAIL = 'VOICEMAIL';

    case VOIP = 'VOIP';
}

<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails\PublicEmailTestingDetails;

/**
 * Version of the email that should be sent if there are too few recipients to conduct an AB test.
 */
enum AbSampleSizeDefault: string
{
    case AUTOMATED_LOSER_VARIANT = 'automated_loser_variant';

    case AUTOMATED_MASTER = 'automated_master';

    case AUTOMATED_VARIANT = 'automated_variant';

    case LOSER_VARIANT = 'loser_variant';

    case MAB_MASTER = 'mab_master';

    case MAB_VARIANT = 'mab_variant';

    case MASTER = 'master';

    case VARIANT = 'variant';
}

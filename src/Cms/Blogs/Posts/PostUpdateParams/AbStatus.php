<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts\PostUpdateParams;

/**
 * The status of the AB test associated with this blog post, if applicable.
 *
 * Available options: automated_loser_variant, automated_master, automated_variant, loser_variant, mab_master, mab_variant, master, variant
 */
enum AbStatus: string
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

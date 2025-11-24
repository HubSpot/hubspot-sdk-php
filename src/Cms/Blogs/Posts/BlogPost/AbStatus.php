<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts\BlogPost;

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

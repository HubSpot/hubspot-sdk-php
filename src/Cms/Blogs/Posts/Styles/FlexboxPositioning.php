<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts\Styles;

/**
 * Indicates whether flexbox positioning is enabled for the section.
 */
enum FlexboxPositioning: string
{
    case BOTTOM_CENTER = 'BOTTOM_CENTER';

    case BOTTOM_LEFT = 'BOTTOM_LEFT';

    case BOTTOM_RIGHT = 'BOTTOM_RIGHT';

    case MIDDLE_CENTER = 'MIDDLE_CENTER';

    case MIDDLE_LEFT = 'MIDDLE_LEFT';

    case MIDDLE_RIGHT = 'MIDDLE_RIGHT';

    case TOP_CENTER = 'TOP_CENTER';

    case TOP_LEFT = 'TOP_LEFT';

    case TOP_RIGHT = 'TOP_RIGHT';
}

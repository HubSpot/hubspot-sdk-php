<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts\Angle;

/**
 * The unit of measurement for the angle.
 */
enum Units: string
{
    case DEG = 'deg';

    case GRAD = 'grad';

    case RAD = 'rad';

    case TURN = 'turn';
}

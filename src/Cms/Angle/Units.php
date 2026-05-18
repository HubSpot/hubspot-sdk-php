<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Angle;

/**
 * The unit of measurement for the angle.
 */
enum Units: string
{
    case DEGREES = 'DEGREES';

    case GRADIANS = 'GRADIANS';

    case RADIANS = 'RADIANS';

    case TURNS = 'TURNS';
}

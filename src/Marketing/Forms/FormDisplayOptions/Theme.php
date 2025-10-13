<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms\FormDisplayOptions;

/**
 * The theme used for styling the input fields. This will not apply if the form is added to a HubSpot CMS page.
 */
enum Theme: string
{
    case DEFAULT_STYLE = 'default_style';

    case CANVAS = 'canvas';

    case LINEAR = 'linear';

    case ROUND = 'round';

    case SHARP = 'sharp';

    case LEGACY = 'legacy';
}

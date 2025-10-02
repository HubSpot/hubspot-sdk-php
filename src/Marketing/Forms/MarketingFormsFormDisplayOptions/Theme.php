<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms\MarketingFormsFormDisplayOptions;

enum Theme: string
{
    case DEFAULT_STYLE = 'default_style';

    case CANVAS = 'canvas';

    case LINEAR = 'linear';

    case ROUND = 'round';

    case SHARP = 'sharp';

    case LEGACY = 'legacy';
}

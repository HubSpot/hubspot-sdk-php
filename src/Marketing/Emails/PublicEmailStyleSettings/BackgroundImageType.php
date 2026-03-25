<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails\PublicEmailStyleSettings;

enum BackgroundImageType: string
{
    case REPEAT = 'REPEAT';

    case SINGLE = 'SINGLE';

    case STRETCH = 'STRETCH';
}

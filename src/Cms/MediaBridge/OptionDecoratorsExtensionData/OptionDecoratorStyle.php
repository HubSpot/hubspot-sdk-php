<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\OptionDecoratorsExtensionData;

enum OptionDecoratorStyle: string
{
    case LABEL_ONLY = 'LABEL_ONLY';

    case LABEL_WITH_BADGE = 'LABEL_WITH_BADGE';

    case LABEL_WITH_COLOR = 'LABEL_WITH_COLOR';
}

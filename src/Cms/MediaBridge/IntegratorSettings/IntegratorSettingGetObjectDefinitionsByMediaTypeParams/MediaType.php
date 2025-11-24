<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\IntegratorSettings\IntegratorSettingGetObjectDefinitionsByMediaTypeParams;

enum MediaType: string
{
    case AUDIO = 'AUDIO';

    case DOCUMENT = 'DOCUMENT';

    case IMAGE = 'IMAGE';

    case OTHER = 'OTHER';

    case VIDEO = 'VIDEO';
}

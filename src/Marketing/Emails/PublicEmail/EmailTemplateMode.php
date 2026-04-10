<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\Emails\PublicEmail;

enum EmailTemplateMode: string
{
    case DESIGN_MANAGER = 'DESIGN_MANAGER';

    case DRAG_AND_DROP = 'DRAG_AND_DROP';
}

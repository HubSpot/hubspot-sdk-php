<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Send\ExternalBehavioralEventTypeDefinition;

enum TrackingType: string
{
    case APP_EVENT = 'APP_EVENT';

    case AUTOCAPTURE_EVENT = 'AUTOCAPTURE_EVENT';

    case CLICKED_ELEMENT = 'CLICKED_ELEMENT';

    case COMBO_EVENT = 'COMBO_EVENT';

    case CUSTOM_SCRIPT = 'CUSTOM_SCRIPT';

    case IMPORT = 'IMPORT';

    case MANUAL = 'MANUAL';

    case PROPERTY_CHANGE = 'PROPERTY_CHANGE';

    case VISITED_URL = 'VISITED_URL';

    case WEBHOOK = 'WEBHOOK';
}

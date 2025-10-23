<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions\ExternalBehavioralEventTypeDefinition;

enum TrackingType: string
{
    case VISITED_URL = 'VISITED_URL';

    case CLICKED_ELEMENT = 'CLICKED_ELEMENT';

    case CUSTOM_SCRIPT = 'CUSTOM_SCRIPT';

    case MANUAL = 'MANUAL';

    case IMPORT = 'IMPORT';

    case PROPERTY_CHANGE = 'PROPERTY_CHANGE';

    case COMBO_EVENT = 'COMBO_EVENT';

    case WEBHOOK = 'WEBHOOK';
}

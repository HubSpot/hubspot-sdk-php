<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions\ExternalBehavioralEventTypeDefinition;

enum TrackingType: string
{
    case CLICKED_ELEMENT = 'CLICKED_ELEMENT';

    case COMBO_EVENT = 'COMBO_EVENT';

    case CUSTOM_SCRIPT = 'CUSTOM_SCRIPT';

    case IMPORT = 'IMPORT';

    case MANUAL = 'MANUAL';

    case PROPERTY_CHANGE = 'PROPERTY_CHANGE';

    case VISITED_URL = 'VISITED_URL';

    case WEBHOOK = 'WEBHOOK';
}

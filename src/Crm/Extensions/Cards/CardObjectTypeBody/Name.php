<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards\CardObjectTypeBody;

/**
 * A CRM object type where this card should be displayed.
 */
enum Name: string
{
    case CONTACTS = 'contacts';

    case DEALS = 'deals';

    case COMPANIES = 'companies';

    case TICKETS = 'tickets';

    case MARKETING_EVENTS = 'marketing_events';
}

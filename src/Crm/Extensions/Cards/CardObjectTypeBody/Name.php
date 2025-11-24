<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards\CardObjectTypeBody;

/**
 * A CRM object type where this card should be displayed.
 */
enum Name: string
{
    case COMPANIES = 'companies';

    case CONTACTS = 'contacts';

    case DEALS = 'deals';

    case MARKETING_EVENTS = 'marketing_events';

    case TICKETS = 'tickets';
}

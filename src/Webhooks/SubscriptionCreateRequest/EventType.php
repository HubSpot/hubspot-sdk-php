<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks\SubscriptionCreateRequest;

enum EventType: string
{
    case CONTACT_PROPERTY_CHANGE = 'contact.propertyChange';

    case COMPANY_PROPERTY_CHANGE = 'company.propertyChange';

    case DEAL_PROPERTY_CHANGE = 'deal.propertyChange';

    case TICKET_PROPERTY_CHANGE = 'ticket.propertyChange';

    case PRODUCT_PROPERTY_CHANGE = 'product.propertyChange';

    case LINE_ITEM_PROPERTY_CHANGE = 'line_item.propertyChange';

    case CONTACT_CREATION = 'contact.creation';

    case CONTACT_DELETION = 'contact.deletion';

    case CONTACT_PRIVACY_DELETION = 'contact.privacyDeletion';

    case COMPANY_CREATION = 'company.creation';

    case COMPANY_DELETION = 'company.deletion';

    case DEAL_CREATION = 'deal.creation';

    case DEAL_DELETION = 'deal.deletion';

    case TICKET_CREATION = 'ticket.creation';

    case TICKET_DELETION = 'ticket.deletion';

    case PRODUCT_CREATION = 'product.creation';

    case PRODUCT_DELETION = 'product.deletion';

    case LINE_ITEM_CREATION = 'line_item.creation';

    case LINE_ITEM_DELETION = 'line_item.deletion';

    case CONVERSATION_CREATION = 'conversation.creation';

    case CONVERSATION_DELETION = 'conversation.deletion';

    case CONVERSATION_NEW_MESSAGE = 'conversation.newMessage';

    case CONVERSATION_PRIVACY_DELETION = 'conversation.privacyDeletion';

    case CONVERSATION_PROPERTY_CHANGE = 'conversation.propertyChange';

    case CONTACT_MERGE = 'contact.merge';

    case COMPANY_MERGE = 'company.merge';

    case DEAL_MERGE = 'deal.merge';

    case TICKET_MERGE = 'ticket.merge';

    case PRODUCT_MERGE = 'product.merge';

    case LINE_ITEM_MERGE = 'line_item.merge';

    case CONTACT_RESTORE = 'contact.restore';

    case COMPANY_RESTORE = 'company.restore';

    case DEAL_RESTORE = 'deal.restore';

    case TICKET_RESTORE = 'ticket.restore';

    case PRODUCT_RESTORE = 'product.restore';

    case LINE_ITEM_RESTORE = 'line_item.restore';

    case CONTACT_ASSOCIATION_CHANGE = 'contact.associationChange';

    case COMPANY_ASSOCIATION_CHANGE = 'company.associationChange';

    case DEAL_ASSOCIATION_CHANGE = 'deal.associationChange';

    case TICKET_ASSOCIATION_CHANGE = 'ticket.associationChange';

    case LINE_ITEM_ASSOCIATION_CHANGE = 'line_item.associationChange';

    case OBJECT_PROPERTY_CHANGE = 'object.propertyChange';

    case OBJECT_CREATION = 'object.creation';

    case OBJECT_DELETION = 'object.deletion';

    case OBJECT_MERGE = 'object.merge';

    case OBJECT_RESTORE = 'object.restore';

    case OBJECT_ASSOCIATION_CHANGE = 'object.associationChange';
}

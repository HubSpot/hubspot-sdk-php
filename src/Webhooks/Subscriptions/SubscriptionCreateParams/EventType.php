<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks\Subscriptions\SubscriptionCreateParams;

/**
 * Type of event to listen for. Can be one of `create`, `delete`, `deletedForPrivacy`, or `propertyChange`.
 */
enum EventType: string
{
    case COMPANY_ASSOCIATION_CHANGE = 'company.associationChange';

    case COMPANY_CREATION = 'company.creation';

    case COMPANY_DELETION = 'company.deletion';

    case COMPANY_MERGE = 'company.merge';

    case COMPANY_PROPERTY_CHANGE = 'company.propertyChange';

    case COMPANY_RESTORE = 'company.restore';

    case CONTACT_ASSOCIATION_CHANGE = 'contact.associationChange';

    case CONTACT_CREATION = 'contact.creation';

    case CONTACT_DELETION = 'contact.deletion';

    case CONTACT_MERGE = 'contact.merge';

    case CONTACT_PRIVACY_DELETION = 'contact.privacyDeletion';

    case CONTACT_PROPERTY_CHANGE = 'contact.propertyChange';

    case CONTACT_RESTORE = 'contact.restore';

    case CONVERSATION_CREATION = 'conversation.creation';

    case CONVERSATION_DELETION = 'conversation.deletion';

    case CONVERSATION_NEW_MESSAGE = 'conversation.newMessage';

    case CONVERSATION_PRIVACY_DELETION = 'conversation.privacyDeletion';

    case CONVERSATION_PROPERTY_CHANGE = 'conversation.propertyChange';

    case DEAL_ASSOCIATION_CHANGE = 'deal.associationChange';

    case DEAL_CREATION = 'deal.creation';

    case DEAL_DELETION = 'deal.deletion';

    case DEAL_MERGE = 'deal.merge';

    case DEAL_PROPERTY_CHANGE = 'deal.propertyChange';

    case DEAL_RESTORE = 'deal.restore';

    case LINE_ITEM_ASSOCIATION_CHANGE = 'line_item.associationChange';

    case LINE_ITEM_CREATION = 'line_item.creation';

    case LINE_ITEM_DELETION = 'line_item.deletion';

    case LINE_ITEM_MERGE = 'line_item.merge';

    case LINE_ITEM_PROPERTY_CHANGE = 'line_item.propertyChange';

    case LINE_ITEM_RESTORE = 'line_item.restore';

    case OBJECT_ASSOCIATION_CHANGE = 'object.associationChange';

    case OBJECT_CREATION = 'object.creation';

    case OBJECT_DELETION = 'object.deletion';

    case OBJECT_MERGE = 'object.merge';

    case OBJECT_PROPERTY_CHANGE = 'object.propertyChange';

    case OBJECT_RESTORE = 'object.restore';

    case PRODUCT_CREATION = 'product.creation';

    case PRODUCT_DELETION = 'product.deletion';

    case PRODUCT_MERGE = 'product.merge';

    case PRODUCT_PROPERTY_CHANGE = 'product.propertyChange';

    case PRODUCT_RESTORE = 'product.restore';

    case TICKET_ASSOCIATION_CHANGE = 'ticket.associationChange';

    case TICKET_CREATION = 'ticket.creation';

    case TICKET_DELETION = 'ticket.deletion';

    case TICKET_MERGE = 'ticket.merge';

    case TICKET_PROPERTY_CHANGE = 'ticket.propertyChange';

    case TICKET_RESTORE = 'ticket.restore';
}

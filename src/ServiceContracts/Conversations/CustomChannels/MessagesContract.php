<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations\CustomChannels;

use HubspotSDK\Conversations\ConversationsPublicConversationsMessage;
use HubspotSDK\Conversations\CustomChannels\Messages\MessageCreateParams\MessageDirection;
use HubspotSDK\Conversations\CustomChannels\Messages\MessageUpdateParams\StatusType;
use HubspotSDK\Conversations\PublicDeliveryIdentifier;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface MessagesContract
{
    /**
     * @api
     *
     * @param int $channelID The channel the message will be sent over
     * @param list<array<string,mixed>> $attachments
     * @param 'INCOMING'|'OUTGOING'|MessageDirection $messageDirection
     * @param list<array{
     *   deliveryIdentifier: array{
     *     type: string, value: string
     *   }|PublicDeliveryIdentifier,
     *   name?: string,
     * }> $recipients
     * @param list<array{
     *   deliveryIdentifier: array{
     *     type: string, value: string
     *   }|PublicDeliveryIdentifier,
     *   name?: string,
     * }> $senders
     * @param array{
     *   contacts: list<array{
     *     contactPropertiesLeadingToMatch: list<string>, contactVid: int
     *   }>,
     * } $preResolvedContacts
     *
     * @throws APIException
     */
    public function create(
        int $channelID,
        array $attachments,
        string $channelAccountID,
        string|MessageDirection $messageDirection,
        array $recipients,
        array $senders,
        string $text,
        string|\DateTimeInterface $timestamp,
        ?string $inReplyToID = null,
        ?string $integrationIdempotencyID = null,
        ?string $integrationThreadID = null,
        ?array $preResolvedContacts = null,
        ?string $richText = null,
        ?RequestOptions $requestOptions = null,
    ): ConversationsPublicConversationsMessage;

    /**
     * @api
     *
     * @param string $messageID Path param: The id of the message
     * @param int $channelID Path param: The channel the message was sent over
     * @param 'FAILED'|'READ'|'SENT'|StatusType $statusType Body param: Valid status are SENT, FAILED, and READ
     * @param string $errorMessage Body param:
     *
     * @throws APIException
     */
    public function update(
        string $messageID,
        int $channelID,
        string|StatusType $statusType,
        ?string $errorMessage = null,
        ?RequestOptions $requestOptions = null,
    ): ConversationsPublicConversationsMessage;

    /**
     * @api
     *
     * @param string $messageID The id of the message
     * @param int $channelID The channel the message was sent over
     *
     * @throws APIException
     */
    public function get(
        string $messageID,
        int $channelID,
        ?RequestOptions $requestOptions = null
    ): ConversationsPublicConversationsMessage;
}

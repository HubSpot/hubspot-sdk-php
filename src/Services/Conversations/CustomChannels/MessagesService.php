<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations\CustomChannels;

use HubspotSDK\Client;
use HubspotSDK\Conversations\ConversationsPublicConversationsMessage;
use HubspotSDK\Conversations\CustomChannels\Messages\MessageCreateParams\MessageDirection;
use HubspotSDK\Conversations\CustomChannels\Messages\MessageUpdateParams\StatusType;
use HubspotSDK\Conversations\PublicDeliveryIdentifier;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Conversations\CustomChannels\MessagesContract;

final class MessagesService implements MessagesContract
{
    /**
     * @api
     */
    public MessagesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MessagesRawService($client);
    }

    /**
     * @api
     *
     * Publish a message over your custom channel
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
    ): ConversationsPublicConversationsMessage {
        $params = [
            'attachments' => $attachments,
            'channelAccountID' => $channelAccountID,
            'messageDirection' => $messageDirection,
            'recipients' => $recipients,
            'senders' => $senders,
            'text' => $text,
            'timestamp' => $timestamp,
            'inReplyToID' => $inReplyToID,
            'integrationIdempotencyID' => $integrationIdempotencyID,
            'integrationThreadID' => $integrationThreadID,
            'preResolvedContacts' => $preResolvedContacts,
            'richText' => $richText,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($channelID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a message's status to indicate if it was successfully sent, failed to send, or was read. For failed messages, this can also include the error message for the failure.
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
    ): ConversationsPublicConversationsMessage {
        $params = [
            'channelID' => $channelID,
            'statusType' => $statusType,
            'errorMessage' => $errorMessage,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($messageID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the details for a specific message sent over a custom channel
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
    ): ConversationsPublicConversationsMessage {
        $params = ['channelID' => $channelID];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($messageID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}

<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations\CustomChannels;

use HubspotSDK\Client;
use HubspotSDK\Conversations\ConversationsPublicConversationsMessage;
use HubspotSDK\Conversations\CustomChannels\Messages\MessageCreateParams;
use HubspotSDK\Conversations\CustomChannels\Messages\MessageGetParams;
use HubspotSDK\Conversations\CustomChannels\Messages\MessageUpdateParams;
use HubspotSDK\Conversations\PublicDeliveryIdentifier;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Conversations\CustomChannels\MessagesContract;

final class MessagesService implements MessagesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Publish a message over your custom channel
     *
     * @param array{
     *   attachments: list<array<string,mixed>>,
     *   channelAccountId: string,
     *   messageDirection: "INCOMING"|"OUTGOING",
     *   recipients: list<array{
     *     deliveryIdentifier: array<mixed>|PublicDeliveryIdentifier, name?: string
     *   }>,
     *   senders: list<array{
     *     deliveryIdentifier: array<mixed>|PublicDeliveryIdentifier, name?: string
     *   }>,
     *   text: string,
     *   timestamp: string|\DateTimeInterface,
     *   inReplyToId?: string,
     *   integrationIdempotencyId?: string,
     *   integrationThreadId?: string,
     *   preResolvedContacts?: array{
     *     contacts: list<array{
     *       contactPropertiesLeadingToMatch: list<string>, contactVid: int
     *     }>,
     *   },
     *   richText?: string,
     * }|MessageCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        int $channelID,
        array|MessageCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ConversationsPublicConversationsMessage {
        [$parsed, $options] = MessageCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['conversations/v3/custom-channels/%1$s/messages', $channelID],
            body: (object) $parsed,
            options: $options,
            convert: ConversationsPublicConversationsMessage::class,
        );
    }

    /**
     * @api
     *
     * Update a message's status to indicate if it was successfully sent, failed to send, or was read. For failed messages, this can also include the error message for the failure.
     *
     * @param array{
     *   channelId: int, statusType: "SENT"|"FAILED"|"READ", errorMessage?: string
     * }|MessageUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $messageID,
        array|MessageUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ConversationsPublicConversationsMessage {
        [$parsed, $options] = MessageUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $channelID = $parsed['channelId'];
        unset($parsed['channelId']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: [
                'conversations/v3/custom-channels/%1$s/messages/%2$s',
                $channelID,
                $messageID,
            ],
            body: (object) array_diff_key($parsed, ['channelId']),
            options: $options,
            convert: ConversationsPublicConversationsMessage::class,
        );
    }

    /**
     * @api
     *
     * Get the details for a specific message sent over a custom channel
     *
     * @param array{channelId: int}|MessageGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $messageID,
        array|MessageGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): ConversationsPublicConversationsMessage {
        [$parsed, $options] = MessageGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $channelID = $parsed['channelId'];
        unset($parsed['channelId']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'conversations/v3/custom-channels/%1$s/messages/%2$s',
                $channelID,
                $messageID,
            ],
            options: $options,
            convert: ConversationsPublicConversationsMessage::class,
        );
    }
}

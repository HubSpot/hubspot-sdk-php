<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations\CustomChannels;

use HubspotSDK\Client;
use HubspotSDK\Conversations\ConversationsPublicConversationsMessage;
use HubspotSDK\Conversations\CustomChannels\Messages\MessageCreateParams;
use HubspotSDK\Conversations\CustomChannels\Messages\MessageCreateParams\MessageDirection;
use HubspotSDK\Conversations\CustomChannels\Messages\MessageGetParams;
use HubspotSDK\Conversations\CustomChannels\Messages\MessageUpdateParams;
use HubspotSDK\Conversations\CustomChannels\Messages\MessageUpdateParams\StatusType;
use HubspotSDK\Conversations\PublicDeliveryIdentifier;
use HubspotSDK\Core\Contracts\BaseResponse;
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
     *   channelAccountID: string,
     *   messageDirection: 'INCOMING'|'OUTGOING'|MessageDirection,
     *   recipients: list<array{
     *     deliveryIdentifier: array<mixed>|PublicDeliveryIdentifier, name?: string
     *   }>,
     *   senders: list<array{
     *     deliveryIdentifier: array<mixed>|PublicDeliveryIdentifier, name?: string
     *   }>,
     *   text: string,
     *   timestamp: string|\DateTimeInterface,
     *   inReplyToID?: string,
     *   integrationIdempotencyID?: string,
     *   integrationThreadID?: string,
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

        /** @var BaseResponse<ConversationsPublicConversationsMessage> */
        $response = $this->client->request(
            method: 'post',
            path: ['conversations/v3/custom-channels/%1$s/messages', $channelID],
            body: (object) $parsed,
            options: $options,
            convert: ConversationsPublicConversationsMessage::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a message's status to indicate if it was successfully sent, failed to send, or was read. For failed messages, this can also include the error message for the failure.
     *
     * @param array{
     *   channelID: int,
     *   statusType: 'FAILED'|'READ'|'SENT'|StatusType,
     *   errorMessage?: string,
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
        $channelID = $parsed['channelID'];
        unset($parsed['channelID']);

        /** @var BaseResponse<ConversationsPublicConversationsMessage> */
        $response = $this->client->request(
            method: 'patch',
            path: [
                'conversations/v3/custom-channels/%1$s/messages/%2$s',
                $channelID,
                $messageID,
            ],
            body: (object) array_diff_key($parsed, ['channelID']),
            options: $options,
            convert: ConversationsPublicConversationsMessage::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the details for a specific message sent over a custom channel
     *
     * @param array{channelID: int}|MessageGetParams $params
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
        $channelID = $parsed['channelID'];
        unset($parsed['channelID']);

        /** @var BaseResponse<ConversationsPublicConversationsMessage> */
        $response = $this->client->request(
            method: 'get',
            path: [
                'conversations/v3/custom-channels/%1$s/messages/%2$s',
                $channelID,
                $messageID,
            ],
            options: $options,
            convert: ConversationsPublicConversationsMessage::class,
        );

        return $response->parse();
    }
}

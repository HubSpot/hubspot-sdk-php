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
use HubspotSDK\ServiceContracts\Conversations\CustomChannels\MessagesRawContract;

final class MessagesRawService implements MessagesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Publish a message over your custom channel
     *
     * @param int $channelID The channel the message will be sent over
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
     * @return BaseResponse<ConversationsPublicConversationsMessage>
     *
     * @throws APIException
     */
    public function create(
        int $channelID,
        array|MessageCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessageCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $messageID Path param: The id of the message
     * @param array{
     *   channelID: int,
     *   statusType: 'FAILED'|'READ'|'SENT'|StatusType,
     *   errorMessage?: string,
     * }|MessageUpdateParams $params
     *
     * @return BaseResponse<ConversationsPublicConversationsMessage>
     *
     * @throws APIException
     */
    public function update(
        string $messageID,
        array|MessageUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessageUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $channelID = $parsed['channelID'];
        unset($parsed['channelID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
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
    }

    /**
     * @api
     *
     * Get the details for a specific message sent over a custom channel
     *
     * @param string $messageID The id of the message
     * @param array{channelID: int}|MessageGetParams $params
     *
     * @return BaseResponse<ConversationsPublicConversationsMessage>
     *
     * @throws APIException
     */
    public function get(
        string $messageID,
        array|MessageGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessageGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $channelID = $parsed['channelID'];
        unset($parsed['channelID']);

        // @phpstan-ignore-next-line return.type
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

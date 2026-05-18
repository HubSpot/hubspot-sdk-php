<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Conversations\CustomChannels;

use HubSpotSDK\Client;
use HubSpotSDK\Conversations\CustomChannels\ChannelIntegrationParticipant;
use HubSpotSDK\Conversations\CustomChannels\Messages\MessageCreateParams;
use HubSpotSDK\Conversations\CustomChannels\Messages\MessageCreateParams\MessageDirection;
use HubSpotSDK\Conversations\CustomChannels\Messages\MessageGetParams;
use HubSpotSDK\Conversations\CustomChannels\Messages\MessageUpdateParams;
use HubSpotSDK\Conversations\CustomChannels\Messages\MessageUpdateParams\StatusType;
use HubSpotSDK\Conversations\CustomChannels\PreResolvedContacts;
use HubSpotSDK\Conversations\CustomChannels\PublicConversationsMessage;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Conversations\CustomChannels\MessagesRawContract;

/**
 * @phpstan-import-type AttachmentShape from \HubSpotSDK\Conversations\CustomChannels\Messages\MessageCreateParams\Attachment
 * @phpstan-import-type PreResolvedContactsShape from \HubSpotSDK\Conversations\CustomChannels\PreResolvedContacts
 * @phpstan-import-type ChannelIntegrationParticipantShape from \HubSpotSDK\Conversations\CustomChannels\ChannelIntegrationParticipant
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
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
     * @param array{
     *   attachments: list<AttachmentShape>,
     *   channelAccountID: string,
     *   messageDirection: MessageDirection|value-of<MessageDirection>,
     *   recipients: list<ChannelIntegrationParticipant|ChannelIntegrationParticipantShape>,
     *   senders: list<ChannelIntegrationParticipant|ChannelIntegrationParticipantShape>,
     *   text: string,
     *   timestamp: \DateTimeInterface,
     *   associateWithContactID?: int,
     *   inReplyToID?: string,
     *   integrationIdempotencyID?: string,
     *   integrationThreadID?: string,
     *   preResolvedContacts?: PreResolvedContacts|PreResolvedContactsShape,
     *   richText?: string,
     * }|MessageCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicConversationsMessage>
     *
     * @throws APIException
     */
    public function create(
        int $channelID,
        array|MessageCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessageCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['conversations/custom-channels/2026-03/%1$s/messages', $channelID],
            body: (object) $parsed,
            options: $options,
            convert: PublicConversationsMessage::class,
        );
    }

    /**
     * @api
     *
     * Update a message's status to indicate if it was successfully sent, failed to send, or was read. For failed messages, this can also include the error message for the failure.
     *
     * @param string $messageID Path param
     * @param array{
     *   channelID: int,
     *   statusType: StatusType|value-of<StatusType>,
     *   errorMessage?: string,
     * }|MessageUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicConversationsMessage>
     *
     * @throws APIException
     */
    public function update(
        string $messageID,
        array|MessageUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
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
                'conversations/custom-channels/2026-03/%1$s/messages/%2$s',
                $channelID,
                $messageID,
            ],
            body: (object) array_diff_key($parsed, array_flip(['channelID'])),
            options: $options,
            convert: PublicConversationsMessage::class,
        );
    }

    /**
     * @api
     *
     * Get the details for a specific message sent over a custom channel
     *
     * @param array{channelID: int}|MessageGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicConversationsMessage>
     *
     * @throws APIException
     */
    public function get(
        string $messageID,
        array|MessageGetParams $params,
        RequestOptions|array|null $requestOptions = null,
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
                'conversations/custom-channels/2026-03/%1$s/messages/%2$s',
                $channelID,
                $messageID,
            ],
            options: $options,
            convert: PublicConversationsMessage::class,
        );
    }
}

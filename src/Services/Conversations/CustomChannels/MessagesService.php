<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations\CustomChannels;

use HubspotSDK\Client;
use HubspotSDK\Conversations\CustomChannels\ChannelIntegrationParticipant;
use HubspotSDK\Conversations\CustomChannels\ContactAttachment;
use HubspotSDK\Conversations\CustomChannels\FileAttachment;
use HubspotSDK\Conversations\CustomChannels\LocationAttachment;
use HubspotSDK\Conversations\CustomChannels\MessageHeaderAttachment;
use HubspotSDK\Conversations\CustomChannels\Messages\MessageCreateParams;
use HubspotSDK\Conversations\CustomChannels\Messages\MessageCreateParams\MessageDirection;
use HubspotSDK\Conversations\CustomChannels\Messages\MessageGetParams;
use HubspotSDK\Conversations\CustomChannels\Messages\MessageUpdateParams;
use HubspotSDK\Conversations\CustomChannels\Messages\MessageUpdateParams\StatusType;
use HubspotSDK\Conversations\CustomChannels\PreResolvedContacts;
use HubspotSDK\Conversations\CustomChannels\QuickRepliesAttachment;
use HubspotSDK\Conversations\CustomChannels\SocialMetadataIntegrationAttachment;
use HubspotSDK\Conversations\CustomChannels\UnsupportedContentAttachment;
use HubspotSDK\Conversations\PublicConversationsMessage;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Conversations\CustomChannels\MessagesContract;

use const HubspotSDK\Core\OMIT as omit;

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
     * @param list<FileAttachment|LocationAttachment|ContactAttachment|UnsupportedContentAttachment|MessageHeaderAttachment|QuickRepliesAttachment|SocialMetadataIntegrationAttachment> $attachments
     * @param string $channelAccountID
     * @param string $integrationThreadID
     * @param MessageDirection|value-of<MessageDirection> $messageDirection
     * @param list<ChannelIntegrationParticipant> $recipients
     * @param list<ChannelIntegrationParticipant> $senders
     * @param string $text
     * @param \DateTimeInterface $timestamp
     * @param string $inReplyToID
     * @param string $integrationIdempotencyID
     * @param PreResolvedContacts $preResolvedContacts
     * @param string $richText
     *
     * @throws APIException
     */
    public function create(
        string $channelID,
        $attachments,
        $channelAccountID,
        $integrationThreadID,
        $messageDirection,
        $recipients,
        $senders,
        $text,
        $timestamp,
        $inReplyToID = omit,
        $integrationIdempotencyID = omit,
        $preResolvedContacts = omit,
        $richText = omit,
        ?RequestOptions $requestOptions = null,
    ): PublicConversationsMessage {
        $params = [
            'attachments' => $attachments,
            'channelAccountID' => $channelAccountID,
            'integrationThreadID' => $integrationThreadID,
            'messageDirection' => $messageDirection,
            'recipients' => $recipients,
            'senders' => $senders,
            'text' => $text,
            'timestamp' => $timestamp,
            'inReplyToID' => $inReplyToID,
            'integrationIdempotencyID' => $integrationIdempotencyID,
            'preResolvedContacts' => $preResolvedContacts,
            'richText' => $richText,
        ];

        return $this->createRaw($channelID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        string $channelID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicConversationsMessage {
        [$parsed, $options] = MessageCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['conversations/v3/custom-channels/%1$s/messages', $channelID],
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
     * @param string $channelID
     * @param StatusType|value-of<StatusType> $statusType Valid status are SENT, FAILED, and READ
     * @param string $errorMessage
     *
     * @throws APIException
     */
    public function update(
        string $messageID,
        $channelID,
        $statusType,
        $errorMessage = omit,
        ?RequestOptions $requestOptions = null,
    ): PublicConversationsMessage {
        $params = [
            'channelID' => $channelID,
            'statusType' => $statusType,
            'errorMessage' => $errorMessage,
        ];

        return $this->updateRaw($messageID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $messageID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicConversationsMessage {
        [$parsed, $options] = MessageUpdateParams::parseRequest(
            $params,
            $requestOptions
        );
        $channelID = $parsed['channelID'];
        unset($parsed['channelID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: [
                'conversations/v3/custom-channels/%1$s/messages/%2$s',
                $channelID,
                $messageID,
            ],
            body: (object) array_diff_key($parsed, ['channelID']),
            options: $options,
            convert: PublicConversationsMessage::class,
        );
    }

    /**
     * @api
     *
     * Get the details for a specific message sent over a custom channel
     *
     * @param string $channelID
     *
     * @throws APIException
     */
    public function get(
        string $messageID,
        $channelID,
        ?RequestOptions $requestOptions = null
    ): PublicConversationsMessage {
        $params = ['channelID' => $channelID];

        return $this->getRaw($messageID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        string $messageID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicConversationsMessage {
        [$parsed, $options] = MessageGetParams::parseRequest(
            $params,
            $requestOptions
        );
        $channelID = $parsed['channelID'];
        unset($parsed['channelID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'conversations/v3/custom-channels/%1$s/messages/%2$s',
                $channelID,
                $messageID,
            ],
            options: $options,
            convert: PublicConversationsMessage::class,
        );
    }
}

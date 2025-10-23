<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations\CustomChannels;

use HubspotSDK\Conversations\CustomChannels\ChannelIntegrationParticipant;
use HubspotSDK\Conversations\CustomChannels\ContactAttachment;
use HubspotSDK\Conversations\CustomChannels\FileAttachment;
use HubspotSDK\Conversations\CustomChannels\LocationAttachment;
use HubspotSDK\Conversations\CustomChannels\MessageHeaderAttachment;
use HubspotSDK\Conversations\CustomChannels\Messages\MessageCreateParams\MessageDirection;
use HubspotSDK\Conversations\CustomChannels\Messages\MessageUpdateParams\StatusType;
use HubspotSDK\Conversations\CustomChannels\PreResolvedContacts;
use HubspotSDK\Conversations\CustomChannels\PublicConversationsMessage;
use HubspotSDK\Conversations\CustomChannels\QuickRepliesAttachment;
use HubspotSDK\Conversations\CustomChannels\SocialMetadataIntegrationAttachment;
use HubspotSDK\Conversations\CustomChannels\UnsupportedContentAttachment;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface MessagesContract
{
    /**
     * @api
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
    ): PublicConversationsMessage;

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
    ): PublicConversationsMessage;

    /**
     * @api
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
    ): PublicConversationsMessage;

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
    ): PublicConversationsMessage;

    /**
     * @api
     *
     * @param string $channelID
     *
     * @throws APIException
     */
    public function get(
        string $messageID,
        $channelID,
        ?RequestOptions $requestOptions = null
    ): PublicConversationsMessage;

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
    ): PublicConversationsMessage;
}

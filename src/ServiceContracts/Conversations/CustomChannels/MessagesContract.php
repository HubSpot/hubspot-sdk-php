<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations\CustomChannels;

use HubspotSDK\Conversations\CustomChannels\ChannelIntegrationParticipant;
use HubspotSDK\Conversations\CustomChannels\Messages\MessageCreateParams\MessageDirection;
use HubspotSDK\Conversations\CustomChannels\Messages\MessageUpdateParams\StatusType;
use HubspotSDK\Conversations\CustomChannels\PreResolvedContacts;
use HubspotSDK\Conversations\CustomChannels\PublicConversationsMessage;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type AttachmentShape from \HubspotSDK\Conversations\CustomChannels\Messages\MessageCreateParams\Attachment
 * @phpstan-import-type PreResolvedContactsShape from \HubspotSDK\Conversations\CustomChannels\PreResolvedContacts
 * @phpstan-import-type ChannelIntegrationParticipantShape from \HubspotSDK\Conversations\CustomChannels\ChannelIntegrationParticipant
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface MessagesContract
{
    /**
     * @api
     *
     * @param list<AttachmentShape> $attachments
     * @param MessageDirection|value-of<MessageDirection> $messageDirection
     * @param list<ChannelIntegrationParticipant|ChannelIntegrationParticipantShape> $recipients
     * @param list<ChannelIntegrationParticipant|ChannelIntegrationParticipantShape> $senders
     * @param PreResolvedContacts|PreResolvedContactsShape $preResolvedContacts
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        int $channelID,
        array $attachments,
        string $channelAccountID,
        MessageDirection|string $messageDirection,
        array $recipients,
        array $senders,
        string $text,
        \DateTimeInterface $timestamp,
        ?int $associateWithContactID = null,
        ?string $inReplyToID = null,
        ?string $integrationIdempotencyID = null,
        ?string $integrationThreadID = null,
        PreResolvedContacts|array|null $preResolvedContacts = null,
        ?string $richText = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicConversationsMessage;

    /**
     * @api
     *
     * @param string $messageID Path param
     * @param int $channelID Path param
     * @param StatusType|value-of<StatusType> $statusType Body param: Valid status are SENT, FAILED, and READ
     * @param string $errorMessage Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $messageID,
        int $channelID,
        StatusType|string $statusType,
        ?string $errorMessage = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicConversationsMessage;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $messageID,
        int $channelID,
        RequestOptions|array|null $requestOptions = null,
    ): PublicConversationsMessage;
}

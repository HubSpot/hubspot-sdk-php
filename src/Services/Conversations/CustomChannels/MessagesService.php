<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations\CustomChannels;

use HubspotSDK\Client;
use HubspotSDK\Conversations\CustomChannels\ChannelIntegrationParticipant;
use HubspotSDK\Conversations\CustomChannels\Messages\MessageCreateParams\MessageDirection;
use HubspotSDK\Conversations\CustomChannels\Messages\MessageUpdateParams\StatusType;
use HubspotSDK\Conversations\CustomChannels\PreResolvedContacts;
use HubspotSDK\Conversations\CustomChannels\PublicConversationsMessage;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Conversations\CustomChannels\MessagesContract;

/**
 * @phpstan-import-type AttachmentShape from \HubspotSDK\Conversations\CustomChannels\Messages\MessageCreateParams\Attachment
 * @phpstan-import-type PreResolvedContactsShape from \HubspotSDK\Conversations\CustomChannels\PreResolvedContacts
 * @phpstan-import-type ChannelIntegrationParticipantShape from \HubspotSDK\Conversations\CustomChannels\ChannelIntegrationParticipant
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
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
    ): PublicConversationsMessage {
        $params = Util::removeNulls(
            [
                'attachments' => $attachments,
                'channelAccountID' => $channelAccountID,
                'messageDirection' => $messageDirection,
                'recipients' => $recipients,
                'senders' => $senders,
                'text' => $text,
                'timestamp' => $timestamp,
                'associateWithContactID' => $associateWithContactID,
                'inReplyToID' => $inReplyToID,
                'integrationIdempotencyID' => $integrationIdempotencyID,
                'integrationThreadID' => $integrationThreadID,
                'preResolvedContacts' => $preResolvedContacts,
                'richText' => $richText,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($channelID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a message's status to indicate if it was successfully sent, failed to send, or was read. For failed messages, this can also include the error message for the failure.
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
    ): PublicConversationsMessage {
        $params = Util::removeNulls(
            [
                'channelID' => $channelID,
                'statusType' => $statusType,
                'errorMessage' => $errorMessage,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($messageID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the details for a specific message sent over a custom channel
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $messageID,
        int $channelID,
        RequestOptions|array|null $requestOptions = null,
    ): PublicConversationsMessage {
        $params = Util::removeNulls(['channelID' => $channelID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($messageID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}

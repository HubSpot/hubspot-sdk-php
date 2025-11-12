<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations\CustomChannels;

use HubspotSDK\Conversations\ConversationsPublicConversationsMessage;
use HubspotSDK\Conversations\CustomChannels\Messages\MessageCreateParams;
use HubspotSDK\Conversations\CustomChannels\Messages\MessageGetParams;
use HubspotSDK\Conversations\CustomChannels\Messages\MessageUpdateParams;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface MessagesContract
{
    /**
     * @api
     *
     * @param array<mixed>|MessageCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $channelID,
        array|MessageCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ConversationsPublicConversationsMessage;

    /**
     * @api
     *
     * @param array<mixed>|MessageUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $messageID,
        array|MessageUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ConversationsPublicConversationsMessage;

    /**
     * @api
     *
     * @param array<mixed>|MessageGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $messageID,
        array|MessageGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): ConversationsPublicConversationsMessage;
}

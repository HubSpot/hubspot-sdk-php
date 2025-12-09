<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations\CustomChannels;

use HubspotSDK\Conversations\ConversationsPublicConversationsMessage;
use HubspotSDK\Conversations\CustomChannels\Messages\MessageCreateParams;
use HubspotSDK\Conversations\CustomChannels\Messages\MessageGetParams;
use HubspotSDK\Conversations\CustomChannels\Messages\MessageUpdateParams;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface MessagesRawContract
{
    /**
     * @api
     *
     * @param int $channelID The channel the message will be sent over
     * @param array<mixed>|MessageCreateParams $params
     *
     * @return BaseResponse<ConversationsPublicConversationsMessage>
     *
     * @throws APIException
     */
    public function create(
        int $channelID,
        array|MessageCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $messageID Path param: The id of the message
     * @param array<mixed>|MessageUpdateParams $params
     *
     * @return BaseResponse<ConversationsPublicConversationsMessage>
     *
     * @throws APIException
     */
    public function update(
        string $messageID,
        array|MessageUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $messageID The id of the message
     * @param array<mixed>|MessageGetParams $params
     *
     * @return BaseResponse<ConversationsPublicConversationsMessage>
     *
     * @throws APIException
     */
    public function get(
        string $messageID,
        array|MessageGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}

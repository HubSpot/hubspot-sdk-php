<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations\CustomChannels;

use HubspotSDK\Conversations\CustomChannels\Messages\MessageCreateParams;
use HubspotSDK\Conversations\CustomChannels\Messages\MessageGetParams;
use HubspotSDK\Conversations\CustomChannels\Messages\MessageUpdateParams;
use HubspotSDK\Conversations\CustomChannels\PublicConversationsMessage;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface MessagesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|MessageCreateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $messageID Path param
     * @param array<string,mixed>|MessageUpdateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MessageGetParams $params
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
    ): BaseResponse;
}

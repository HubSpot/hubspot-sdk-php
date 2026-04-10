<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Conversations\CustomChannels;

use HubSpotSDK\Conversations\CustomChannels\Messages\MessageCreateParams;
use HubSpotSDK\Conversations\CustomChannels\Messages\MessageGetParams;
use HubSpotSDK\Conversations\CustomChannels\Messages\MessageUpdateParams;
use HubSpotSDK\Conversations\CustomChannels\PublicConversationsMessage;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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

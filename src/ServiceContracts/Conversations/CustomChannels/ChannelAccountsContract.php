<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations\CustomChannels;

use HubspotSDK\Conversations\CollectionResponseWithTotalPublicChannelAccountForwardPaging;
use HubspotSDK\Conversations\ConversationsPublicChannelAccount;
use HubspotSDK\Conversations\PublicDeliveryIdentifier;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface ChannelAccountsContract
{
    /**
     * @api
     *
     * @param bool $authorized
     * @param string $inboxID
     * @param string $name
     * @param PublicDeliveryIdentifier $deliveryIdentifier
     *
     * @throws APIException
     */
    public function create(
        string $channelID,
        $authorized,
        $inboxID,
        $name,
        $deliveryIdentifier = omit,
        ?RequestOptions $requestOptions = null,
    ): ConversationsPublicChannelAccount;

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
    ): ConversationsPublicChannelAccount;

    /**
     * @api
     *
     * @param string $channelID
     * @param bool $authorized
     * @param string $name
     *
     * @throws APIException
     */
    public function update(
        string $channelAccountID,
        $channelID,
        $authorized = omit,
        $name = omit,
        ?RequestOptions $requestOptions = null,
    ): ConversationsPublicChannelAccount;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $channelAccountID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ConversationsPublicChannelAccount;

    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        string $channelID,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalPublicChannelAccountForwardPaging;

    /**
     * @api
     *
     * @param string $channelID
     *
     * @throws APIException
     */
    public function get(
        string $channelAccountID,
        $channelID,
        ?RequestOptions $requestOptions = null,
    ): ConversationsPublicChannelAccount;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        string $channelAccountID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ConversationsPublicChannelAccount;
}

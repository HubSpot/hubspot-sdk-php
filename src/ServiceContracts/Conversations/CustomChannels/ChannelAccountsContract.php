<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations\CustomChannels;

use HubspotSDK\Conversations\PublicChannelAccount;
use HubspotSDK\Conversations\PublicDeliveryIdentifier;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface ChannelAccountsContract
{
    /**
     * @api
     *
     * @param int $channelID the ID of the channel for which the account is being created
     * @param array{
     *   type: string, value: string
     * }|PublicDeliveryIdentifier $deliveryIdentifier
     *
     * @throws APIException
     */
    public function create(
        int $channelID,
        bool $authorized,
        string $inboxID,
        string $name,
        array|PublicDeliveryIdentifier|null $deliveryIdentifier = null,
        ?RequestOptions $requestOptions = null,
    ): PublicChannelAccount;

    /**
     * @api
     *
     * @param int $channelAccountID Path param: The channel account to update
     * @param int $channelID Path param: The channel to update
     * @param bool $authorized Body param:
     * @param string $name Body param:
     *
     * @throws APIException
     */
    public function update(
        int $channelAccountID,
        int $channelID,
        ?bool $authorized = null,
        ?string $name = null,
        ?RequestOptions $requestOptions = null,
    ): PublicChannelAccount;

    /**
     * @api
     *
     * @param list<string> $deliveryIdentifierType
     * @param list<string> $deliveryIdentifierValue
     * @param list<string> $sort
     *
     * @return Page<PublicChannelAccount>
     *
     * @throws APIException
     */
    public function list(
        int $channelID,
        ?string $after = null,
        ?bool $archived = null,
        ?int $defaultPageLength = null,
        ?array $deliveryIdentifierType = null,
        ?array $deliveryIdentifierValue = null,
        ?int $limit = null,
        ?array $sort = null,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param int $channelAccountID path param: The ID of the channel account to retrieve
     * @param int $channelID path param: The ID of the channel associated with the account being retrieved
     * @param bool $archived query param: Filter results to include only archived or non-archived channel accounts
     *
     * @throws APIException
     */
    public function get(
        int $channelAccountID,
        int $channelID,
        bool $archived = false,
        ?RequestOptions $requestOptions = null,
    ): PublicChannelAccount;
}

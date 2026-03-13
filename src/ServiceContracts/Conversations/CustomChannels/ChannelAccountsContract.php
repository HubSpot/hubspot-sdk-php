<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations\CustomChannels;

use HubspotSDK\Conversations\PublicChannelAccount;
use HubspotSDK\Conversations\PublicDeliveryIdentifier;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type PublicDeliveryIdentifierShape from \HubspotSDK\Conversations\PublicDeliveryIdentifier
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface ChannelAccountsContract
{
    /**
     * @api
     *
     * @param int $channelID the ID of the channel for which the account is being created
     * @param PublicDeliveryIdentifier|PublicDeliveryIdentifierShape $deliveryIdentifier
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        int $channelID,
        bool $authorized,
        string $inboxID,
        string $name,
        PublicDeliveryIdentifier|array|null $deliveryIdentifier = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicChannelAccount;

    /**
     * @api
     *
     * @param int $channelAccountID Path param: The channel account to update
     * @param int $channelID Path param: The channel to update
     * @param bool $authorized Body param
     * @param string $name Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        int $channelAccountID,
        int $channelID,
        ?bool $authorized = null,
        ?string $name = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicChannelAccount;

    /**
     * @api
     *
     * @param list<string> $deliveryIdentifierType
     * @param list<string> $deliveryIdentifierValue
     * @param list<string> $sort
     * @param RequestOpts|null $requestOptions
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
        RequestOptions|array|null $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param int $channelAccountID path param: The ID of the channel account to retrieve
     * @param int $channelID path param: The ID of the channel associated with the account being retrieved
     * @param bool $archived query param: Filter results to include only archived or non-archived channel accounts
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        int $channelAccountID,
        int $channelID,
        bool $archived = false,
        RequestOptions|array|null $requestOptions = null,
    ): PublicChannelAccount;
}

<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Conversations\CustomChannels;

use HubSpotSDK\Conversations\CustomChannels\ChannelAccounts\ChannelAccountListParams\DeliveryIdentifierType;
use HubSpotSDK\Conversations\CustomChannels\PublicChannelAccount;
use HubSpotSDK\Conversations\CustomChannels\PublicChannelAccountStagingToken;
use HubSpotSDK\Conversations\CustomChannels\PublicDeliveryIdentifier;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type PublicDeliveryIdentifierShape from \HubSpotSDK\Conversations\CustomChannels\PublicDeliveryIdentifier
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface ChannelAccountsContract
{
    /**
     * @api
     *
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
     * @param int $channelAccountID Path param
     * @param int $channelID Path param
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
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param list<DeliveryIdentifierType|value-of<DeliveryIdentifierType>> $deliveryIdentifierType
     * @param list<string> $deliveryIdentifierValue
     * @param int $limit the maximum number of results to display per page
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
     * @param string $accountToken Path param
     * @param int $channelID Path param
     * @param string $accountName Body param
     * @param PublicDeliveryIdentifier|PublicDeliveryIdentifierShape $deliveryIdentifier Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateStagingToken(
        string $accountToken,
        int $channelID,
        ?string $accountName = null,
        PublicDeliveryIdentifier|array|null $deliveryIdentifier = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicChannelAccountStagingToken;
}

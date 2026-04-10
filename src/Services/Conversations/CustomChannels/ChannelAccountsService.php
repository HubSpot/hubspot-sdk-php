<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Conversations\CustomChannels;

use HubSpotSDK\Client;
use HubSpotSDK\Conversations\CustomChannels\ChannelAccounts\ChannelAccountListParams\DeliveryIdentifierType;
use HubSpotSDK\Conversations\CustomChannels\PublicChannelAccount;
use HubSpotSDK\Conversations\CustomChannels\PublicChannelAccountStagingToken;
use HubSpotSDK\Conversations\CustomChannels\PublicDeliveryIdentifier;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Conversations\CustomChannels\ChannelAccountsContract;

/**
 * @phpstan-import-type PublicDeliveryIdentifierShape from \HubSpotSDK\Conversations\CustomChannels\PublicDeliveryIdentifier
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class ChannelAccountsService implements ChannelAccountsContract
{
    /**
     * @api
     */
    public ChannelAccountsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ChannelAccountsRawService($client);
    }

    /**
     * @api
     *
     * Create a new account for a channel. Multiple accounts can communicate over a single channel using different delivery identifiers.
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
    ): PublicChannelAccount {
        $params = Util::removeNulls(
            [
                'authorized' => $authorized,
                'inboxID' => $inboxID,
                'name' => $name,
                'deliveryIdentifier' => $deliveryIdentifier,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($channelID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This API is used to update the name of the channel account and it's isAuthorized status. Setting to isAuthorized flag to False disables the channel account.
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
    ): PublicChannelAccount {
        $params = Util::removeNulls(
            ['channelID' => $channelID, 'authorized' => $authorized, 'name' => $name]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($channelAccountID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a list of accounts for a custom channel.
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
    ): Page {
        $params = Util::removeNulls(
            [
                'after' => $after,
                'archived' => $archived,
                'defaultPageLength' => $defaultPageLength,
                'deliveryIdentifierType' => $deliveryIdentifierType,
                'deliveryIdentifierValue' => $deliveryIdentifierValue,
                'limit' => $limit,
                'sort' => $sort,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($channelID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a channel account staging token's account name and delivery identifier. This information will be applied to the channel account created from this staging token. This is used for public apps.
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
    ): PublicChannelAccountStagingToken {
        $params = Util::removeNulls(
            [
                'channelID' => $channelID,
                'accountName' => $accountName,
                'deliveryIdentifier' => $deliveryIdentifier,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateStagingToken($accountToken, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}

<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations\CustomChannels;

use HubspotSDK\Client;
use HubspotSDK\Conversations\CustomChannels\ChannelAccounts\ChannelAccountListParams\DeliveryIdentifierType;
use HubspotSDK\Conversations\CustomChannels\PublicChannelAccount;
use HubspotSDK\Conversations\CustomChannels\PublicChannelAccountStagingToken;
use HubspotSDK\Conversations\CustomChannels\PublicDeliveryIdentifier;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Conversations\CustomChannels\ChannelAccountsContract;

/**
 * @phpstan-import-type PublicDeliveryIdentifierShape from \HubspotSDK\Conversations\CustomChannels\PublicDeliveryIdentifier
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
        string $accountName,
        PublicDeliveryIdentifier|array $deliveryIdentifier,
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

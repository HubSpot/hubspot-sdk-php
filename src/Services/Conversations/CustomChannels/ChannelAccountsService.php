<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations\CustomChannels;

use HubspotSDK\Client;
use HubspotSDK\Conversations\PublicChannelAccount;
use HubspotSDK\Conversations\PublicDeliveryIdentifier;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Conversations\CustomChannels\ChannelAccountsContract;

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
    ): PublicChannelAccount {
        $params = [
            'authorized' => $authorized,
            'inboxID' => $inboxID,
            'name' => $name,
            'deliveryIdentifier' => $deliveryIdentifier,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($channelID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This API is used to update the name of the channel account and it's isAuthorized status. Setting to isAuthorized flag to False disables the channel account.
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
    ): PublicChannelAccount {
        $params = [
            'channelID' => $channelID, 'authorized' => $authorized, 'name' => $name,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($channelAccountID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a list of accounts for a custom channel.
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
    ): Page {
        $params = [
            'after' => $after,
            'archived' => $archived,
            'defaultPageLength' => $defaultPageLength,
            'deliveryIdentifierType' => $deliveryIdentifierType,
            'deliveryIdentifierValue' => $deliveryIdentifierValue,
            'limit' => $limit,
            'sort' => $sort,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($channelID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the details for a specific channel account. This contains all the metadata about your channel account, including its channel, associated inbox id, and delivery identifier information.
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
    ): PublicChannelAccount {
        $params = ['channelID' => $channelID, 'archived' => $archived];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($channelAccountID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}

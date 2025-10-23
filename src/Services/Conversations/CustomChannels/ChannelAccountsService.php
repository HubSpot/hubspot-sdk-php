<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations\CustomChannels;

use HubspotSDK\Client;
use HubspotSDK\Conversations\CustomChannels\ChannelAccounts\ChannelAccountCreateParams;
use HubspotSDK\Conversations\CustomChannels\ChannelAccounts\ChannelAccountGetParams;
use HubspotSDK\Conversations\CustomChannels\ChannelAccounts\ChannelAccountUpdateParams;
use HubspotSDK\Conversations\CustomChannels\CollectionResponseWithTotalPublicChannelAccountForwardPaging;
use HubspotSDK\Conversations\CustomChannels\PublicChannelAccount;
use HubspotSDK\Conversations\CustomChannels\PublicDeliveryIdentifier;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Conversations\CustomChannels\ChannelAccountsContract;

use const HubspotSDK\Core\OMIT as omit;

final class ChannelAccountsService implements ChannelAccountsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new account for a channel. Multiple accounts can communicate over a single channel using different delivery identifiers.
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
    ): PublicChannelAccount {
        $params = [
            'authorized' => $authorized,
            'inboxID' => $inboxID,
            'name' => $name,
            'deliveryIdentifier' => $deliveryIdentifier,
        ];

        return $this->createRaw($channelID, $params, $requestOptions);
    }

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
    ): PublicChannelAccount {
        [$parsed, $options] = ChannelAccountCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'conversations/v3/custom-channels/%1$s/channel-accounts', $channelID,
            ],
            body: (object) $parsed,
            options: $options,
            convert: PublicChannelAccount::class,
        );
    }

    /**
     * @api
     *
     * This API is used to update the name of the channel account and it's isAuthorized status. Setting to isAuthorized flag to False disables the channel account.
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
    ): PublicChannelAccount {
        $params = [
            'channelID' => $channelID, 'authorized' => $authorized, 'name' => $name,
        ];

        return $this->updateRaw($channelAccountID, $params, $requestOptions);
    }

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
    ): PublicChannelAccount {
        [$parsed, $options] = ChannelAccountUpdateParams::parseRequest(
            $params,
            $requestOptions
        );
        $channelID = $parsed['channelID'];
        unset($parsed['channelID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: [
                'conversations/v3/custom-channels/%1$s/channel-accounts/%2$s',
                $channelID,
                $channelAccountID,
            ],
            body: (object) array_diff_key($parsed, ['channelID']),
            options: $options,
            convert: PublicChannelAccount::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a list of accounts for a custom channel.
     *
     * @throws APIException
     */
    public function list(
        string $channelID,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalPublicChannelAccountForwardPaging {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'conversations/v3/custom-channels/%1$s/channel-accounts', $channelID,
            ],
            options: $requestOptions,
            convert: CollectionResponseWithTotalPublicChannelAccountForwardPaging::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the details for a specific channel account. This contains all the metadata about your channel account, including its channel, associated inbox id, and delivery identifier information.
     *
     * @param string $channelID
     *
     * @throws APIException
     */
    public function get(
        string $channelAccountID,
        $channelID,
        ?RequestOptions $requestOptions = null
    ): PublicChannelAccount {
        $params = ['channelID' => $channelID];

        return $this->getRaw($channelAccountID, $params, $requestOptions);
    }

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
    ): PublicChannelAccount {
        [$parsed, $options] = ChannelAccountGetParams::parseRequest(
            $params,
            $requestOptions
        );
        $channelID = $parsed['channelID'];
        unset($parsed['channelID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'conversations/v3/custom-channels/%1$s/channel-accounts/%2$s',
                $channelID,
                $channelAccountID,
            ],
            options: $options,
            convert: PublicChannelAccount::class,
        );
    }
}

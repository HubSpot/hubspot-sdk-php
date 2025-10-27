<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Campaigns;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Campaigns\PublicSpendItem;
use HubspotSDK\Marketing\Campaigns\Spend\SpendCreateParams;
use HubspotSDK\Marketing\Campaigns\Spend\SpendDeleteParams;
use HubspotSDK\Marketing\Campaigns\Spend\SpendGetParams;
use HubspotSDK\Marketing\Campaigns\Spend\SpendUpdateParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Campaigns\SpendContract;

use const HubspotSDK\Core\OMIT as omit;

final class SpendService implements SpendContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new campaign spend item
     *
     * @param float $amount
     * @param string $name
     * @param int $order
     * @param string $description
     *
     * @throws APIException
     */
    public function create(
        string $campaignGuid,
        $amount,
        $name,
        $order,
        $description = omit,
        ?RequestOptions $requestOptions = null,
    ): PublicSpendItem {
        $params = [
            'amount' => $amount,
            'name' => $name,
            'order' => $order,
            'description' => $description,
        ];

        return $this->createRaw($campaignGuid, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        string $campaignGuid,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicSpendItem {
        [$parsed, $options] = SpendCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['marketing/v3/campaigns/%1$s/spend', $campaignGuid],
            body: (object) $parsed,
            options: $options,
            convert: PublicSpendItem::class,
        );
    }

    /**
     * @api
     *
     * Update a specific campaign spend item by ID
     *
     * @param string $campaignGuid
     * @param float $amount
     * @param string $name
     * @param int $order
     * @param string $description
     *
     * @throws APIException
     */
    public function update(
        int $spendID,
        $campaignGuid,
        $amount,
        $name,
        $order,
        $description = omit,
        ?RequestOptions $requestOptions = null,
    ): PublicSpendItem {
        $params = [
            'campaignGuid' => $campaignGuid,
            'amount' => $amount,
            'name' => $name,
            'order' => $order,
            'description' => $description,
        ];

        return $this->updateRaw($spendID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        int $spendID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicSpendItem {
        [$parsed, $options] = SpendUpdateParams::parseRequest(
            $params,
            $requestOptions
        );
        $campaignGuid = $parsed['campaignGuid'];
        unset($parsed['campaignGuid']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: ['marketing/v3/campaigns/%1$s/spend/%2$s', $campaignGuid, $spendID],
            body: (object) array_diff_key($parsed, ['campaignGuid']),
            options: $options,
            convert: PublicSpendItem::class,
        );
    }

    /**
     * @api
     *
     * Delete a specific campaign spend item by ID
     *
     * @param string $campaignGuid
     *
     * @throws APIException
     */
    public function delete(
        int $spendID,
        $campaignGuid,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['campaignGuid' => $campaignGuid];

        return $this->deleteRaw($spendID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRaw(
        int $spendID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = SpendDeleteParams::parseRequest(
            $params,
            $requestOptions
        );
        $campaignGuid = $parsed['campaignGuid'];
        unset($parsed['campaignGuid']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['marketing/v3/campaigns/%1$s/spend/%2$s', $campaignGuid, $spendID],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Read a campaign spend item by its spendId
     *
     * @param string $campaignGuid
     *
     * @throws APIException
     */
    public function get(
        int $spendID,
        $campaignGuid,
        ?RequestOptions $requestOptions = null
    ): PublicSpendItem {
        $params = ['campaignGuid' => $campaignGuid];

        return $this->getRaw($spendID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        int $spendID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicSpendItem {
        [$parsed, $options] = SpendGetParams::parseRequest(
            $params,
            $requestOptions
        );
        $campaignGuid = $parsed['campaignGuid'];
        unset($parsed['campaignGuid']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['marketing/v3/campaigns/%1$s/spend/%2$s', $campaignGuid, $spendID],
            options: $options,
            convert: PublicSpendItem::class,
        );
    }
}

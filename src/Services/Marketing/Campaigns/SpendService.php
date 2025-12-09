<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Campaigns;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Campaigns\PublicSpendItem;
use HubspotSDK\Marketing\Campaigns\Spend\SpendCreateParams;
use HubspotSDK\Marketing\Campaigns\Spend\SpendDeleteParams;
use HubspotSDK\Marketing\Campaigns\Spend\SpendGetParams;
use HubspotSDK\Marketing\Campaigns\Spend\SpendUpdateParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Campaigns\SpendContract;

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
     * @param array{
     *   amount: float, name: string, order: int, description?: string
     * }|SpendCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $campaignGuid,
        array|SpendCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicSpendItem {
        [$parsed, $options] = SpendCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<PublicSpendItem> */
        $response = $this->client->request(
            method: 'post',
            path: ['marketing/v3/campaigns/%1$s/spend', $campaignGuid],
            body: (object) $parsed,
            options: $options,
            convert: PublicSpendItem::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a specific campaign spend item by ID
     *
     * @param array{
     *   campaignGuid: string,
     *   amount: float,
     *   name: string,
     *   order: int,
     *   description?: string,
     * }|SpendUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        int $spendID,
        array|SpendUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicSpendItem {
        [$parsed, $options] = SpendUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $campaignGuid = $parsed['campaignGuid'];
        unset($parsed['campaignGuid']);

        /** @var BaseResponse<PublicSpendItem> */
        $response = $this->client->request(
            method: 'put',
            path: ['marketing/v3/campaigns/%1$s/spend/%2$s', $campaignGuid, $spendID],
            body: (object) array_diff_key($parsed, ['campaignGuid']),
            options: $options,
            convert: PublicSpendItem::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a specific campaign spend item by ID
     *
     * @param array{campaignGuid: string}|SpendDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        int $spendID,
        array|SpendDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = SpendDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $campaignGuid = $parsed['campaignGuid'];
        unset($parsed['campaignGuid']);

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: ['marketing/v3/campaigns/%1$s/spend/%2$s', $campaignGuid, $spendID],
            options: $options,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Read a campaign spend item by its spendId
     *
     * @param array{campaignGuid: string}|SpendGetParams $params
     *
     * @throws APIException
     */
    public function get(
        int $spendID,
        array|SpendGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicSpendItem {
        [$parsed, $options] = SpendGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $campaignGuid = $parsed['campaignGuid'];
        unset($parsed['campaignGuid']);

        /** @var BaseResponse<PublicSpendItem> */
        $response = $this->client->request(
            method: 'get',
            path: ['marketing/v3/campaigns/%1$s/spend/%2$s', $campaignGuid, $spendID],
            options: $options,
            convert: PublicSpendItem::class,
        );

        return $response->parse();
    }
}

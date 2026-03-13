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
use HubspotSDK\ServiceContracts\Marketing\Campaigns\SpendRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class SpendRawService implements SpendRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new campaign spend item
     *
     * @param string $campaignGuid unique identifier for the campaign
     * @param array{
     *   amount: float, name: string, order: int, description?: string
     * }|SpendCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicSpendItem>
     *
     * @throws APIException
     */
    public function create(
        string $campaignGuid,
        array|SpendCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SpendCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param int $spendID path param: Unique identifier for the spend item
     * @param array{
     *   campaignGuid: string,
     *   amount: float,
     *   name: string,
     *   order: int,
     *   description?: string,
     * }|SpendUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicSpendItem>
     *
     * @throws APIException
     */
    public function update(
        int $spendID,
        array|SpendUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SpendUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $campaignGuid = $parsed['campaignGuid'];
        unset($parsed['campaignGuid']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['marketing/v3/campaigns/%1$s/spend/%2$s', $campaignGuid, $spendID],
            body: (object) array_diff_key($parsed, array_flip(['campaignGuid'])),
            options: $options,
            convert: PublicSpendItem::class,
        );
    }

    /**
     * @api
     *
     * Delete a specific campaign spend item by ID
     *
     * @param int $spendID unique identifier for the spend item
     * @param array{campaignGuid: string}|SpendDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        int $spendID,
        array|SpendDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SpendDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $campaignGuid = $parsed['campaignGuid'];
        unset($parsed['campaignGuid']);

        // @phpstan-ignore-next-line return.type
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
     * @param int $spendID unique identifier for the spend item
     * @param array{campaignGuid: string}|SpendGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicSpendItem>
     *
     * @throws APIException
     */
    public function get(
        int $spendID,
        array|SpendGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SpendGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $campaignGuid = $parsed['campaignGuid'];
        unset($parsed['campaignGuid']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['marketing/v3/campaigns/%1$s/spend/%2$s', $campaignGuid, $spendID],
            options: $options,
            convert: PublicSpendItem::class,
        );
    }
}

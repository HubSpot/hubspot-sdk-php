<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Campaigns;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Campaigns\Budget\BudgetCreateParams;
use HubspotSDK\Marketing\Campaigns\Budget\BudgetDeleteParams;
use HubspotSDK\Marketing\Campaigns\Budget\BudgetGetParams;
use HubspotSDK\Marketing\Campaigns\Budget\BudgetUpdateParams;
use HubspotSDK\Marketing\Campaigns\PublicBudgetItem;
use HubspotSDK\Marketing\Campaigns\PublicBudgetTotals;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Campaigns\BudgetContract;

final class BudgetService implements BudgetContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Add a new budget item to the campaign
     *
     * @param array{
     *   amount: float, name: string, order: int, description?: string
     * }|BudgetCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $campaignGuid,
        array|BudgetCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicBudgetItem {
        [$parsed, $options] = BudgetCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<PublicBudgetItem> */
        $response = $this->client->request(
            method: 'post',
            path: ['marketing/v3/campaigns/%1$s/budget', $campaignGuid],
            body: (object) $parsed,
            options: $options,
            convert: PublicBudgetItem::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a specific budget item by ID
     *
     * @param array{
     *   campaignGuid: string,
     *   amount: float,
     *   name: string,
     *   order: int,
     *   description?: string,
     * }|BudgetUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        int $budgetID,
        array|BudgetUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicBudgetItem {
        [$parsed, $options] = BudgetUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $campaignGuid = $parsed['campaignGuid'];
        unset($parsed['campaignGuid']);

        /** @var BaseResponse<PublicBudgetItem> */
        $response = $this->client->request(
            method: 'put',
            path: [
                'marketing/v3/campaigns/%1$s/budget/%2$s', $campaignGuid, $budgetID,
            ],
            body: (object) array_diff_key($parsed, ['campaignGuid']),
            options: $options,
            convert: PublicBudgetItem::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a specific budget item by ID
     *
     * @param array{campaignGuid: string}|BudgetDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        int $budgetID,
        array|BudgetDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = BudgetDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $campaignGuid = $parsed['campaignGuid'];
        unset($parsed['campaignGuid']);

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: [
                'marketing/v3/campaigns/%1$s/budget/%2$s', $campaignGuid, $budgetID,
            ],
            options: $options,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a specific budget item by ID
     *
     * @param array{campaignGuid: string}|BudgetGetParams $params
     *
     * @throws APIException
     */
    public function get(
        int $budgetID,
        array|BudgetGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicBudgetItem {
        [$parsed, $options] = BudgetGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $campaignGuid = $parsed['campaignGuid'];
        unset($parsed['campaignGuid']);

        /** @var BaseResponse<PublicBudgetItem> */
        $response = $this->client->request(
            method: 'get',
            path: [
                'marketing/v3/campaigns/%1$s/budget/%2$s', $campaignGuid, $budgetID,
            ],
            options: $options,
            convert: PublicBudgetItem::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve detailed information about the budget and spend items for a specified campaign, including the total budget, total spend, and remaining budget.
     * Budget and Spend items may be returned in any order, but the order field specifies their sequence based on the creation date. The item with order 0 is the oldest, and items with higher order values are newer
     *
     * @throws APIException
     */
    public function getTotals(
        string $campaignGuid,
        ?RequestOptions $requestOptions = null
    ): PublicBudgetTotals {
        /** @var BaseResponse<PublicBudgetTotals> */
        $response = $this->client->request(
            method: 'get',
            path: ['marketing/v3/campaigns/%1$s/budget/totals', $campaignGuid],
            options: $requestOptions,
            convert: PublicBudgetTotals::class,
        );

        return $response->parse();
    }
}

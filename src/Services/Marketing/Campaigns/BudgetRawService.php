<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Marketing\Campaigns;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Marketing\Campaigns\Budget\BudgetCreateParams;
use HubSpotSDK\Marketing\Campaigns\Budget\BudgetDeleteParams;
use HubSpotSDK\Marketing\Campaigns\Budget\BudgetGetParams;
use HubSpotSDK\Marketing\Campaigns\Budget\BudgetUpdateParams;
use HubSpotSDK\Marketing\Campaigns\PublicBudgetItem;
use HubSpotSDK\Marketing\Campaigns\PublicBudgetTotals;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Marketing\Campaigns\BudgetRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class BudgetRawService implements BudgetRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Add a new budget item to the campaign
     *
     * @param string $campaignGuid The UUID of the campaign, required
     * Example: 9dbec438-53e2-4b28-8c0f-38f56574a6e8
     * @param array{
     *   amount: float, name: string, order: int, description?: string
     * }|BudgetCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicBudgetItem>
     *
     * @throws APIException
     */
    public function create(
        string $campaignGuid,
        array|BudgetCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BudgetCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['marketing/campaigns/2026-03/%1$s/budget', $campaignGuid],
            body: (object) $parsed,
            options: $options,
            convert: PublicBudgetItem::class,
        );
    }

    /**
     * @api
     *
     * Update a specific budget item by ID
     *
     * @param int $budgetID Path param: The ID of the budget item, required. Example: 352
     * @param array{
     *   campaignGuid: string,
     *   amount: float,
     *   name: string,
     *   order: int,
     *   description?: string,
     * }|BudgetUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicBudgetItem>
     *
     * @throws APIException
     */
    public function update(
        int $budgetID,
        array|BudgetUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BudgetUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $campaignGuid = $parsed['campaignGuid'];
        unset($parsed['campaignGuid']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: [
                'marketing/campaigns/2026-03/%1$s/budget/%2$s', $campaignGuid, $budgetID,
            ],
            body: (object) array_diff_key($parsed, array_flip(['campaignGuid'])),
            options: $options,
            convert: PublicBudgetItem::class,
        );
    }

    /**
     * @api
     *
     * Delete a specific budget item by ID
     *
     * @param int $budgetID The ID of the budget item, required. Example: 352
     * @param array{campaignGuid: string}|BudgetDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        int $budgetID,
        array|BudgetDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BudgetDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $campaignGuid = $parsed['campaignGuid'];
        unset($parsed['campaignGuid']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'marketing/campaigns/2026-03/%1$s/budget/%2$s', $campaignGuid, $budgetID,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Get a specific budget item by ID
     *
     * @param int $budgetID The ID of the budget item, required. Example: 352
     * @param array{campaignGuid: string}|BudgetGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicBudgetItem>
     *
     * @throws APIException
     */
    public function get(
        int $budgetID,
        array|BudgetGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BudgetGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $campaignGuid = $parsed['campaignGuid'];
        unset($parsed['campaignGuid']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'marketing/campaigns/2026-03/%1$s/budget/%2$s', $campaignGuid, $budgetID,
            ],
            options: $options,
            convert: PublicBudgetItem::class,
        );
    }

    /**
     * @api
     *
     * Retrieve detailed information about the budget and spend items for a specified campaign, including the total budget, total spend, and remaining budget.
     * Budget and Spend items may be returned in any order, but the order field specifies their sequence based on the creation date. The item with order 0 is the oldest, and items with higher order values are newer
     *
     * @param string $campaignGuid The UUID of the campaign, required
     * Example: 9dbec438-53e2-4b28-8c0f-38f56574a6e8
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicBudgetTotals>
     *
     * @throws APIException
     */
    public function getTotals(
        string $campaignGuid,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['marketing/campaigns/2026-03/%1$s/budget/totals', $campaignGuid],
            options: $requestOptions,
            convert: PublicBudgetTotals::class,
        );
    }
}

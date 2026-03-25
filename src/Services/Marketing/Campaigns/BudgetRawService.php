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
use HubspotSDK\ServiceContracts\Marketing\Campaigns\BudgetRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
     * Add a new budget item to the specified campaign. This operation allows you to allocate a budget for a campaign by specifying the necessary details in the request body.
     *
     * @param string $campaignGuid the unique identifier of the campaign to which the budget item will be added
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
     * Update a specific budget item by its ID within a marketing campaign. This operation allows you to modify the details of a budget item, such as its amount, name, or order, ensuring that your campaign's financial records are accurate and up-to-date.
     *
     * @param int $budgetID path param: The unique identifier of the budget item to update
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
     * Delete a specific budget item from a campaign using its unique ID. This operation removes the budget item from the campaign's budget list, ensuring it is no longer considered in budget calculations.
     *
     * @param int $budgetID the unique identifier of the budget item to be deleted
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
     * Retrieve a specific budget item by its ID for a given campaign. This endpoint is useful for accessing detailed information about a particular budget item associated with a marketing campaign.
     *
     * @param int $budgetID the unique identifier of the budget item to retrieve
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
     * Retrieve budget and spending items along with their totals for a specific campaign. This endpoint provides insights into the financial allocations and expenditures associated with the campaign, helping users to manage and analyze campaign budgets effectively.
     *
     * @param string $campaignGuid the unique identifier of the campaign for which the budget and spending totals are being retrieved
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

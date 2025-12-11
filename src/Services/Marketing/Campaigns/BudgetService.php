<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Campaigns;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\Campaigns\PublicBudgetItem;
use HubspotSDK\Marketing\Campaigns\PublicBudgetTotals;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Campaigns\BudgetContract;

final class BudgetService implements BudgetContract
{
    /**
     * @api
     */
    public BudgetRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BudgetRawService($client);
    }

    /**
     * @api
     *
     * Add a new budget item to the campaign
     *
     * @param string $campaignGuid unique identifier for the campaign
     *
     * @throws APIException
     */
    public function create(
        string $campaignGuid,
        float $amount,
        string $name,
        int $order,
        ?string $description = null,
        ?RequestOptions $requestOptions = null,
    ): PublicBudgetItem {
        $params = Util::removeNulls(
            [
                'amount' => $amount,
                'name' => $name,
                'order' => $order,
                'description' => $description,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($campaignGuid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a specific budget item by ID
     *
     * @param int $budgetID path param: Unique identifier for the budget item
     * @param string $campaignGuid path param: Unique identifier for the campaign
     * @param float $amount Body param:
     * @param string $name Body param:
     * @param int $order Body param:
     * @param string $description Body param:
     *
     * @throws APIException
     */
    public function update(
        int $budgetID,
        string $campaignGuid,
        float $amount,
        string $name,
        int $order,
        ?string $description = null,
        ?RequestOptions $requestOptions = null,
    ): PublicBudgetItem {
        $params = Util::removeNulls(
            [
                'campaignGuid' => $campaignGuid,
                'amount' => $amount,
                'name' => $name,
                'order' => $order,
                'description' => $description,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($budgetID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a specific budget item by ID
     *
     * @param int $budgetID unique identifier for the budget item
     * @param string $campaignGuid unique identifier for the campaign
     *
     * @throws APIException
     */
    public function delete(
        int $budgetID,
        string $campaignGuid,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = Util::removeNulls(['campaignGuid' => $campaignGuid]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($budgetID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a specific budget item by ID
     *
     * @param int $budgetID unique identifier for the budget item
     * @param string $campaignGuid unique identifier for the campaign
     *
     * @throws APIException
     */
    public function get(
        int $budgetID,
        string $campaignGuid,
        ?RequestOptions $requestOptions = null
    ): PublicBudgetItem {
        $params = Util::removeNulls(['campaignGuid' => $campaignGuid]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($budgetID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve detailed information about the budget and spend items for a specified campaign, including the total budget, total spend, and remaining budget.
     * Budget and Spend items may be returned in any order, but the order field specifies their sequence based on the creation date. The item with order 0 is the oldest, and items with higher order values are newer
     *
     * @param string $campaignGuid unique identifier for the campaign, formatted as a UUID
     *
     * @throws APIException
     */
    public function getTotals(
        string $campaignGuid,
        ?RequestOptions $requestOptions = null
    ): PublicBudgetTotals {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getTotals($campaignGuid, requestOptions: $requestOptions);

        return $response->parse();
    }
}

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

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
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
     * Add a new budget item to the specified campaign. This operation allows you to allocate a budget for a campaign by specifying the necessary details in the request body.
     *
     * @param string $campaignGuid the unique identifier of the campaign to which the budget item will be added
     * @param float $amount the monetary value assigned to the budget item
     * @param string $name the name of the budget item
     * @param int $order the sequence number indicating the order of the budget item
     * @param string $description a detailed explanation or notes about the budget item
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $campaignGuid,
        float $amount,
        string $name,
        int $order,
        ?string $description = null,
        RequestOptions|array|null $requestOptions = null,
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
     * Update a specific budget item by its ID within a marketing campaign. This operation allows you to modify the details of a budget item, such as its amount, name, or order, ensuring that your campaign's financial records are accurate and up-to-date.
     *
     * @param int $budgetID path param: The unique identifier of the budget item to update
     * @param string $campaignGuid path param: The unique identifier of the campaign to which the budget item belongs
     * @param float $amount body param: The monetary value assigned to the budget item
     * @param string $name body param: The name of the budget item
     * @param int $order body param: The sequence number indicating the order of the budget item
     * @param string $description body param: A detailed explanation or notes about the budget item
     * @param RequestOpts|null $requestOptions
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
        RequestOptions|array|null $requestOptions = null,
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
     * Delete a specific budget item from a campaign using its unique ID. This operation removes the budget item from the campaign's budget list, ensuring it is no longer considered in budget calculations.
     *
     * @param int $budgetID the unique identifier of the budget item to be deleted
     * @param string $campaignGuid the unique identifier of the campaign from which the budget item will be deleted
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $budgetID,
        string $campaignGuid,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['campaignGuid' => $campaignGuid]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($budgetID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a specific budget item by its ID for a given campaign. This endpoint is useful for accessing detailed information about a particular budget item associated with a marketing campaign.
     *
     * @param int $budgetID the unique identifier of the budget item to retrieve
     * @param string $campaignGuid the unique identifier of the campaign
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        int $budgetID,
        string $campaignGuid,
        RequestOptions|array|null $requestOptions = null,
    ): PublicBudgetItem {
        $params = Util::removeNulls(['campaignGuid' => $campaignGuid]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($budgetID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve budget and spending items along with their totals for a specific campaign. This endpoint provides insights into the financial allocations and expenditures associated with the campaign, helping users to manage and analyze campaign budgets effectively.
     *
     * @param string $campaignGuid the unique identifier of the campaign for which the budget and spending totals are being retrieved
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getTotals(
        string $campaignGuid,
        RequestOptions|array|null $requestOptions = null
    ): PublicBudgetTotals {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getTotals($campaignGuid, requestOptions: $requestOptions);

        return $response->parse();
    }
}

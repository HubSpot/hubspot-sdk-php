<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Campaigns;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Campaigns\PublicBudgetItem;
use HubspotSDK\Marketing\Campaigns\PublicBudgetTotals;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface BudgetContract
{
    /**
     * @api
     *
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
    ): PublicBudgetItem;

    /**
     * @api
     *
     * @param int $budgetID Path param
     * @param string $campaignGuid Path param
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
    ): PublicBudgetItem;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $budgetID,
        string $campaignGuid,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        int $budgetID,
        string $campaignGuid,
        RequestOptions|array|null $requestOptions = null,
    ): PublicBudgetItem;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getTotals(
        string $campaignGuid,
        RequestOptions|array|null $requestOptions = null
    ): PublicBudgetTotals;
}

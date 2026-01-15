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
     * @param string $campaignGuid unique identifier for the campaign
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
     * @param int $budgetID path param: Unique identifier for the budget item
     * @param string $campaignGuid path param: Unique identifier for the campaign
     * @param float $amount Body param
     * @param string $name Body param
     * @param int $order Body param
     * @param string $description Body param
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
     * @param int $budgetID unique identifier for the budget item
     * @param string $campaignGuid unique identifier for the campaign
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
     * @param int $budgetID unique identifier for the budget item
     * @param string $campaignGuid unique identifier for the campaign
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
     * @param string $campaignGuid unique identifier for the campaign, formatted as a UUID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getTotals(
        string $campaignGuid,
        RequestOptions|array|null $requestOptions = null
    ): PublicBudgetTotals;
}

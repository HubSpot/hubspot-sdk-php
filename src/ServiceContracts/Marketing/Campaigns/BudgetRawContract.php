<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Campaigns;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Campaigns\Budget\BudgetCreateParams;
use HubspotSDK\Marketing\Campaigns\Budget\BudgetDeleteParams;
use HubspotSDK\Marketing\Campaigns\Budget\BudgetGetParams;
use HubspotSDK\Marketing\Campaigns\Budget\BudgetUpdateParams;
use HubspotSDK\Marketing\Campaigns\PublicBudgetItem;
use HubspotSDK\Marketing\Campaigns\PublicBudgetTotals;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface BudgetRawContract
{
    /**
     * @api
     *
     * @param string $campaignGuid the unique identifier of the campaign to which the budget item will be added
     * @param array<string,mixed>|BudgetCreateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $budgetID path param: The unique identifier of the budget item to update
     * @param array<string,mixed>|BudgetUpdateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $budgetID the unique identifier of the budget item to be deleted
     * @param array<string,mixed>|BudgetDeleteParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $budgetID the unique identifier of the budget item to retrieve
     * @param array<string,mixed>|BudgetGetParams $params
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
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;
}

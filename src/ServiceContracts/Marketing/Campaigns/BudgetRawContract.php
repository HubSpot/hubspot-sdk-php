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

interface BudgetRawContract
{
    /**
     * @api
     *
     * @param string $campaignGuid unique identifier for the campaign
     * @param array<mixed>|BudgetCreateParams $params
     *
     * @return BaseResponse<PublicBudgetItem>
     *
     * @throws APIException
     */
    public function create(
        string $campaignGuid,
        array|BudgetCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $budgetID path param: Unique identifier for the budget item
     * @param array<mixed>|BudgetUpdateParams $params
     *
     * @return BaseResponse<PublicBudgetItem>
     *
     * @throws APIException
     */
    public function update(
        int $budgetID,
        array|BudgetUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $budgetID unique identifier for the budget item
     * @param array<mixed>|BudgetDeleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        int $budgetID,
        array|BudgetDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $budgetID unique identifier for the budget item
     * @param array<mixed>|BudgetGetParams $params
     *
     * @return BaseResponse<PublicBudgetItem>
     *
     * @throws APIException
     */
    public function get(
        int $budgetID,
        array|BudgetGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $campaignGuid unique identifier for the campaign, formatted as a UUID
     *
     * @return BaseResponse<PublicBudgetTotals>
     *
     * @throws APIException
     */
    public function getTotals(
        string $campaignGuid,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}

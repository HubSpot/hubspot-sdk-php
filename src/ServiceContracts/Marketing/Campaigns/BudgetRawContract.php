<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Marketing\Campaigns;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Marketing\Campaigns\Budget\BudgetCreateParams;
use HubSpotSDK\Marketing\Campaigns\Budget\BudgetDeleteParams;
use HubSpotSDK\Marketing\Campaigns\Budget\BudgetGetParams;
use HubSpotSDK\Marketing\Campaigns\Budget\BudgetUpdateParams;
use HubSpotSDK\Marketing\Campaigns\PublicBudgetItem;
use HubSpotSDK\Marketing\Campaigns\PublicBudgetTotals;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface BudgetRawContract
{
    /**
     * @api
     *
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
     * @param int $budgetID Path param
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

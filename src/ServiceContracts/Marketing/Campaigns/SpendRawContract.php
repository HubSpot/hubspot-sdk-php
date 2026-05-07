<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Marketing\Campaigns;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Marketing\Campaigns\PublicSpendItem;
use HubSpotSDK\Marketing\Campaigns\Spend\SpendCreateParams;
use HubSpotSDK\Marketing\Campaigns\Spend\SpendDeleteParams;
use HubSpotSDK\Marketing\Campaigns\Spend\SpendGetParams;
use HubSpotSDK\Marketing\Campaigns\Spend\SpendUpdateParams;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface SpendRawContract
{
    /**
     * @api
     *
     * @param string $campaignGuid The UUID of the campaign, required
     * Example: 9dbec438-53e2-4b28-8c0f-38f56574a6e8
     * @param array<string,mixed>|SpendCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicSpendItem>
     *
     * @throws APIException
     */
    public function create(
        string $campaignGuid,
        array|SpendCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $spendID Path param: The ID of the spend item, required. Example: 491
     * @param array<string,mixed>|SpendUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicSpendItem>
     *
     * @throws APIException
     */
    public function update(
        int $spendID,
        array|SpendUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $spendID The ID of the spend item, required. Example: 491
     * @param array<string,mixed>|SpendDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        int $spendID,
        array|SpendDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $spendID The ID of the spend item, required. Example: 491
     * @param array<string,mixed>|SpendGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicSpendItem>
     *
     * @throws APIException
     */
    public function get(
        int $spendID,
        array|SpendGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}

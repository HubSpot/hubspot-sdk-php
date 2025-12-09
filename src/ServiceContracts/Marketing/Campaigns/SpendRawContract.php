<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Campaigns;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Campaigns\PublicSpendItem;
use HubspotSDK\Marketing\Campaigns\Spend\SpendCreateParams;
use HubspotSDK\Marketing\Campaigns\Spend\SpendDeleteParams;
use HubspotSDK\Marketing\Campaigns\Spend\SpendGetParams;
use HubspotSDK\Marketing\Campaigns\Spend\SpendUpdateParams;
use HubspotSDK\RequestOptions;

interface SpendRawContract
{
    /**
     * @api
     *
     * @param string $campaignGuid unique identifier for the campaign
     * @param array<mixed>|SpendCreateParams $params
     *
     * @return BaseResponse<PublicSpendItem>
     *
     * @throws APIException
     */
    public function create(
        string $campaignGuid,
        array|SpendCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $spendID path param: Unique identifier for the spend item
     * @param array<mixed>|SpendUpdateParams $params
     *
     * @return BaseResponse<PublicSpendItem>
     *
     * @throws APIException
     */
    public function update(
        int $spendID,
        array|SpendUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $spendID unique identifier for the spend item
     * @param array<mixed>|SpendDeleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        int $spendID,
        array|SpendDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $spendID unique identifier for the spend item
     * @param array<mixed>|SpendGetParams $params
     *
     * @return BaseResponse<PublicSpendItem>
     *
     * @throws APIException
     */
    public function get(
        int $spendID,
        array|SpendGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}

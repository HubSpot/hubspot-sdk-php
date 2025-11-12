<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Campaigns;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Campaigns\PublicSpendItem;
use HubspotSDK\Marketing\Campaigns\Spend\SpendCreateParams;
use HubspotSDK\Marketing\Campaigns\Spend\SpendDeleteParams;
use HubspotSDK\Marketing\Campaigns\Spend\SpendGetParams;
use HubspotSDK\Marketing\Campaigns\Spend\SpendUpdateParams;
use HubspotSDK\RequestOptions;

interface SpendContract
{
    /**
     * @api
     *
     * @param array<mixed>|SpendCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $campaignGuid,
        array|SpendCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicSpendItem;

    /**
     * @api
     *
     * @param array<mixed>|SpendUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        int $spendID,
        array|SpendUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicSpendItem;

    /**
     * @api
     *
     * @param array<mixed>|SpendDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        int $spendID,
        array|SpendDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|SpendGetParams $params
     *
     * @throws APIException
     */
    public function get(
        int $spendID,
        array|SpendGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicSpendItem;
}

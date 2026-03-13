<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Campaigns;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Campaigns\PublicSpendItem;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface SpendContract
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
    ): PublicSpendItem;

    /**
     * @api
     *
     * @param int $spendID path param: Unique identifier for the spend item
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
        int $spendID,
        string $campaignGuid,
        float $amount,
        string $name,
        int $order,
        ?string $description = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicSpendItem;

    /**
     * @api
     *
     * @param int $spendID unique identifier for the spend item
     * @param string $campaignGuid unique identifier for the campaign
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $spendID,
        string $campaignGuid,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param int $spendID unique identifier for the spend item
     * @param string $campaignGuid unique identifier for the campaign
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        int $spendID,
        string $campaignGuid,
        RequestOptions|array|null $requestOptions = null,
    ): PublicSpendItem;
}

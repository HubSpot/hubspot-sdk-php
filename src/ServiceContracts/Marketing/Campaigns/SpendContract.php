<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Marketing\Campaigns;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Marketing\Campaigns\PublicSpendItem;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface SpendContract
{
    /**
     * @api
     *
     * @param float $amount the monetary value of the spend item
     * @param string $name the name of the spend item
     * @param int $order the sequence number indicating the order of the spend item
     * @param string $description a brief description of the spend item
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
     * @param int $spendID Path param
     * @param string $campaignGuid Path param
     * @param float $amount body param: The monetary value of the spend item
     * @param string $name body param: The name of the spend item
     * @param int $order body param: The sequence number indicating the order of the spend item
     * @param string $description body param: A brief description of the spend item
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

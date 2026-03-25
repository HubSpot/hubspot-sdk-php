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
     * @param string $campaignGuid the unique identifier of the campaign for which the spend item is being created
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
     * @param int $spendID path param: The unique identifier of the spend item to update
     * @param string $campaignGuid path param: The unique identifier of the campaign
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
     * @param int $spendID the unique identifier of the spend item to delete
     * @param string $campaignGuid the unique identifier of the campaign
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
     * @param int $spendID the unique identifier of the spend item to retrieve
     * @param string $campaignGuid the unique identifier of the campaign
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

<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Campaigns;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Campaigns\PublicSpendItem;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface SpendContract
{
    /**
     * @api
     *
     * @param float $amount
     * @param string $name
     * @param int $order
     * @param string $description
     *
     * @throws APIException
     */
    public function create(
        string $campaignGuid,
        $amount,
        $name,
        $order,
        $description = omit,
        ?RequestOptions $requestOptions = null,
    ): PublicSpendItem;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        string $campaignGuid,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): PublicSpendItem;

    /**
     * @api
     *
     * @param string $campaignGuid
     * @param float $amount
     * @param string $name
     * @param int $order
     * @param string $description
     *
     * @throws APIException
     */
    public function update(
        int $spendID,
        $campaignGuid,
        $amount,
        $name,
        $order,
        $description = omit,
        ?RequestOptions $requestOptions = null,
    ): PublicSpendItem;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        int $spendID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicSpendItem;

    /**
     * @api
     *
     * @param string $campaignGuid
     *
     * @throws APIException
     */
    public function delete(
        int $spendID,
        $campaignGuid,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRaw(
        int $spendID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $campaignGuid
     *
     * @throws APIException
     */
    public function get(
        int $spendID,
        $campaignGuid,
        ?RequestOptions $requestOptions = null
    ): PublicSpendItem;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        int $spendID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicSpendItem;
}

<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Campaigns;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Campaigns\PublicBudgetItem;
use HubspotSDK\Marketing\Campaigns\PublicBudgetTotals;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface BudgetContract
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
    ): PublicBudgetItem;

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
    ): PublicBudgetItem;

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
        int $budgetID,
        $campaignGuid,
        $amount,
        $name,
        $order,
        $description = omit,
        ?RequestOptions $requestOptions = null,
    ): PublicBudgetItem;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        int $budgetID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicBudgetItem;

    /**
     * @api
     *
     * @param string $campaignGuid
     *
     * @throws APIException
     */
    public function delete(
        int $budgetID,
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
        int $budgetID,
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
        int $budgetID,
        $campaignGuid,
        ?RequestOptions $requestOptions = null
    ): PublicBudgetItem;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        int $budgetID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicBudgetItem;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getTotals(
        string $campaignGuid,
        ?RequestOptions $requestOptions = null
    ): PublicBudgetTotals;
}

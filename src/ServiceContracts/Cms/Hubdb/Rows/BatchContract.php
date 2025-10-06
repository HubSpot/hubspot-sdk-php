<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Hubdb\Rows;

use HubspotSDK\Cms\Hubdb\BatchResponseHubDBTableRowV3;
use HubspotSDK\Cms\Hubdb\HubDBTableRowV3BatchUpdateRequest;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface BatchContract
{
    /**
     * @api
     *
     * @param list<HubDBTableRowV3BatchUpdateRequest> $inputs
     *
     * @throws APIException
     */
    public function replace(
        string $tableIDOrName,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function replaceRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseHubDBTableRowV3;
}

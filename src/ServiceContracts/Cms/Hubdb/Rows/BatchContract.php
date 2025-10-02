<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Hubdb\Rows;

use HubspotSDK\Cms\Hubdb\CmsHubdbBatchResponseHubDBTableRowV3;
use HubspotSDK\Cms\Hubdb\CmsHubdbHubDBTableRowV3BatchUpdateRequest;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Implementation\HasRawResponse;
use HubspotSDK\RequestOptions;

interface BatchContract
{
    /**
     * @api
     *
     * @param list<CmsHubdbHubDBTableRowV3BatchUpdateRequest> $inputs
     *
     * @return CmsHubdbBatchResponseHubDBTableRowV3<HasRawResponse>
     *
     * @throws APIException
     */
    public function replace(
        string $tableIDOrName,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): CmsHubdbBatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CmsHubdbBatchResponseHubDBTableRowV3<HasRawResponse>
     *
     * @throws APIException
     */
    public function replaceRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): CmsHubdbBatchResponseHubDBTableRowV3;
}

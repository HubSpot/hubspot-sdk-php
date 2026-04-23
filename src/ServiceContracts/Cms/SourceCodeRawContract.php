<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Cms;

use HubSpotSDK\ActionResponse;
use HubSpotSDK\Cms\SourceCode\SourceCodeExtractAsyncParams;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\TaskLocator;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface SourceCodeRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SourceCodeExtractAsyncParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TaskLocator>
     *
     * @throws APIException
     */
    public function extractAsync(
        array|SourceCodeExtractAsyncParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionResponse>
     *
     * @throws APIException
     */
    public function getExtractionStatus(
        int $taskID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}

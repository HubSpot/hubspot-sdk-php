<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm\Extensions;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\Extensions\VideoConferencing\ExternalSettings;
use HubSpotSDK\Crm\Extensions\VideoConferencing\VideoConferencingUpdateParams;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface VideoConferencingRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|VideoConferencingUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExternalSettings>
     *
     * @throws APIException
     */
    public function update(
        int $appID,
        array|VideoConferencingUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExternalSettings>
     *
     * @throws APIException
     */
    public function get(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}

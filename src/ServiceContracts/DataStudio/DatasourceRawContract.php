<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\DataStudio;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\DataStudio\Datasource\DatasourceCreateParams;
use HubspotSDK\DataStudio\Datasource\DataSourceGetResponse;
use HubspotSDK\DataStudio\Datasource\DatasourceUpdateParams;
use HubspotSDK\DataStudio\Datasource\DataSourceUpdateResponse;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface DatasourceRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|DatasourceCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function create(
        array|DatasourceCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|DatasourceUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DataSourceUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        int $datasourceID,
        array|DatasourceUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function delete(
        int $datasourceID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DataSourceGetResponse>
     *
     * @throws APIException
     */
    public function get(
        int $datasourceID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}

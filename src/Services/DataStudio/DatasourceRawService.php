<?php

declare(strict_types=1);

namespace HubspotSDK\Services\DataStudio;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\DataStudio\Datasource\ContentDisposition;
use HubspotSDK\DataStudio\Datasource\DatasourceCreateParams;
use HubspotSDK\DataStudio\Datasource\DataSourceGetResponse;
use HubspotSDK\DataStudio\Datasource\DatasourceUpdateParams;
use HubspotSDK\DataStudio\Datasource\DataSourceUpdateResponse;
use HubspotSDK\DataStudio\Datasource\MediaType;
use HubspotSDK\DataStudio\Datasource\MultiPart;
use HubspotSDK\DataStudio\Datasource\ParameterizedHeader;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\DataStudio\DatasourceRawContract;

/**
 * @phpstan-import-type ContentDispositionShape from \HubspotSDK\DataStudio\Datasource\ContentDisposition
 * @phpstan-import-type MediaTypeShape from \HubspotSDK\DataStudio\Datasource\MediaType
 * @phpstan-import-type ParameterizedHeaderShape from \HubspotSDK\DataStudio\Datasource\ParameterizedHeader
 * @phpstan-import-type MultiPartShape from \HubspotSDK\DataStudio\Datasource\MultiPart
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class DatasourceRawService implements DatasourceRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param array{
     *   bodyParts: list<mixed>,
     *   contentDisposition: ContentDisposition|ContentDispositionShape,
     *   entity: mixed,
     *   fields: array<string,mixed>,
     *   headers: array<string,list<string>>,
     *   mediaType: MediaType|MediaTypeShape,
     *   messageBodyWorkers: mixed,
     *   parameterizedHeaders: array<string,list<ParameterizedHeader|ParameterizedHeaderShape>>,
     *   providers: mixed,
     *   parent?: MultiPart|MultiPartShape,
     * }|DatasourceCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function create(
        array|DatasourceCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DatasourceCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'data-studio/2026-03/data-source',
            headers: ['Content-Type' => 'multipart/form-data', 'Accept' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * @param array{
     *   bodyParts: list<mixed>,
     *   contentDisposition: ContentDisposition|ContentDispositionShape,
     *   entity: mixed,
     *   fields: array<string,mixed>,
     *   headers: array<string,list<string>>,
     *   mediaType: MediaType|MediaTypeShape,
     *   messageBodyWorkers: mixed,
     *   parameterizedHeaders: array<string,list<ParameterizedHeader|ParameterizedHeaderShape>>,
     *   providers: mixed,
     *   parent?: MultiPart|MultiPartShape,
     * }|DatasourceUpdateParams $params
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
    ): BaseResponse {
        [$parsed, $options] = DatasourceUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['data-studio/2026-03/data-source/%1$s', $datasourceID],
            headers: ['Content-Type' => 'multipart/form-data'],
            body: (object) $parsed,
            options: $options,
            convert: DataSourceUpdateResponse::class,
        );
    }

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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['data-studio/2026-03/data-source/%1$s', $datasourceID],
            headers: ['Accept' => '*/*'],
            options: $requestOptions,
            convert: 'string',
        );
    }

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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['data-studio/2026-03/data-source/%1$s', $datasourceID],
            options: $requestOptions,
            convert: DataSourceGetResponse::class,
        );
    }
}

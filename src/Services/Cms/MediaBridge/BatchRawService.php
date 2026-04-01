<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\MediaBridge;

use HubspotSDK\Client;
use HubspotSDK\Cms\MediaBridge\Batch\BatchCreateParams;
use HubspotSDK\Cms\MediaBridge\Batch\BatchDeleteParams;
use HubspotSDK\Cms\MediaBridge\Batch\BatchGetParams;
use HubspotSDK\Cms\MediaBridge\Batch\BatchGetParams\DataSensitivity;
use HubspotSDK\Cms\MediaBridge\BatchResponseProperty;
use HubspotSDK\Cms\MediaBridge\PropertyCreate;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\PropertyName;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\MediaBridge\BatchRawContract;

/**
 * @phpstan-import-type PropertyCreateShape from \HubspotSDK\Cms\MediaBridge\PropertyCreate
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 * @phpstan-import-type PropertyNameShape from \HubspotSDK\PropertyName
 */
final class BatchRawService implements BatchRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a batch of properties of the specified object type.
     *
     * @param string $objectType Path param
     * @param array{
     *   appID: int, inputs: list<PropertyCreate|PropertyCreateShape>
     * }|BatchCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseProperty>
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        array|BatchCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'media-bridge/2026-03/%1$s/properties/%2$s/batch/create',
                $appID,
                $objectType,
            ],
            body: (object) array_diff_key($parsed, array_flip(['appID'])),
            options: $options,
            convert: BatchResponseProperty::class,
        );
    }

    /**
     * @api
     *
     * Archive a batch of existing properties for the specified types.
     *
     * @param string $objectType Path param
     * @param array{
     *   appID: int, inputs: list<PropertyName|PropertyNameShape>
     * }|BatchDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $objectType,
        array|BatchDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'media-bridge/2026-03/%1$s/properties/%2$s/batch/archive',
                $appID,
                $objectType,
            ],
            body: (object) array_diff_key($parsed, array_flip(['appID'])),
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Get the details for a batch of properties for a specified object type.
     *
     * @param string $objectType Path param
     * @param array{
     *   appID: int,
     *   archived: bool,
     *   dataSensitivity: DataSensitivity|value-of<DataSensitivity>,
     *   inputs: list<PropertyName|PropertyNameShape>,
     * }|BatchGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseProperty>
     *
     * @throws APIException
     */
    public function get(
        string $objectType,
        array|BatchGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'media-bridge/2026-03/%1$s/properties/%2$s/batch/read',
                $appID,
                $objectType,
            ],
            body: (object) array_diff_key($parsed, array_flip(['appID'])),
            options: $options,
            convert: BatchResponseProperty::class,
        );
    }
}

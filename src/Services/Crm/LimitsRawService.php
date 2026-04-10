<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Crm\Limits\AssociationRecordLimitResponse;
use HubSpotSDK\Crm\Limits\CalculatedPropertyLimitResponse;
use HubSpotSDK\Crm\Limits\CollectionResponseAssociationLabelLimitResponseNoPaging;
use HubSpotSDK\Crm\Limits\CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging;
use HubSpotSDK\Crm\Limits\CustomObjectLimitResponse;
use HubSpotSDK\Crm\Limits\CustomPropertyLimitResponse;
use HubSpotSDK\Crm\Limits\LimitGetAssociationLabelLimitsParams;
use HubSpotSDK\Crm\Limits\LimitGetAssociationRecordsLimitsByObjectTypeParams;
use HubSpotSDK\Crm\Limits\PipelineLimitResponse;
use HubSpotSDK\Crm\Limits\RecordLimitResponse;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Crm\LimitsRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class LimitsRawService implements LimitsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns limits and usage for custom association labels
     *
     * @param array{
     *   fromObjectTypeID?: string, toObjectTypeID?: string
     * }|LimitGetAssociationLabelLimitsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseAssociationLabelLimitResponseNoPaging>
     *
     * @throws APIException
     */
    public function getAssociationLabelLimits(
        array|LimitGetAssociationLabelLimitsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LimitGetAssociationLabelLimitsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'crm/limits/2026-03/associations/labels',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'fromObjectTypeID' => 'fromObjectTypeId',
                    'toObjectTypeID' => 'toObjectTypeId',
                ],
            ),
            options: $options,
            convert: CollectionResponseAssociationLabelLimitResponseNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Returns records approaching or at association limits between two objects
     *
     * @param array{
     *   fromObjectTypeID: string
     * }|LimitGetAssociationRecordsLimitsByObjectTypeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AssociationRecordLimitResponse>
     *
     * @throws APIException
     */
    public function getAssociationRecordsLimitsByObjectType(
        string $toObjectTypeID,
        array|LimitGetAssociationRecordsLimitsByObjectTypeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LimitGetAssociationRecordsLimitsByObjectTypeParams::parseRequest(
            $params,
            $requestOptions,
        );
        $fromObjectTypeID = $parsed['fromObjectTypeID'];
        unset($parsed['fromObjectTypeID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'crm/limits/2026-03/associations/records/%1$s/%2$s',
                $fromObjectTypeID,
                $toObjectTypeID,
            ],
            options: $options,
            convert: AssociationRecordLimitResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns objects with records approaching or at association limits
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging,>
     *
     * @throws APIException
     */
    public function getAssociationRecordsLimitsFromObjects(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'crm/limits/2026-03/associations/records/from',
            options: $requestOptions,
            convert: CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Returns objects for which the from object has records approaching or at association limits
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging,>
     *
     * @throws APIException
     */
    public function getAssociationRecordsLimitsToObjects(
        string $fromObjectTypeID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'crm/limits/2026-03/associations/records/%1$s/to', $fromObjectTypeID,
            ],
            options: $requestOptions,
            convert: CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Returns overall limit and per object usage for calculated properties
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CalculatedPropertyLimitResponse>
     *
     * @throws APIException
     */
    public function getCalculatedPropertyLimits(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'crm/limits/2026-03/calculated-properties',
            options: $requestOptions,
            convert: CalculatedPropertyLimitResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns limits and usage for custom object schemas
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CustomObjectLimitResponse>
     *
     * @throws APIException
     */
    public function getCustomObjectTypeLimits(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'crm/limits/2026-03/custom-object-types',
            options: $requestOptions,
            convert: CustomObjectLimitResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns limits and usage per object for custom properties
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CustomPropertyLimitResponse>
     *
     * @throws APIException
     */
    public function getCustomPropertyLimits(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'crm/limits/2026-03/custom-properties',
            options: $requestOptions,
            convert: CustomPropertyLimitResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns limits and usage per object for pipelines
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PipelineLimitResponse>
     *
     * @throws APIException
     */
    public function getPipelineLimits(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'crm/limits/2026-03/pipelines',
            options: $requestOptions,
            convert: PipelineLimitResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns limits and usage per object for records
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RecordLimitResponse>
     *
     * @throws APIException
     */
    public function getRecordLimits(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'crm/limits/2026-03/records',
            options: $requestOptions,
            convert: RecordLimitResponse::class,
        );
    }
}

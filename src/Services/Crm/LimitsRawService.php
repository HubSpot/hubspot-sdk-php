<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Limits\AssociationRecordLimitResponse;
use HubspotSDK\Crm\Limits\CalculatedPropertyLimitResponse;
use HubspotSDK\Crm\Limits\CollectionResponseAssociationLabelLimitResponseNoPaging;
use HubspotSDK\Crm\Limits\CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging;
use HubspotSDK\Crm\Limits\CustomObjectLimitResponse;
use HubspotSDK\Crm\Limits\CustomPropertyLimitResponse;
use HubspotSDK\Crm\Limits\LimitGetAssociationLabelLimitsParams;
use HubspotSDK\Crm\Limits\LimitGetAssociationRecordsLimitsByObjectTypeParams;
use HubspotSDK\Crm\Limits\PipelineLimitResponse;
use HubspotSDK\Crm\Limits\RecordLimitResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\LimitsRawContract;

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
     *
     * @return BaseResponse<CollectionResponseAssociationLabelLimitResponseNoPaging>
     *
     * @throws APIException
     */
    public function getAssociationLabelLimits(
        array|LimitGetAssociationLabelLimitsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LimitGetAssociationLabelLimitsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'crm/v3/limits/associations/labels',
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
     * @param string $toObjectTypeID objectTypeId of the object type on the "to" side of the association
     * @param array{
     *   fromObjectTypeID: string
     * }|LimitGetAssociationRecordsLimitsByObjectTypeParams $params
     *
     * @return BaseResponse<AssociationRecordLimitResponse>
     *
     * @throws APIException
     */
    public function getAssociationRecordsLimitsByObjectType(
        string $toObjectTypeID,
        array|LimitGetAssociationRecordsLimitsByObjectTypeParams $params,
        ?RequestOptions $requestOptions = null,
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
                'crm/v3/limits/associations/records/%1$s/%2$s',
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
     * @return BaseResponse<CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging,>
     *
     * @throws APIException
     */
    public function getAssociationRecordsLimitsFromObjects(
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'crm/v3/limits/associations/records/from',
            options: $requestOptions,
            convert: CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Returns objects for which the from object has records approaching or at association limits
     *
     * @param string $fromObjectTypeID objectTypeId of the object type on the "from" side of the association
     *
     * @return BaseResponse<CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging,>
     *
     * @throws APIException
     */
    public function getAssociationRecordsLimitsToObjects(
        string $fromObjectTypeID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/limits/associations/records/%1$s/to', $fromObjectTypeID],
            options: $requestOptions,
            convert: CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Returns overall limit and per object usage for calculated properties
     *
     * @return BaseResponse<CalculatedPropertyLimitResponse>
     *
     * @throws APIException
     */
    public function getCalculatedPropertyLimits(
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'crm/v3/limits/calculated-properties',
            options: $requestOptions,
            convert: CalculatedPropertyLimitResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns limits and usage for custom object schemas
     *
     * @return BaseResponse<CustomObjectLimitResponse>
     *
     * @throws APIException
     */
    public function getCustomObjectTypeLimits(
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'crm/v3/limits/custom-object-types',
            options: $requestOptions,
            convert: CustomObjectLimitResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns limits and usage per object for custom properties
     *
     * @return BaseResponse<CustomPropertyLimitResponse>
     *
     * @throws APIException
     */
    public function getCustomPropertyLimits(
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'crm/v3/limits/custom-properties',
            options: $requestOptions,
            convert: CustomPropertyLimitResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns limits and usage per object for pipelines
     *
     * @return BaseResponse<PipelineLimitResponse>
     *
     * @throws APIException
     */
    public function getPipelineLimits(
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'crm/v3/limits/pipelines',
            options: $requestOptions,
            convert: PipelineLimitResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns limits and usage per object for records
     *
     * @return BaseResponse<RecordLimitResponse>
     *
     * @throws APIException
     */
    public function getRecordLimits(
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'crm/v3/limits/records',
            options: $requestOptions,
            convert: RecordLimitResponse::class,
        );
    }
}

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
use HubspotSDK\ServiceContracts\Crm\LimitsContract;

final class LimitsService implements LimitsContract
{
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
     * @throws APIException
     */
    public function getAssociationLabelLimits(
        array|LimitGetAssociationLabelLimitsParams $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseAssociationLabelLimitResponseNoPaging {
        [$parsed, $options] = LimitGetAssociationLabelLimitsParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<CollectionResponseAssociationLabelLimitResponseNoPaging,> */
        $response = $this->client->request(
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

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns records approaching or at association limits between two objects
     *
     * @param array{
     *   fromObjectTypeID: string
     * }|LimitGetAssociationRecordsLimitsByObjectTypeParams $params
     *
     * @throws APIException
     */
    public function getAssociationRecordsLimitsByObjectType(
        string $toObjectTypeID,
        array|LimitGetAssociationRecordsLimitsByObjectTypeParams $params,
        ?RequestOptions $requestOptions = null,
    ): AssociationRecordLimitResponse {
        [$parsed, $options] = LimitGetAssociationRecordsLimitsByObjectTypeParams::parseRequest(
            $params,
            $requestOptions,
        );
        $fromObjectTypeID = $parsed['fromObjectTypeID'];
        unset($parsed['fromObjectTypeID']);

        /** @var BaseResponse<AssociationRecordLimitResponse> */
        $response = $this->client->request(
            method: 'get',
            path: [
                'crm/v3/limits/associations/records/%1$s/%2$s',
                $fromObjectTypeID,
                $toObjectTypeID,
            ],
            options: $options,
            convert: AssociationRecordLimitResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns objects with records approaching or at association limits
     *
     * @throws APIException
     */
    public function getAssociationRecordsLimitsFromObjects(
        ?RequestOptions $requestOptions = null
    ): CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging {
        /** @var BaseResponse<CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging,> */
        $response = $this->client->request(
            method: 'get',
            path: 'crm/v3/limits/associations/records/from',
            options: $requestOptions,
            convert: CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns objects for which the from object has records approaching or at association limits
     *
     * @throws APIException
     */
    public function getAssociationRecordsLimitsToObjects(
        string $fromObjectTypeID,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging {
        /** @var BaseResponse<CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging,> */
        $response = $this->client->request(
            method: 'get',
            path: ['crm/v3/limits/associations/records/%1$s/to', $fromObjectTypeID],
            options: $requestOptions,
            convert: CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns overall limit and per object usage for calculated properties
     *
     * @throws APIException
     */
    public function getCalculatedPropertyLimits(
        ?RequestOptions $requestOptions = null
    ): CalculatedPropertyLimitResponse {
        /** @var BaseResponse<CalculatedPropertyLimitResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'crm/v3/limits/calculated-properties',
            options: $requestOptions,
            convert: CalculatedPropertyLimitResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns limits and usage for custom object schemas
     *
     * @throws APIException
     */
    public function getCustomObjectTypeLimits(
        ?RequestOptions $requestOptions = null
    ): CustomObjectLimitResponse {
        /** @var BaseResponse<CustomObjectLimitResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'crm/v3/limits/custom-object-types',
            options: $requestOptions,
            convert: CustomObjectLimitResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns limits and usage per object for custom properties
     *
     * @throws APIException
     */
    public function getCustomPropertyLimits(
        ?RequestOptions $requestOptions = null
    ): CustomPropertyLimitResponse {
        /** @var BaseResponse<CustomPropertyLimitResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'crm/v3/limits/custom-properties',
            options: $requestOptions,
            convert: CustomPropertyLimitResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns limits and usage per object for pipelines
     *
     * @throws APIException
     */
    public function getPipelineLimits(
        ?RequestOptions $requestOptions = null
    ): PipelineLimitResponse {
        /** @var BaseResponse<PipelineLimitResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'crm/v3/limits/pipelines',
            options: $requestOptions,
            convert: PipelineLimitResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns limits and usage per object for records
     *
     * @throws APIException
     */
    public function getRecordLimits(
        ?RequestOptions $requestOptions = null
    ): RecordLimitResponse {
        /** @var BaseResponse<RecordLimitResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'crm/v3/limits/records',
            options: $requestOptions,
            convert: RecordLimitResponse::class,
        );

        return $response->parse();
    }
}

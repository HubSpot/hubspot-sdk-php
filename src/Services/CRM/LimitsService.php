<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Limits\AssociationRecordLimitResponse;
use HubspotSDK\CRM\Limits\CalculatedPropertyLimitResponse;
use HubspotSDK\CRM\Limits\CollectionResponseAssociationLabelLimitResponseNoPaging;
use HubspotSDK\CRM\Limits\CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging;
use HubspotSDK\CRM\Limits\CustomObjectLimitResponse;
use HubspotSDK\CRM\Limits\CustomPropertyLimitResponse;
use HubspotSDK\CRM\Limits\LimitGetAssociationLabelLimitsParams;
use HubspotSDK\CRM\Limits\LimitGetAssociationRecordsLimitsByObjectTypeParams;
use HubspotSDK\CRM\Limits\PipelineLimitResponse;
use HubspotSDK\CRM\Limits\RecordLimitResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CRM\LimitsContract;

use const HubspotSDK\Core\OMIT as omit;

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
     * @param string $fromObjectTypeID
     * @param string $toObjectTypeID
     *
     * @throws APIException
     */
    public function getAssociationLabelLimits(
        $fromObjectTypeID = omit,
        $toObjectTypeID = omit,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseAssociationLabelLimitResponseNoPaging {
        $params = [
            'fromObjectTypeID' => $fromObjectTypeID,
            'toObjectTypeID' => $toObjectTypeID,
        ];

        return $this->getAssociationLabelLimitsRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getAssociationLabelLimitsRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseAssociationLabelLimitResponseNoPaging {
        [$parsed, $options] = LimitGetAssociationLabelLimitsParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'crm/v3/limits/associations/labels',
            query: $parsed,
            options: $options,
            convert: CollectionResponseAssociationLabelLimitResponseNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Returns records approaching or at association limits between two objects
     *
     * @param string $fromObjectTypeID
     *
     * @throws APIException
     */
    public function getAssociationRecordsLimitsByObjectType(
        string $toObjectTypeID,
        $fromObjectTypeID,
        ?RequestOptions $requestOptions = null,
    ): AssociationRecordLimitResponse {
        $params = ['fromObjectTypeID' => $fromObjectTypeID];

        return $this->getAssociationRecordsLimitsByObjectTypeRaw(
            $toObjectTypeID,
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getAssociationRecordsLimitsByObjectTypeRaw(
        string $toObjectTypeID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): AssociationRecordLimitResponse {
        [
            $parsed, $options,
        ] = LimitGetAssociationRecordsLimitsByObjectTypeParams::parseRequest(
            $params,
            $requestOptions
        );
        $fromObjectTypeID = $parsed['fromObjectTypeID'];
        unset($parsed['fromObjectTypeID']);

        // @phpstan-ignore-next-line;
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
     * @throws APIException
     */
    public function getAssociationRecordsLimitsFromObjects(
        ?RequestOptions $requestOptions = null
    ): CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging {
        // @phpstan-ignore-next-line;
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
     * @throws APIException
     */
    public function getAssociationRecordsLimitsToObjects(
        string $fromObjectTypeID,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging {
        // @phpstan-ignore-next-line;
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
     * @throws APIException
     */
    public function getCalculatedPropertyLimits(
        ?RequestOptions $requestOptions = null
    ): CalculatedPropertyLimitResponse {
        // @phpstan-ignore-next-line;
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
     * @throws APIException
     */
    public function getCustomObjectTypeLimits(
        ?RequestOptions $requestOptions = null
    ): CustomObjectLimitResponse {
        // @phpstan-ignore-next-line;
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
     * @throws APIException
     */
    public function getCustomPropertyLimits(
        ?RequestOptions $requestOptions = null
    ): CustomPropertyLimitResponse {
        // @phpstan-ignore-next-line;
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
     * @throws APIException
     */
    public function getPipelineLimits(
        ?RequestOptions $requestOptions = null
    ): PipelineLimitResponse {
        // @phpstan-ignore-next-line;
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
     * @throws APIException
     */
    public function getRecordLimits(
        ?RequestOptions $requestOptions = null
    ): RecordLimitResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'crm/v3/limits/records',
            options: $requestOptions,
            convert: RecordLimitResponse::class,
        );
    }
}

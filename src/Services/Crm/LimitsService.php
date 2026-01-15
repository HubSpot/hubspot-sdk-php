<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Limits\AssociationRecordLimitResponse;
use HubspotSDK\Crm\Limits\CalculatedPropertyLimitResponse;
use HubspotSDK\Crm\Limits\CollectionResponseAssociationLabelLimitResponseNoPaging;
use HubspotSDK\Crm\Limits\CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging;
use HubspotSDK\Crm\Limits\CustomObjectLimitResponse;
use HubspotSDK\Crm\Limits\CustomPropertyLimitResponse;
use HubspotSDK\Crm\Limits\PipelineLimitResponse;
use HubspotSDK\Crm\Limits\RecordLimitResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\LimitsContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class LimitsService implements LimitsContract
{
    /**
     * @api
     */
    public LimitsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new LimitsRawService($client);
    }

    /**
     * @api
     *
     * Returns limits and usage for custom association labels
     *
     * @param string $fromObjectTypeID objectTypeId of the object type on the "from" side of the association
     * @param string $toObjectTypeID objectTypeId of the object type on the "to" side of the association
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getAssociationLabelLimits(
        ?string $fromObjectTypeID = null,
        ?string $toObjectTypeID = null,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponseAssociationLabelLimitResponseNoPaging {
        $params = Util::removeNulls(
            [
                'fromObjectTypeID' => $fromObjectTypeID,
                'toObjectTypeID' => $toObjectTypeID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getAssociationLabelLimits(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns records approaching or at association limits between two objects
     *
     * @param string $toObjectTypeID objectTypeId of the object type on the "to" side of the association
     * @param string $fromObjectTypeID objectTypeId of the object type on the "from" side of the association
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getAssociationRecordsLimitsByObjectType(
        string $toObjectTypeID,
        string $fromObjectTypeID,
        RequestOptions|array|null $requestOptions = null,
    ): AssociationRecordLimitResponse {
        $params = Util::removeNulls(['fromObjectTypeID' => $fromObjectTypeID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getAssociationRecordsLimitsByObjectType($toObjectTypeID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns objects with records approaching or at association limits
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getAssociationRecordsLimitsFromObjects(
        RequestOptions|array|null $requestOptions = null
    ): CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getAssociationRecordsLimitsFromObjects(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns objects for which the from object has records approaching or at association limits
     *
     * @param string $fromObjectTypeID objectTypeId of the object type on the "from" side of the association
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getAssociationRecordsLimitsToObjects(
        string $fromObjectTypeID,
        RequestOptions|array|null $requestOptions = null
    ): CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getAssociationRecordsLimitsToObjects($fromObjectTypeID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns overall limit and per object usage for calculated properties
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getCalculatedPropertyLimits(
        RequestOptions|array|null $requestOptions = null
    ): CalculatedPropertyLimitResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getCalculatedPropertyLimits(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns limits and usage for custom object schemas
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getCustomObjectTypeLimits(
        RequestOptions|array|null $requestOptions = null
    ): CustomObjectLimitResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getCustomObjectTypeLimits(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns limits and usage per object for custom properties
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getCustomPropertyLimits(
        RequestOptions|array|null $requestOptions = null
    ): CustomPropertyLimitResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getCustomPropertyLimits(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns limits and usage per object for pipelines
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getPipelineLimits(
        RequestOptions|array|null $requestOptions = null
    ): PipelineLimitResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getPipelineLimits(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns limits and usage per object for records
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getRecordLimits(
        RequestOptions|array|null $requestOptions = null
    ): RecordLimitResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getRecordLimits(requestOptions: $requestOptions);

        return $response->parse();
    }
}

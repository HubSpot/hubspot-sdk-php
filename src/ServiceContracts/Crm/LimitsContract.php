<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Limits\AssociationRecordLimitResponse;
use HubspotSDK\Crm\Limits\CalculatedPropertyLimitResponse;
use HubspotSDK\Crm\Limits\CollectionResponseAssociationLabelLimitResponseNoPaging;
use HubspotSDK\Crm\Limits\CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging;
use HubspotSDK\Crm\Limits\CustomObjectLimitResponse;
use HubspotSDK\Crm\Limits\CustomPropertyLimitResponse;
use HubspotSDK\Crm\Limits\PipelineLimitResponse;
use HubspotSDK\Crm\Limits\RecordLimitResponse;
use HubspotSDK\RequestOptions;

interface LimitsContract
{
    /**
     * @api
     *
     * @param string $fromObjectTypeID objectTypeId of the object type on the "from" side of the association
     * @param string $toObjectTypeID objectTypeId of the object type on the "to" side of the association
     *
     * @throws APIException
     */
    public function getAssociationLabelLimits(
        ?string $fromObjectTypeID = null,
        ?string $toObjectTypeID = null,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseAssociationLabelLimitResponseNoPaging;

    /**
     * @api
     *
     * @param string $toObjectTypeID objectTypeId of the object type on the "to" side of the association
     * @param string $fromObjectTypeID objectTypeId of the object type on the "from" side of the association
     *
     * @throws APIException
     */
    public function getAssociationRecordsLimitsByObjectType(
        string $toObjectTypeID,
        string $fromObjectTypeID,
        ?RequestOptions $requestOptions = null,
    ): AssociationRecordLimitResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getAssociationRecordsLimitsFromObjects(
        ?RequestOptions $requestOptions = null
    ): CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging;

    /**
     * @api
     *
     * @param string $fromObjectTypeID objectTypeId of the object type on the "from" side of the association
     *
     * @throws APIException
     */
    public function getAssociationRecordsLimitsToObjects(
        string $fromObjectTypeID,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getCalculatedPropertyLimits(
        ?RequestOptions $requestOptions = null
    ): CalculatedPropertyLimitResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getCustomObjectTypeLimits(
        ?RequestOptions $requestOptions = null
    ): CustomObjectLimitResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getCustomPropertyLimits(
        ?RequestOptions $requestOptions = null
    ): CustomPropertyLimitResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getPipelineLimits(
        ?RequestOptions $requestOptions = null
    ): PipelineLimitResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getRecordLimits(
        ?RequestOptions $requestOptions = null
    ): RecordLimitResponse;
}

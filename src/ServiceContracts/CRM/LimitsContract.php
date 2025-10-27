<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Limits\AssociationRecordLimitResponse;
use HubspotSDK\CRM\Limits\CalculatedPropertyLimitResponse;
use HubspotSDK\CRM\Limits\CollectionResponseAssociationLabelLimitResponseNoPaging;
use HubspotSDK\CRM\Limits\CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging;
use HubspotSDK\CRM\Limits\CustomObjectLimitResponse;
use HubspotSDK\CRM\Limits\CustomPropertyLimitResponse;
use HubspotSDK\CRM\Limits\PipelineLimitResponse;
use HubspotSDK\CRM\Limits\RecordLimitResponse;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface LimitsContract
{
    /**
     * @api
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
    ): CollectionResponseAssociationLabelLimitResponseNoPaging;

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
    ): CollectionResponseAssociationLabelLimitResponseNoPaging;

    /**
     * @api
     *
     * @param string $fromObjectTypeID
     *
     * @throws APIException
     */
    public function getAssociationRecordsLimitsByObjectType(
        string $toObjectTypeID,
        $fromObjectTypeID,
        ?RequestOptions $requestOptions = null,
    ): AssociationRecordLimitResponse;

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

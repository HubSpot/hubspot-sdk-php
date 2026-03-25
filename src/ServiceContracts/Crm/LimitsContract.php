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

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface LimitsContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getAssociationLabelLimits(
        ?string $fromObjectTypeID = null,
        ?string $toObjectTypeID = null,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponseAssociationLabelLimitResponseNoPaging;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getAssociationRecordsLimitsByObjectType(
        string $toObjectTypeID,
        string $fromObjectTypeID,
        RequestOptions|array|null $requestOptions = null,
    ): AssociationRecordLimitResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getAssociationRecordsLimitsFromObjects(
        RequestOptions|array|null $requestOptions = null
    ): CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getAssociationRecordsLimitsToObjects(
        string $fromObjectTypeID,
        RequestOptions|array|null $requestOptions = null
    ): CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getCalculatedPropertyLimits(
        RequestOptions|array|null $requestOptions = null
    ): CalculatedPropertyLimitResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getCustomObjectTypeLimits(
        RequestOptions|array|null $requestOptions = null
    ): CustomObjectLimitResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getCustomPropertyLimits(
        RequestOptions|array|null $requestOptions = null
    ): CustomPropertyLimitResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getPipelineLimits(
        RequestOptions|array|null $requestOptions = null
    ): PipelineLimitResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getRecordLimits(
        RequestOptions|array|null $requestOptions = null
    ): RecordLimitResponse;
}

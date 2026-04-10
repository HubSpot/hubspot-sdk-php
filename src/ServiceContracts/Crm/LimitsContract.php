<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\Limits\AssociationRecordLimitResponse;
use HubSpotSDK\Crm\Limits\CalculatedPropertyLimitResponse;
use HubSpotSDK\Crm\Limits\CollectionResponseAssociationLabelLimitResponseNoPaging;
use HubSpotSDK\Crm\Limits\CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging;
use HubSpotSDK\Crm\Limits\CustomObjectLimitResponse;
use HubSpotSDK\Crm\Limits\CustomPropertyLimitResponse;
use HubSpotSDK\Crm\Limits\PipelineLimitResponse;
use HubSpotSDK\Crm\Limits\RecordLimitResponse;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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

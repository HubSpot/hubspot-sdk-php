<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\Associations\AssociationCreateParams;
use HubSpotSDK\Crm\Associations\AssociationDeleteParams;
use HubSpotSDK\Crm\Associations\AssociationListParams;
use HubSpotSDK\Crm\Associations\AssociationSearchParams;
use HubSpotSDK\Crm\Associations\AssociationUpdateLabelsParams;
use HubSpotSDK\Crm\BatchResponsePublicDefaultAssociation;
use HubSpotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubSpotSDK\Crm\LabelsBetweenObjectPair;
use HubSpotSDK\Crm\MultiAssociatedObjectWithLabel;
use HubSpotSDK\Crm\ReportCreationResponse;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface AssociationsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|AssociationCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePublicDefaultAssociation>
     *
     * @throws APIException
     */
    public function create(
        string $toObjectID,
        array|AssociationCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $toObjectType Path param
     * @param array<string,mixed>|AssociationListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<MultiAssociatedObjectWithLabel>>
     *
     * @throws APIException
     */
    public function list(
        string $toObjectType,
        array|AssociationListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AssociationDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $toObjectID,
        array|AssociationDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ReportCreationResponse>
     *
     * @throws APIException
     */
    public function requestHighUsageReport(
        int $userID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AssociationSearchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseWithTotalSimplePublicObject>
     *
     * @throws APIException
     */
    public function search(
        string $objectType,
        array|AssociationSearchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $toObjectID Path param
     * @param array<string,mixed>|AssociationUpdateLabelsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<LabelsBetweenObjectPair>
     *
     * @throws APIException
     */
    public function updateLabels(
        string $toObjectID,
        array|AssociationUpdateLabelsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}

<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM\Associations;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Implementation\HasRawResponse;
use HubspotSDK\CRM\Associations\V4\AssociationsV4BatchResponseVoid;
use HubspotSDK\CRM\Associations\V4\AssociationsV4PublicAssociationMultiPost;
use HubspotSDK\CRM\Associations\V4\AssociationsV4ReportCreationResponse;
use HubspotSDK\CRM\CRMAssociationSpec;
use HubspotSDK\CRM\CRMBatchResponsePublicDefaultAssociation;
use HubspotSDK\CRM\CRMCollectionResponseMultiAssociatedObjectWithLabel;
use HubspotSDK\CRM\CRMCreatedResponseLabelsBetweenObjectPair;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface V4Contract
{
    /**
     * @api
     *
     * @param string $objectType
     * @param string $objectID
     * @param string $toObjectType
     * @param list<CRMAssociationSpec> $body
     *
     * @throws APIException
     */
    public function create(
        string $toObjectID,
        $objectType,
        $objectID,
        $toObjectType,
        $body,
        ?RequestOptions $requestOptions = null,
    ): CRMCreatedResponseLabelsBetweenObjectPair;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        string $toObjectID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): CRMCreatedResponseLabelsBetweenObjectPair;

    /**
     * @api
     *
     * @param string $objectType
     * @param string $objectID
     * @param string $after
     * @param int $limit
     *
     * @throws APIException
     */
    public function list(
        string $toObjectType,
        $objectType,
        $objectID,
        $after = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): CRMCollectionResponseMultiAssociatedObjectWithLabel;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): CRMCollectionResponseMultiAssociatedObjectWithLabel;

    /**
     * @api
     *
     * @param string $objectType
     * @param string $objectID
     * @param string $toObjectType
     *
     * @throws APIException
     */
    public function delete(
        string $toObjectID,
        $objectType,
        $objectID,
        $toObjectType,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $toObjectID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $fromObjectType
     * @param list<AssociationsV4PublicAssociationMultiPost> $inputs
     *
     * @return AssociationsV4BatchResponseVoid<HasRawResponse>
     *
     * @throws APIException
     */
    public function archiveLabels(
        string $toObjectType,
        $fromObjectType,
        $inputs,
        ?RequestOptions $requestOptions = null,
    ): AssociationsV4BatchResponseVoid;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return AssociationsV4BatchResponseVoid<HasRawResponse>
     *
     * @throws APIException
     */
    public function archiveLabelsRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): AssociationsV4BatchResponseVoid;

    /**
     * @api
     *
     * @param string $fromObjectType
     * @param string $fromObjectID
     * @param string $toObjectType
     *
     * @throws APIException
     */
    public function createDefault(
        string $toObjectID,
        $fromObjectType,
        $fromObjectID,
        $toObjectType,
        ?RequestOptions $requestOptions = null,
    ): CRMBatchResponsePublicDefaultAssociation;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createDefaultRaw(
        string $toObjectID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): CRMBatchResponsePublicDefaultAssociation;

    /**
     * @api
     *
     * @return AssociationsV4ReportCreationResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function request(
        int $userID,
        ?RequestOptions $requestOptions = null
    ): AssociationsV4ReportCreationResponse;

    /**
     * @api
     *
     * @return AssociationsV4ReportCreationResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function requestRaw(
        int $userID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): AssociationsV4ReportCreationResponse;
}

<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM\Associations;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\BatchResponsePublicDefaultAssociation;
use HubspotSDK\CRM\CollectionResponseMultiAssociatedObjectWithLabel;
use HubspotSDK\CRM\CreatedResponseLabelsBetweenObjectPair;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface V4Contract
{
    /**
     * @api
     *
     * @param string $fromObjectType
     * @param string $fromObjectID
     * @param string $toObjectType
     *
     * @throws APIException
     */
    public function createDefaultAssociation(
        string $toObjectID,
        $fromObjectType,
        $fromObjectID,
        $toObjectType,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicDefaultAssociation;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createDefaultAssociationRaw(
        string $toObjectID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicDefaultAssociation;

    /**
     * @api
     *
     * @param string $objectType
     * @param string $objectID
     * @param string $toObjectType
     *
     * @throws APIException
     */
    public function deleteAssociation(
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
    public function deleteAssociationRaw(
        string $toObjectID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $objectType
     * @param string $objectID
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit the maximum number of results to display per page
     *
     * @throws APIException
     */
    public function listAssociationsByType(
        string $toObjectType,
        $objectType,
        $objectID,
        $after = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseMultiAssociatedObjectWithLabel;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listAssociationsByTypeRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseMultiAssociatedObjectWithLabel;

    /**
     * @api
     *
     * @param string $objectType
     * @param string $objectID
     * @param string $toObjectType
     * @param list<AssociationSpec> $body
     *
     * @throws APIException
     */
    public function updateAssociationLabels(
        string $toObjectID,
        $objectType,
        $objectID,
        $toObjectType,
        $body,
        ?RequestOptions $requestOptions = null,
    ): CreatedResponseLabelsBetweenObjectPair;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateAssociationLabelsRaw(
        string $toObjectID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): CreatedResponseLabelsBetweenObjectPair;
}

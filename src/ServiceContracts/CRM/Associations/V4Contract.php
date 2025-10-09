<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM\Associations;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Associations\V4\AssociationSpec1;
use HubspotSDK\CRM\Associations\V4\BatchResponseVoid;
use HubspotSDK\CRM\Associations\V4\PublicAssociationMultiPost;
use HubspotSDK\CRM\Associations\V4\ReportCreationResponse;
use HubspotSDK\CRM\BatchResponsePublicDefaultAssociation;
use HubspotSDK\CRM\CreatedResponseLabelsBetweenObjectPair;
use HubspotSDK\CRM\MultiAssociatedObjectWithLabel;
use HubspotSDK\Page;
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
     * @param list<AssociationSpec1> $body
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
    ): CreatedResponseLabelsBetweenObjectPair;

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
    ): CreatedResponseLabelsBetweenObjectPair;

    /**
     * @api
     *
     * @param string $objectType
     * @param string $objectID
     * @param string $after
     * @param int $limit
     *
     * @return Page<MultiAssociatedObjectWithLabel>
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
    ): Page;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return Page<MultiAssociatedObjectWithLabel>
     *
     * @throws APIException
     */
    public function listRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

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
     * @param list<PublicAssociationMultiPost> $inputs
     *
     * @throws APIException
     */
    public function archiveLabels(
        string $toObjectType,
        $fromObjectType,
        $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseVoid;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function archiveLabelsRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseVoid;

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
    ): BatchResponsePublicDefaultAssociation;

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
    ): BatchResponsePublicDefaultAssociation;

    /**
     * @api
     *
     * @throws APIException
     */
    public function request(
        int $userID,
        ?RequestOptions $requestOptions = null
    ): ReportCreationResponse;
}

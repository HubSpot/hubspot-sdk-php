<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM\Associations\V4;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Associations\V4\BatchResponseLabelsBetweenObjectPair;
use HubspotSDK\CRM\Associations\V4\BatchResponsePublicAssociationMultiWithLabel;
use HubspotSDK\CRM\Associations\V4\BatchResponseVoid;
use HubspotSDK\CRM\Associations\V4\PublicAssociationMultiArchive;
use HubspotSDK\CRM\Associations\V4\PublicAssociationMultiPost;
use HubspotSDK\CRM\Associations\V4\PublicDefaultAssociationMultiPost;
use HubspotSDK\CRM\Associations\V4\PublicFetchAssociationsBatchRequest;
use HubspotSDK\CRM\BatchResponsePublicDefaultAssociation;
use HubspotSDK\RequestOptions;

interface BatchContract
{
    /**
     * @api
     *
     * @param string $fromObjectType
     * @param list<PublicDefaultAssociationMultiPost> $inputs
     *
     * @throws APIException
     */
    public function batchAssociateDefault(
        string $toObjectType,
        $fromObjectType,
        $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicDefaultAssociation;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchAssociateDefaultRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicDefaultAssociation;

    /**
     * @api
     *
     * @param string $fromObjectType
     * @param list<PublicAssociationMultiPost> $inputs
     *
     * @throws APIException
     */
    public function batchCreate(
        string $toObjectType,
        $fromObjectType,
        $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseLabelsBetweenObjectPair;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchCreateRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseLabelsBetweenObjectPair;

    /**
     * @api
     *
     * @param string $fromObjectType
     * @param list<PublicAssociationMultiArchive> $inputs
     *
     * @throws APIException
     */
    public function batchDelete(
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
    public function batchDeleteRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseVoid;

    /**
     * @api
     *
     * @param string $fromObjectType
     * @param list<PublicAssociationMultiPost> $inputs
     *
     * @throws APIException
     */
    public function batchDeleteLabels(
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
    public function batchDeleteLabelsRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseVoid;

    /**
     * @api
     *
     * @param string $fromObjectType
     * @param list<PublicFetchAssociationsBatchRequest> $inputs
     *
     * @throws APIException
     */
    public function batchRead(
        string $toObjectType,
        $fromObjectType,
        $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicAssociationMultiWithLabel;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchReadRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicAssociationMultiWithLabel;
}

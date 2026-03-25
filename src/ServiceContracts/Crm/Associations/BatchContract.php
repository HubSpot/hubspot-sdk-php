<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Associations;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Associations\BatchResponsePublicAssociationMultiWithLabel;
use HubspotSDK\Crm\Associations\PublicAssociationMultiArchive;
use HubspotSDK\Crm\Associations\PublicAssociationMultiPost;
use HubspotSDK\Crm\Associations\PublicDefaultAssociationMultiPost;
use HubspotSDK\Crm\Associations\PublicFetchAssociationsBatchRequest;
use HubspotSDK\Crm\BatchResponsePublicDefaultAssociation;
use HubspotSDK\Crm\BatchResponseVoid;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type PublicAssociationMultiArchiveShape from \HubspotSDK\Crm\Associations\PublicAssociationMultiArchive
 * @phpstan-import-type PublicDefaultAssociationMultiPostShape from \HubspotSDK\Crm\Associations\PublicDefaultAssociationMultiPost
 * @phpstan-import-type PublicAssociationMultiPostShape from \HubspotSDK\Crm\Associations\PublicAssociationMultiPost
 * @phpstan-import-type PublicFetchAssociationsBatchRequestShape from \HubspotSDK\Crm\Associations\PublicFetchAssociationsBatchRequest
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface BatchContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $toObjectID,
        string $fromObjectType,
        string $fromObjectID,
        string $toObjectType,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponsePublicDefaultAssociation;

    /**
     * @api
     *
     * @param string $toObjectType path param: Specifies the type of the target object in the batch association deletion
     * @param string $fromObjectType path param: Specifies the type of the source object in the batch association deletion
     * @param list<PublicAssociationMultiArchive|PublicAssociationMultiArchiveShape> $inputs Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $toObjectType,
        string $fromObjectType,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseVoid;

    /**
     * @api
     *
     * @param string $toObjectType path param: Specifies the type of the target object in the association
     * @param string $fromObjectType path param: Specifies the type of the source object in the association
     * @param list<PublicDefaultAssociationMultiPost|PublicDefaultAssociationMultiPostShape> $inputs Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createDefault(
        string $toObjectType,
        string $fromObjectType,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponsePublicDefaultAssociation;

    /**
     * @api
     *
     * @param string $toObjectType Path param: The type of the to Object
     * @param string $fromObjectType Path param: The type of the from Object
     * @param list<PublicAssociationMultiPost|PublicAssociationMultiPostShape> $inputs Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteLabels(
        string $toObjectType,
        string $fromObjectType,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseVoid;

    /**
     * @api
     *
     * @param string $toObjectType Path param: The type of the to Object
     * @param string $fromObjectType Path param: The type of the from Object
     * @param list<PublicFetchAssociationsBatchRequest|PublicFetchAssociationsBatchRequestShape> $inputs Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $toObjectType,
        string $fromObjectType,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponsePublicAssociationMultiWithLabel;
}

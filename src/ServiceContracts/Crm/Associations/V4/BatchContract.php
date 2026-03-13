<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Associations\V4;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Associations\BatchResponseVoid;
use HubspotSDK\Crm\Associations\V4\BatchResponseLabelsBetweenObjectPair;
use HubspotSDK\Crm\Associations\V4\BatchResponsePublicAssociationMultiWithLabel;
use HubspotSDK\Crm\Associations\V4\PublicAssociationMultiArchive;
use HubspotSDK\Crm\Associations\V4\PublicAssociationMultiPost;
use HubspotSDK\Crm\Associations\V4\PublicDefaultAssociationMultiPost;
use HubspotSDK\Crm\Associations\V4\PublicFetchAssociationsBatchRequest;
use HubspotSDK\Crm\BatchResponsePublicDefaultAssociation;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type PublicAssociationMultiArchiveShape from \HubspotSDK\Crm\Associations\V4\PublicAssociationMultiArchive
 * @phpstan-import-type PublicDefaultAssociationMultiPostShape from \HubspotSDK\Crm\Associations\V4\PublicDefaultAssociationMultiPost
 * @phpstan-import-type PublicFetchAssociationsBatchRequestShape from \HubspotSDK\Crm\Associations\V4\PublicFetchAssociationsBatchRequest
 * @phpstan-import-type PublicAssociationMultiPostShape from \HubspotSDK\Crm\Associations\V4\PublicAssociationMultiPost
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface BatchContract
{
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
    public function create(
        string $toObjectType,
        string $fromObjectType,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseLabelsBetweenObjectPair;

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

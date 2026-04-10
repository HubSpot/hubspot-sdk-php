<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm\Associations;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\Associations\BatchResponsePublicAssociationMultiWithLabel;
use HubSpotSDK\Crm\Associations\PublicAssociationMultiArchive;
use HubSpotSDK\Crm\Associations\PublicAssociationMultiPost;
use HubSpotSDK\Crm\Associations\PublicDefaultAssociationMultiPost;
use HubSpotSDK\Crm\Associations\PublicFetchAssociationsBatchRequest;
use HubSpotSDK\Crm\BatchResponsePublicDefaultAssociation;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type PublicAssociationMultiArchiveShape from \HubSpotSDK\Crm\Associations\PublicAssociationMultiArchive
 * @phpstan-import-type PublicDefaultAssociationMultiPostShape from \HubSpotSDK\Crm\Associations\PublicDefaultAssociationMultiPost
 * @phpstan-import-type PublicAssociationMultiPostShape from \HubSpotSDK\Crm\Associations\PublicAssociationMultiPost
 * @phpstan-import-type PublicFetchAssociationsBatchRequestShape from \HubSpotSDK\Crm\Associations\PublicFetchAssociationsBatchRequest
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
     * @param string $toObjectType Path param
     * @param string $fromObjectType Path param
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
    ): mixed;

    /**
     * @api
     *
     * @param string $toObjectType Path param
     * @param string $fromObjectType Path param
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
     * @param string $toObjectType Path param
     * @param string $fromObjectType Path param
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
    ): mixed;

    /**
     * @api
     *
     * @param string $toObjectType Path param
     * @param string $fromObjectType Path param
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

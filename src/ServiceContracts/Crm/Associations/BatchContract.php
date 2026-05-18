<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm\Associations;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\BatchResponseLabelsBetweenObjectPair;
use HubSpotSDK\Crm\BatchResponsePublicAssociationMultiWithLabel;
use HubSpotSDK\Crm\BatchResponsePublicDefaultAssociation;
use HubSpotSDK\Crm\PublicAssociationMultiArchive;
use HubSpotSDK\Crm\PublicAssociationMultiPost;
use HubSpotSDK\Crm\PublicDefaultAssociationMultiPost;
use HubSpotSDK\Crm\PublicFetchAssociationsBatchRequest;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type PublicAssociationMultiArchiveShape from \HubSpotSDK\Crm\PublicAssociationMultiArchive
 * @phpstan-import-type PublicDefaultAssociationMultiPostShape from \HubSpotSDK\Crm\PublicDefaultAssociationMultiPost
 * @phpstan-import-type PublicFetchAssociationsBatchRequestShape from \HubSpotSDK\Crm\PublicFetchAssociationsBatchRequest
 * @phpstan-import-type PublicAssociationMultiPostShape from \HubSpotSDK\Crm\PublicAssociationMultiPost
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface BatchContract
{
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
    public function create(
        string $toObjectType,
        string $fromObjectType,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseLabelsBetweenObjectPair;

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

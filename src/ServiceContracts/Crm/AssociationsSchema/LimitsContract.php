<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\AssociationsSchema;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\AssociationsSchema\BatchResponsePublicAssociationDefinitionConfigurationUpdateResult;
use HubspotSDK\Crm\AssociationsSchema\CollectionResponsePublicAssociationDefinitionUserConfigurationNoPaging;
use HubspotSDK\Crm\AssociationsSchema\PublicAssociationDefinitionConfigurationUpdateRequest;
use HubspotSDK\Crm\AssociationsSchema\PublicAssociationSpec;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type PublicAssociationSpecShape from \HubspotSDK\Crm\AssociationsSchema\PublicAssociationSpec
 * @phpstan-import-type PublicAssociationDefinitionConfigurationUpdateRequestShape from \HubspotSDK\Crm\AssociationsSchema\PublicAssociationDefinitionConfigurationUpdateRequest
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): CollectionResponsePublicAssociationDefinitionUserConfigurationNoPaging;

    /**
     * @api
     *
     * @param string $toObjectType Path param
     * @param string $fromObjectType Path param
     * @param list<PublicAssociationSpec|PublicAssociationSpecShape> $inputs Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function batchDelete(
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
     * @param list<PublicAssociationDefinitionConfigurationUpdateRequest|PublicAssociationDefinitionConfigurationUpdateRequestShape> $inputs Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function batchUpdate(
        string $toObjectType,
        string $fromObjectType,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponsePublicAssociationDefinitionConfigurationUpdateResult;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getByObjectTypes(
        string $toObjectType,
        string $fromObjectType,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponsePublicAssociationDefinitionUserConfigurationNoPaging;
}

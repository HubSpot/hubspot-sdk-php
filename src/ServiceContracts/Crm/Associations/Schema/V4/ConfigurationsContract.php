<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Associations\Schema\V4;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Associations\BatchResponseVoid;
use HubspotSDK\Crm\Associations\Schema\V4\BatchResponsePublicAssociationDefinitionConfigurationUpdateResult;
use HubspotSDK\Crm\Associations\Schema\V4\BatchResponsePublicAssociationDefinitionUserConfiguration;
use HubspotSDK\Crm\Associations\Schema\V4\CollectionResponsePublicAssociationDefinitionUserConfiguration;
use HubspotSDK\Crm\Associations\Schema\V4\PublicAssociationDefinitionConfigurationCreateRequest\Category;
use HubspotSDK\RequestOptions;

interface ConfigurationsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePublicAssociationDefinitionUserConfiguration;

    /**
     * @api
     *
     * @param string $toObjectType Path param:
     * @param string $fromObjectType Path param:
     * @param list<array{
     *   category: 'HUBSPOT_DEFINED'|'INTEGRATOR_DEFINED'|'USER_DEFINED'|Category,
     *   maxToObjectIDs: int,
     *   typeID: int,
     * }> $inputs Body param:
     *
     * @throws APIException
     */
    public function batchCreate(
        string $toObjectType,
        string $fromObjectType,
        array $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicAssociationDefinitionUserConfiguration;

    /**
     * @api
     *
     * @param string $toObjectType Path param:
     * @param string $fromObjectType Path param:
     * @param list<array{category: string, typeID: int}> $inputs Body param:
     *
     * @throws APIException
     */
    public function batchDelete(
        string $toObjectType,
        string $fromObjectType,
        array $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseVoid;

    /**
     * @api
     *
     * @param string $toObjectType Path param:
     * @param string $fromObjectType Path param:
     * @param list<array{
     *   category: 'HUBSPOT_DEFINED'|'INTEGRATOR_DEFINED'|'USER_DEFINED'|\HubspotSDK\Crm\Associations\Schema\V4\PublicAssociationDefinitionConfigurationUpdateRequest\Category,
     *   maxToObjectIDs: int,
     *   typeID: int,
     * }> $inputs Body param:
     *
     * @throws APIException
     */
    public function batchUpdate(
        string $toObjectType,
        string $fromObjectType,
        array $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicAssociationDefinitionConfigurationUpdateResult;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getByObjectTypes(
        string $toObjectType,
        string $fromObjectType,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePublicAssociationDefinitionUserConfiguration;
}

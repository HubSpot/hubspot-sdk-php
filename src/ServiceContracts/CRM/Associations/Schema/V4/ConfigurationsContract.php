<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM\Associations\Schema\V4;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Associations\Schema\V4\BatchResponsePublicAssociationDefinitionConfigurationUpdateResult;
use HubspotSDK\CRM\Associations\Schema\V4\BatchResponsePublicAssociationDefinitionUserConfiguration;
use HubspotSDK\CRM\Associations\Schema\V4\CollectionResponsePublicAssociationDefinitionUserConfigurationNoPaging;
use HubspotSDK\CRM\Associations\Schema\V4\PublicAssociationDefinitionConfigurationCreateRequest;
use HubspotSDK\CRM\Associations\Schema\V4\PublicAssociationDefinitionConfigurationUpdateRequest;
use HubspotSDK\CRM\Associations\Schema\V4\PublicAssociationSpec;
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
    ): CollectionResponsePublicAssociationDefinitionUserConfigurationNoPaging;

    /**
     * @api
     *
     * @param string $fromObjectType
     * @param list<PublicAssociationDefinitionConfigurationCreateRequest> $inputs
     *
     * @throws APIException
     */
    public function batchCreateByObjectTypes(
        string $toObjectType,
        $fromObjectType,
        $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicAssociationDefinitionUserConfiguration;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchCreateByObjectTypesRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicAssociationDefinitionUserConfiguration;

    /**
     * @api
     *
     * @param string $fromObjectType
     * @param list<PublicAssociationSpec> $inputs
     *
     * @throws APIException
     */
    public function batchDeleteByObjectTypes(
        string $toObjectType,
        $fromObjectType,
        $inputs,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchDeleteByObjectTypesRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $fromObjectType
     * @param list<PublicAssociationDefinitionConfigurationUpdateRequest> $inputs
     *
     * @throws APIException
     */
    public function batchUpdateByObjectTypes(
        string $toObjectType,
        $fromObjectType,
        $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicAssociationDefinitionConfigurationUpdateResult;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchUpdateByObjectTypesRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicAssociationDefinitionConfigurationUpdateResult;

    /**
     * @api
     *
     * @param string $fromObjectType
     *
     * @throws APIException
     */
    public function getByObjectTypes(
        string $toObjectType,
        $fromObjectType,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePublicAssociationDefinitionUserConfigurationNoPaging;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getByObjectTypesRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePublicAssociationDefinitionUserConfigurationNoPaging;
}

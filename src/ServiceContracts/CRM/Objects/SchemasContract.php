<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM\Objects;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\CRMAssociationDefinition;
use HubspotSDK\CRM\CRMCollectionResponseObjectSchemaNoPaging;
use HubspotSDK\CRM\CRMObjectSchema;
use HubspotSDK\CRM\CRMObjectTypeDefinition;
use HubspotSDK\CRM\CRMObjectTypeDefinitionLabels;
use HubspotSDK\CRM\CRMObjectTypePropertyCreate;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface SchemasContract
{
    /**
     * @api
     *
     * @param list<string> $associatedObjects
     * @param CRMObjectTypeDefinitionLabels $labels
     * @param string $name
     * @param list<CRMObjectTypePropertyCreate> $properties
     * @param list<string> $requiredProperties
     * @param string $primaryDisplayProperty
     * @param list<string> $searchableProperties
     * @param list<string> $secondaryDisplayProperties
     *
     * @throws APIException
     */
    public function create(
        $associatedObjects,
        $labels,
        $name,
        $properties,
        $requiredProperties,
        $primaryDisplayProperty = omit,
        $searchableProperties = omit,
        $secondaryDisplayProperties = omit,
        ?RequestOptions $requestOptions = null,
    ): CRMObjectSchema;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CRMObjectSchema;

    /**
     * @api
     *
     * @param bool $clearDescription
     * @param CRMObjectTypeDefinitionLabels $labels
     * @param string $primaryDisplayProperty
     * @param list<string> $requiredProperties
     * @param bool $restorable
     * @param list<string> $searchableProperties
     * @param list<string> $secondaryDisplayProperties
     *
     * @throws APIException
     */
    public function update(
        string $objectType,
        $clearDescription = omit,
        $labels = omit,
        $primaryDisplayProperty = omit,
        $requiredProperties = omit,
        $restorable = omit,
        $searchableProperties = omit,
        $secondaryDisplayProperties = omit,
        ?RequestOptions $requestOptions = null,
    ): CRMObjectTypeDefinition;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $objectType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): CRMObjectTypeDefinition;

    /**
     * @api
     *
     * @param bool $archived
     *
     * @throws APIException
     */
    public function list(
        $archived = omit,
        ?RequestOptions $requestOptions = null
    ): CRMCollectionResponseObjectSchemaNoPaging;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CRMCollectionResponseObjectSchemaNoPaging;

    /**
     * @api
     *
     * @param bool $archived
     *
     * @throws APIException
     */
    public function delete(
        string $objectType,
        $archived = omit,
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
        string $objectType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $objectType
     *
     * @throws APIException
     */
    public function archiveAssociation(
        string $associationIdentifier,
        $objectType,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function archiveAssociationRaw(
        string $associationIdentifier,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $fromObjectTypeID
     * @param string $toObjectTypeID
     * @param string $name
     *
     * @throws APIException
     */
    public function createAssociation(
        string $objectType,
        $fromObjectTypeID,
        $toObjectTypeID,
        $name = omit,
        ?RequestOptions $requestOptions = null,
    ): CRMAssociationDefinition;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createAssociationRaw(
        string $objectType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): CRMAssociationDefinition;

    /**
     * @api
     *
     * @throws APIException
     */
    public function read(
        string $objectType,
        ?RequestOptions $requestOptions = null
    ): CRMObjectSchema;
}

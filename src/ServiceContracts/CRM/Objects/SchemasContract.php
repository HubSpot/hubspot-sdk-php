<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM\Objects;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Objects\Schemas\AssociationDefinition;
use HubspotSDK\CRM\Objects\Schemas\CollectionResponseObjectSchemaNoPaging;
use HubspotSDK\CRM\Objects\Schemas\ObjectSchema;
use HubspotSDK\CRM\Objects\Schemas\ObjectTypeDefinition;
use HubspotSDK\CRM\Objects\Schemas\ObjectTypeDefinitionLabels;
use HubspotSDK\CRM\Objects\Schemas\ObjectTypePropertyCreate;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface SchemasContract
{
    /**
     * @api
     *
     * @param list<string> $associatedObjects
     * @param ObjectTypeDefinitionLabels $labels
     * @param string $name
     * @param list<ObjectTypePropertyCreate> $properties
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
    ): ObjectSchema;

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
    ): ObjectSchema;

    /**
     * @api
     *
     * @param bool $clearDescription
     * @param ObjectTypeDefinitionLabels $labels
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
    ): ObjectTypeDefinition;

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
    ): ObjectTypeDefinition;

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
    ): CollectionResponseObjectSchemaNoPaging;

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
    ): CollectionResponseObjectSchemaNoPaging;

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
    ): AssociationDefinition;

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
    ): AssociationDefinition;

    /**
     * @api
     *
     * @throws APIException
     */
    public function read(
        string $objectType,
        ?RequestOptions $requestOptions = null
    ): ObjectSchema;
}

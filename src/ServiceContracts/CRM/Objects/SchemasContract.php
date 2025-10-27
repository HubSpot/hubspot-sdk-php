<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM\Objects;

use HubspotSDK\CollectionResponseObjectSchemaNoPaging;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Objects\Schemas\ObjectSchema;
use HubspotSDK\CRM\Objects\Schemas\ObjectTypeDefinition;
use HubspotSDK\CRM\Objects\Schemas\ObjectTypePropertyCreate;
use HubspotSDK\Events\EventDefinitions\AssociationDefinition;
use HubspotSDK\ObjectTypeDefinitionLabels;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface SchemasContract
{
    /**
     * @api
     *
     * @param list<string> $associatedObjects associations defined for this object type
     * @param ObjectTypeDefinitionLabels $labels
     * @param string $name A unique name for this object. For internal use only.
     * @param list<ObjectTypePropertyCreate> $properties properties defined for this object type
     * @param list<string> $requiredProperties the names of properties that should be **required** when creating an object of this type
     * @param string $description
     * @param string $primaryDisplayProperty The name of the primary property for this object. This will be displayed as primary on the HubSpot record page for this object type.
     * @param list<string> $searchableProperties names of properties that will be indexed for this object type in by HubSpot's product search
     * @param list<string> $secondaryDisplayProperties The names of secondary properties for this object. These will be displayed as secondary on the HubSpot record page for this object type.
     *
     * @throws APIException
     */
    public function create(
        $associatedObjects,
        $labels,
        $name,
        $properties,
        $requiredProperties,
        $description = omit,
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
     * @param string $description
     * @param ObjectTypeDefinitionLabels $labels
     * @param string $primaryDisplayProperty The name of the primary property for this object. This will be displayed as primary on the HubSpot record page for this object type.
     * @param list<string> $requiredProperties the names of properties that should be **required** when creating an object of this type
     * @param bool $restorable
     * @param list<string> $searchableProperties names of properties that will be indexed for this object type in by HubSpot's product search
     * @param list<string> $secondaryDisplayProperties The names of secondary properties for this object. These will be displayed as secondary on the HubSpot record page for this object type.
     *
     * @throws APIException
     */
    public function update(
        string $objectType,
        $clearDescription = omit,
        $description = omit,
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
     * @param bool $archived whether to return only results that have been archived
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
     * @param bool $archived whether to return only results that have been archived
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

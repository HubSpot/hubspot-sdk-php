<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\MediaBridge;

use HubspotSDK\CollectionResponseObjectSchemaNoPaging;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Objects\Schemas\ObjectSchema;
use HubspotSDK\CRM\Objects\Schemas\ObjectTypeDefinition;
use HubspotSDK\Events\EventDefinitions\AssociationDefinition;
use HubspotSDK\ObjectTypeDefinitionLabels;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface SchemasContract
{
    /**
     * @api
     *
     * @param string $appID
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
        $appID,
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
     * @throws APIException
     */
    public function list(
        string $appID,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseObjectSchemaNoPaging;

    /**
     * @api
     *
     * @param string $appID
     * @param string $fromObjectTypeID
     * @param string $toObjectTypeID
     * @param string $name
     *
     * @throws APIException
     */
    public function createAssociation(
        string $objectType,
        $appID,
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
     * @param string $appID
     * @param string $objectType
     *
     * @throws APIException
     */
    public function deleteAssociation(
        string $associationID,
        $appID,
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
    public function deleteAssociationRaw(
        string $associationID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $appID
     *
     * @throws APIException
     */
    public function get(
        string $objectType,
        $appID,
        ?RequestOptions $requestOptions = null
    ): ObjectSchema;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        string $objectType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ObjectSchema;
}

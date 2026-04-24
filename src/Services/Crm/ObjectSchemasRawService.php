<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm;

use HubSpotSDK\BaseAssociationDefinition;
use HubSpotSDK\BaseObjectTypeDefinition;
use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\ObjectSchemas\CollectionResponseObjectSchemaNoPaging;
use HubSpotSDK\Crm\ObjectSchemas\ObjectSchema;
use HubSpotSDK\Crm\ObjectSchemas\ObjectSchemaCreateAssociationParams;
use HubSpotSDK\Crm\ObjectSchemas\ObjectSchemaCreateParams;
use HubSpotSDK\Crm\ObjectSchemas\ObjectSchemaDeleteAssociationParams;
use HubSpotSDK\Crm\ObjectSchemas\ObjectSchemaDeleteParams;
use HubSpotSDK\Crm\ObjectSchemas\ObjectSchemaGetParams;
use HubSpotSDK\Crm\ObjectSchemas\ObjectSchemaListParams;
use HubSpotSDK\Crm\ObjectSchemas\ObjectSchemaUpdateParams;
use HubSpotSDK\Crm\ObjectSchemas\ObjectTypePropertyCreate;
use HubSpotSDK\ObjectTypeDefinitionLabels;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Crm\ObjectSchemasRawContract;

/**
 * @phpstan-import-type ObjectTypePropertyCreateShape from \HubSpotSDK\Crm\ObjectSchemas\ObjectTypePropertyCreate
 * @phpstan-import-type ObjectTypeDefinitionLabelsShape from \HubSpotSDK\ObjectTypeDefinitionLabels
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class ObjectSchemasRawService implements ObjectSchemasRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new custom object schema by defining its properties and associations.
     *
     * @param array{
     *   allowsSensitiveProperties: bool,
     *   associatedObjects: list<string>,
     *   labels: ObjectTypeDefinitionLabels|ObjectTypeDefinitionLabelsShape,
     *   name: string,
     *   properties: list<ObjectTypePropertyCreate|ObjectTypePropertyCreateShape>,
     *   requiredProperties: list<string>,
     *   searchableProperties: list<string>,
     *   secondaryDisplayProperties: list<string>,
     *   description?: string,
     *   primaryDisplayProperty?: string,
     * }|ObjectSchemaCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ObjectSchema>
     *
     * @throws APIException
     */
    public function create(
        array|ObjectSchemaCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ObjectSchemaCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm-object-schemas/2026-03/schemas',
            body: (object) $parsed,
            options: $options,
            convert: ObjectSchema::class,
        );
    }

    /**
     * @api
     *
     * Update attributes of a custom object schema, such as properties and labels, using the object type ID or fully qualified name.
     *
     * @param array{
     *   clearDescription: bool,
     *   allowsSensitiveProperties?: bool,
     *   description?: string,
     *   labels?: ObjectTypeDefinitionLabels|ObjectTypeDefinitionLabelsShape,
     *   primaryDisplayProperty?: string,
     *   requiredProperties?: list<string>,
     *   restorable?: bool,
     *   searchableProperties?: list<string>,
     *   secondaryDisplayProperties?: list<string>,
     * }|ObjectSchemaUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BaseObjectTypeDefinition>
     *
     * @throws APIException
     */
    public function update(
        string $objectType,
        array|ObjectSchemaUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ObjectSchemaUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['crm-object-schemas/2026-03/schemas/%1$s', $objectType],
            body: (object) $parsed,
            options: $options,
            convert: BaseObjectTypeDefinition::class,
        );
    }

    /**
     * @api
     *
     * Retrieve all custom object schemas, with options to include property definitions, association definitions, and audit metadata.
     *
     * @param array{
     *   archived?: bool,
     *   includeAssociationDefinitions?: bool,
     *   includeAuditMetadata?: bool,
     *   includePropertyDefinitions?: bool,
     * }|ObjectSchemaListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseObjectSchemaNoPaging>
     *
     * @throws APIException
     */
    public function list(
        array|ObjectSchemaListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ObjectSchemaListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'crm-object-schemas/2026-03/schemas',
            query: $parsed,
            options: $options,
            convert: CollectionResponseObjectSchemaNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Remove a custom object schema from the account using its object type ID or fully qualified name.
     *
     * @param array{archived?: bool}|ObjectSchemaDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $objectType,
        array|ObjectSchemaDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ObjectSchemaDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['crm-object-schemas/2026-03/schemas/%1$s', $objectType],
            query: $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Create a new association between the specified object type and another object type. This operation requires the definition of the association attributes, such as the primary and target object type IDs.
     *
     * @param array{
     *   fromObjectTypeID: string, toObjectTypeID: string, name?: string
     * }|ObjectSchemaCreateAssociationParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BaseAssociationDefinition>
     *
     * @throws APIException
     */
    public function createAssociation(
        string $objectType,
        array|ObjectSchemaCreateAssociationParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ObjectSchemaCreateAssociationParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'crm-object-schemas/2026-03/schemas/%1$s/associations', $objectType,
            ],
            body: (object) $parsed,
            options: $options,
            convert: BaseAssociationDefinition::class,
        );
    }

    /**
     * @api
     *
     * Remove an association between two object types identified by the association identifier and object type. This operation is irreversible and will permanently delete the specified association.
     *
     * @param array{objectType: string}|ObjectSchemaDeleteAssociationParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteAssociation(
        string $associationIdentifier,
        array|ObjectSchemaDeleteAssociationParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ObjectSchemaDeleteAssociationParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'crm-object-schemas/2026-03/schemas/%1$s/associations/%2$s',
                $objectType,
                $associationIdentifier,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve details of a custom object schema, including its properties and associations, using the object type ID or fully qualified name.
     *
     * @param array{
     *   includeAssociationDefinitions?: bool,
     *   includeAuditMetadata?: bool,
     *   includePropertyDefinitions?: bool,
     * }|ObjectSchemaGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ObjectSchema>
     *
     * @throws APIException
     */
    public function get(
        string $objectType,
        array|ObjectSchemaGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ObjectSchemaGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm-object-schemas/2026-03/schemas/%1$s', $objectType],
            query: $parsed,
            options: $options,
            convert: ObjectSchema::class,
        );
    }
}

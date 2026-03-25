<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\CollectionResponseObjectSchemaNoPaging;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\ObjectSchemas\ObjectSchemaCreateAssociationParams;
use HubspotSDK\Crm\ObjectSchemas\ObjectSchemaCreateParams;
use HubspotSDK\Crm\ObjectSchemas\ObjectSchemaDeleteAssociationParams;
use HubspotSDK\Crm\ObjectSchemas\ObjectSchemaDeleteParams;
use HubspotSDK\Crm\ObjectSchemas\ObjectSchemaGetParams;
use HubspotSDK\Crm\ObjectSchemas\ObjectSchemaListParams;
use HubspotSDK\Crm\ObjectSchemas\ObjectSchemaUpdateParams;
use HubspotSDK\Crm\ObjectSchemas\ObjectTypePropertyCreate;
use HubspotSDK\Events\AssociationDefinition;
use HubspotSDK\ObjectSchema;
use HubspotSDK\ObjectTypeDefinition;
use HubspotSDK\ObjectTypeDefinitionLabels;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\ObjectSchemasRawContract;

/**
 * @phpstan-import-type ObjectTypePropertyCreateShape from \HubspotSDK\Crm\ObjectSchemas\ObjectTypePropertyCreate
 * @phpstan-import-type ObjectTypeDefinitionLabelsShape from \HubspotSDK\ObjectTypeDefinitionLabels
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
     * @return BaseResponse<ObjectTypeDefinition>
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
            convert: ObjectTypeDefinition::class,
        );
    }

    /**
     * @api
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
     * @param array{
     *   fromObjectTypeID: string, toObjectTypeID: string, name?: string
     * }|ObjectSchemaCreateAssociationParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AssociationDefinition>
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
            convert: AssociationDefinition::class,
        );
    }

    /**
     * @api
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

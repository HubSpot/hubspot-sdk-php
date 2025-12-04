<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Objects;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Objects\Schemas\ObjectSchema;
use HubspotSDK\Crm\Objects\Schemas\ObjectsSchemasObjectTypeDefinition;
use HubspotSDK\Crm\Objects\Schemas\SchemaCreateAssociationParams;
use HubspotSDK\Crm\Objects\Schemas\SchemaCreateParams;
use HubspotSDK\Crm\Objects\Schemas\SchemaDeleteAssociationParams;
use HubspotSDK\Crm\Objects\Schemas\SchemaDeleteParams;
use HubspotSDK\Crm\Objects\Schemas\SchemaListParams;
use HubspotSDK\Crm\Objects\Schemas\SchemaListResponse;
use HubspotSDK\Crm\Objects\Schemas\SchemaUpdateParams;
use HubspotSDK\Events\EventDefinitions\AssociationDefinition;
use HubspotSDK\ObjectTypeDefinitionLabels;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Objects\SchemasContract;

final class SchemasService implements SchemasContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param array{
     *   associatedObjects: list<string>,
     *   labels: array{plural?: string, singular?: string}|ObjectTypeDefinitionLabels,
     *   name: string,
     *   properties: list<array{
     *     fieldType: string,
     *     label: string,
     *     name: string,
     *     type: 'bool'|'date'|'datetime'|'enumeration'|'number'|'string',
     *     description?: string,
     *     displayOrder?: int,
     *     formField?: bool,
     *     groupName?: string,
     *     hasUniqueValue?: bool,
     *     hidden?: bool,
     *     numberDisplayHint?: 'currency'|'duration'|'formatted'|'percentage'|'probability'|'unformatted',
     *     options?: list<array<mixed>>,
     *     optionSortStrategy?: 'ALPHABETICAL'|'DISPLAY_ORDER',
     *     referencedObjectType?: string,
     *     searchableInGlobalSearch?: bool,
     *     showCurrencySymbol?: bool,
     *     textDisplayHint?: 'domain_name'|'email'|'ip_address'|'multi_line'|'phone_number'|'physical_address'|'postal_code'|'unformatted_single_line',
     *   }>,
     *   requiredProperties: list<string>,
     *   description?: string,
     *   primaryDisplayProperty?: string,
     *   searchableProperties?: list<string>,
     *   secondaryDisplayProperties?: list<string>,
     * }|SchemaCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|SchemaCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): ObjectSchema {
        [$parsed, $options] = SchemaCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm-object-schemas/v3/schemas',
            body: (object) $parsed,
            options: $options,
            convert: ObjectSchema::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   clearDescription?: bool,
     *   description?: string,
     *   labels?: array{plural?: string, singular?: string}|ObjectTypeDefinitionLabels,
     *   primaryDisplayProperty?: string,
     *   requiredProperties?: list<string>,
     *   restorable?: bool,
     *   searchableProperties?: list<string>,
     *   secondaryDisplayProperties?: list<string>,
     * }|SchemaUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $objectType,
        array|SchemaUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ObjectsSchemasObjectTypeDefinition {
        [$parsed, $options] = SchemaUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['crm-object-schemas/v3/schemas/%1$s', $objectType],
            body: (object) $parsed,
            options: $options,
            convert: ObjectsSchemasObjectTypeDefinition::class,
        );
    }

    /**
     * @api
     *
     * @param array{archived?: bool}|SchemaListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|SchemaListParams $params,
        ?RequestOptions $requestOptions = null
    ): SchemaListResponse {
        [$parsed, $options] = SchemaListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'crm-object-schemas/v3/schemas',
            query: $parsed,
            options: $options,
            convert: SchemaListResponse::class,
        );
    }

    /**
     * @api
     *
     * @param array{archived?: bool}|SchemaDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $objectType,
        array|SchemaDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = SchemaDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['crm-object-schemas/v3/schemas/%1$s', $objectType],
            query: $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   fromObjectTypeId: string, toObjectTypeId: string, name?: string
     * }|SchemaCreateAssociationParams $params
     *
     * @throws APIException
     */
    public function createAssociation(
        string $objectType,
        array|SchemaCreateAssociationParams $params,
        ?RequestOptions $requestOptions = null,
    ): AssociationDefinition {
        [$parsed, $options] = SchemaCreateAssociationParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['crm-object-schemas/v3/schemas/%1$s/associations', $objectType],
            body: (object) $parsed,
            options: $options,
            convert: AssociationDefinition::class,
        );
    }

    /**
     * @api
     *
     * @param array{objectType: string}|SchemaDeleteAssociationParams $params
     *
     * @throws APIException
     */
    public function deleteAssociation(
        string $associationIdentifier,
        array|SchemaDeleteAssociationParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = SchemaDeleteAssociationParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'crm-object-schemas/v3/schemas/%1$s/associations/%2$s',
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
     * @throws APIException
     */
    public function get(
        string $objectType,
        ?RequestOptions $requestOptions = null
    ): ObjectSchema {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm-object-schemas/v3/schemas/%1$s', $objectType],
            options: $requestOptions,
            convert: ObjectSchema::class,
        );
    }
}

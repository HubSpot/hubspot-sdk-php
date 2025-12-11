<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Objects\Custom;

use HubspotSDK\AssociationSpec;
use HubspotSDK\AssociationSpec\AssociationCategory;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\BatchResponseSimplePublicObject;
use HubspotSDK\Crm\BatchResponseSimplePublicUpsertObject;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Objects\Custom\BatchContract;

final class BatchService implements BatchContract
{
    /**
     * @api
     */
    public BatchRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BatchRawService($client);
    }

    /**
     * @api
     *
     * Create a batch of objects
     *
     * @param list<array{
     *   associations: list<array{
     *     to: array{id: string}|PublicObjectID,
     *     types: list<array{
     *       associationCategory: 'HUBSPOT_DEFINED'|'INTEGRATOR_DEFINED'|'USER_DEFINED'|AssociationCategory,
     *       associationTypeID: int,
     *     }|AssociationSpec>,
     *   }>,
     *   properties: array<string,string>,
     *   objectWriteTraceID?: string,
     * }> $inputs
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseSimplePublicObject {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a batch of objects by internal ID, or unique property values
     *
     * @param list<array{
     *   id: string,
     *   properties: array<string,string>,
     *   idProperty?: string,
     *   objectWriteTraceID?: string,
     * }> $inputs
     *
     * @throws APIException
     */
    public function update(
        string $objectType,
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseSimplePublicObject {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Archive a batch of objects by ID
     *
     * @param list<array{id: string}> $inputs
     *
     * @throws APIException
     */
    public function delete(
        string $objectType,
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve records by record ID or include the `idProperty` parameter to retrieve records by a custom unique value property.
     *
     * @param string $objectType Path param:
     * @param list<array{id: string}> $inputs Body param:
     * @param list<string> $properties body param: Key-value pairs for setting properties for the new object
     * @param list<string> $propertiesWithHistory body param: Key-value pairs for setting properties for the new object and their histories
     * @param bool $archived query param: Whether to return only results that have been archived
     * @param string $idProperty body param: A unique property used to identify objects instead of the default ID
     *
     * @throws APIException
     */
    public function get(
        string $objectType,
        array $inputs,
        array $properties,
        array $propertiesWithHistory,
        bool $archived = false,
        ?string $idProperty = null,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSimplePublicObject {
        $params = Util::removeNulls(
            [
                'inputs' => $inputs,
                'properties' => $properties,
                'propertiesWithHistory' => $propertiesWithHistory,
                'archived' => $archived,
                'idProperty' => $idProperty,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create or update records identified by a unique property value as specified by the `idProperty` query param. `idProperty` query param refers to a property whose values are unique for the object.
     *
     * @param list<array{
     *   id: string,
     *   properties: array<string,string>,
     *   idProperty?: string,
     *   objectWriteTraceID?: string,
     * }> $inputs
     *
     * @throws APIException
     */
    public function upsert(
        string $objectType,
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseSimplePublicUpsertObject {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->upsert($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}

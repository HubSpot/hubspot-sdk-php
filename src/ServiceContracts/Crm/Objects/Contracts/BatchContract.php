<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects\Contracts;

use HubspotSDK\AssociationSpec;
use HubspotSDK\AssociationSpec\AssociationCategory;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\BatchResponseSimplePublicObject;
use HubspotSDK\Crm\BatchResponseSimplePublicUpsertObject;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;

interface BatchContract
{
    /**
     * @api
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
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseSimplePublicObject;

    /**
     * @api
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
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseSimplePublicObject;

    /**
     * @api
     *
     * @param list<array{id: string}> $inputs
     *
     * @throws APIException
     */
    public function delete(
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param list<array{id: string}> $inputs Body param:
     * @param list<string> $properties body param: Key-value pairs for setting properties for the new object
     * @param list<string> $propertiesWithHistory body param: Key-value pairs for setting properties for the new object and their histories
     * @param bool $archived query param: Whether to return only results that have been archived
     * @param string $idProperty body param: A unique property used to identify objects instead of the default ID
     *
     * @throws APIException
     */
    public function get(
        array $inputs,
        array $properties,
        array $propertiesWithHistory,
        bool $archived = false,
        ?string $idProperty = null,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSimplePublicObject;

    /**
     * @api
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
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseSimplePublicUpsertObject;
}

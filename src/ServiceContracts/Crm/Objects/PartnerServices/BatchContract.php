<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects\PartnerServices;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\BatchResponseSimplePublicObject;
use HubspotSDK\RequestOptions;

interface BatchContract
{
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
}

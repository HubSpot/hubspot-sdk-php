<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm\Objects\PartnerServices;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Crm\Objects\BatchResponseSimplePublicObject;
use HubSpotSDK\Crm\Objects\SimplePublicObjectBatchInput;
use HubSpotSDK\Crm\Objects\SimplePublicObjectID;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Crm\Objects\PartnerServices\BatchContract;

/**
 * @phpstan-import-type SimplePublicObjectBatchInputShape from \HubSpotSDK\Crm\Objects\SimplePublicObjectBatchInput
 * @phpstan-import-type SimplePublicObjectIDShape from \HubSpotSDK\Crm\Objects\SimplePublicObjectID
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
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
     * Update multiple partner services using their internal IDs or unique property values. This operation allows for batch processing of updates, ensuring efficient synchronization of service data between HubSpot and other systems.
     *
     * @param list<SimplePublicObjectBatchInput|SimplePublicObjectBatchInputShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): BatchResponseSimplePublicObject {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve records by record ID or include the `idProperty` parameter to retrieve records by a custom unique value property.
     *
     * @param list<SimplePublicObjectID|SimplePublicObjectIDShape> $inputs Body param
     * @param list<string> $properties body param: Key-value pairs for setting properties for the new object
     * @param list<string> $propertiesWithHistory body param: Key-value pairs for setting properties for the new object and their histories
     * @param bool $archived query param: Whether to return only results that have been archived
     * @param string $idProperty Body param: When using a custom unique value property to retrieve records, the name of the property. Do not include this parameter if retrieving by record ID.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        array $inputs,
        array $properties,
        array $propertiesWithHistory,
        bool $archived = false,
        ?string $idProperty = null,
        RequestOptions|array|null $requestOptions = null,
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
        $response = $this->raw->get(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}

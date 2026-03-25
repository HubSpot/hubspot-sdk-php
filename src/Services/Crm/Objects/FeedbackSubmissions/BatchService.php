<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Objects\FeedbackSubmissions;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Objects\BatchResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\SimplePublicObjectID;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Objects\FeedbackSubmissions\BatchContract;

/**
 * @phpstan-import-type SimplePublicObjectIDShape from \HubspotSDK\Crm\Objects\SimplePublicObjectID
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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

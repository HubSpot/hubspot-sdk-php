<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Objects\PartnerClients;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Objects\BatchResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\SimplePublicObjectBatchInput;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Objects\PartnerClients\BatchContract;

/**
 * @phpstan-import-type SimplePublicObjectBatchInputShape from \HubspotSDK\Crm\Objects\SimplePublicObjectBatchInput
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
     * This endpoint allows you to update several partner client records at once by providing a batch of CRM object records with their respective IDs and properties. It is useful for synchronizing data across systems or making bulk updates efficiently.
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
}

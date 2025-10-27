<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM\Objects\PartnerClients;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\BatchResponseSimplePublicObject;
use HubspotSDK\CRM\Objects\PartnerClients\Batch\BatchBatchGetParams;
use HubspotSDK\CRM\Objects\PartnerClients\Batch\BatchBatchUpdateParams;
use HubspotSDK\CRM\SimplePublicObjectBatchInput;
use HubspotSDK\CRM\SimplePublicObjectID;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CRM\Objects\PartnerClients\BatchContract;

use const HubspotSDK\Core\OMIT as omit;

final class BatchService implements BatchContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Read a batch of objects by internal ID, or unique property values
     *
     * @param list<SimplePublicObjectID> $inputs
     * @param list<string> $properties key-value pairs for setting properties for the new object
     * @param list<string> $propertiesWithHistory key-value pairs for setting properties for the new object and their histories
     * @param bool $archived whether to return only results that have been archived
     * @param string $idProperty When using a custom unique value property to retrieve records, the name of the property. Do not include this parameter if retrieving by record ID.
     *
     * @throws APIException
     */
    public function batchGet(
        $inputs,
        $properties,
        $propertiesWithHistory,
        $archived = omit,
        $idProperty = omit,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSimplePublicObject {
        $params = [
            'inputs' => $inputs,
            'properties' => $properties,
            'propertiesWithHistory' => $propertiesWithHistory,
            'archived' => $archived,
            'idProperty' => $idProperty,
        ];

        return $this->batchGetRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchGetRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseSimplePublicObject {
        [$parsed, $options] = BatchBatchGetParams::parseRequest(
            $params,
            $requestOptions
        );
        $query_params = ['archived'];

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/partner_clients/batch/read',
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponseSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Update a batch of objects
     *
     * @param list<SimplePublicObjectBatchInput> $inputs
     *
     * @throws APIException
     */
    public function batchUpdate(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseSimplePublicObject {
        $params = ['inputs' => $inputs];

        return $this->batchUpdateRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchUpdateRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseSimplePublicObject {
        [$parsed, $options] = BatchBatchUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/partner_clients/batch/update',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseSimplePublicObject::class,
        );
    }
}

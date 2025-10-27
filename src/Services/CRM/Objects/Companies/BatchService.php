<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM\Objects\Companies;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\BatchResponseSimplePublicObject;
use HubspotSDK\CRM\BatchResponseSimplePublicUpsertObject;
use HubspotSDK\CRM\Objects\Companies\Batch\BatchCreateParams;
use HubspotSDK\CRM\Objects\Companies\Batch\BatchDeleteParams;
use HubspotSDK\CRM\Objects\Companies\Batch\BatchReadParams;
use HubspotSDK\CRM\Objects\Companies\Batch\BatchUpdateParams;
use HubspotSDK\CRM\Objects\Companies\Batch\BatchUpsertParams;
use HubspotSDK\CRM\SimplePublicObjectBatchInput;
use HubspotSDK\CRM\SimplePublicObjectBatchInputForCreate;
use HubspotSDK\CRM\SimplePublicObjectBatchInputUpsert;
use HubspotSDK\CRM\SimplePublicObjectID;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CRM\Objects\Companies\BatchContract;

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
     * Create a batch of companies. The `inputs` array can contain a `properties` object to define property values for each company, along with an `associations` array to define [associations](https://developers.hubspot.com/docs/guides/api/crm/associations/associations-v4) with other CRM records.
     *
     * @param list<SimplePublicObjectBatchInputForCreate> $inputs
     *
     * @throws APIException
     */
    public function create(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseSimplePublicObject {
        $params = ['inputs' => $inputs];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseSimplePublicObject {
        [$parsed, $options] = BatchCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/companies/batch/create',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Update a batch of companies by ID.
     *
     * @param list<SimplePublicObjectBatchInput> $inputs
     *
     * @throws APIException
     */
    public function update(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseSimplePublicObject {
        $params = ['inputs' => $inputs];

        return $this->updateRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseSimplePublicObject {
        [$parsed, $options] = BatchUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/companies/batch/update',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Delete a batch of companies by ID. Deleted companies can be restored within 90 days of deletion. Learn more about [restoring records](https://knowledge.hubspot.com/records/restore-deleted-records).
     *
     * @param list<SimplePublicObjectID> $inputs
     *
     * @throws APIException
     */
    public function delete(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['inputs' => $inputs];

        return $this->deleteRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = BatchDeleteParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/companies/batch/archive',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve a batch of companies by ID (`companyId`) or by a unique property (`idProperty`). You can specify what is returned using the `properties` query parameter.
     *
     * @param list<SimplePublicObjectID> $inputs
     * @param list<string> $properties key-value pairs for setting properties for the new object
     * @param list<string> $propertiesWithHistory key-value pairs for setting properties for the new object and their histories
     * @param bool $archived whether to return only results that have been archived
     * @param string $idProperty When using a custom unique value property to retrieve records, the name of the property. Do not include this parameter if retrieving by record ID.
     *
     * @throws APIException
     */
    public function read(
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

        return $this->readRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function readRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseSimplePublicObject {
        [$parsed, $options] = BatchReadParams::parseRequest(
            $params,
            $requestOptions
        );
        $query_params = ['archived'];

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/companies/batch/read',
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponseSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Create or update companies identified by a unique property value as specified by the `idProperty` query parameter. `idProperty` query param refers to a property whose values are unique for the object.
     *
     * @param list<SimplePublicObjectBatchInputUpsert> $inputs
     *
     * @throws APIException
     */
    public function upsert(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseSimplePublicUpsertObject {
        $params = ['inputs' => $inputs];

        return $this->upsertRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function upsertRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseSimplePublicUpsertObject {
        [$parsed, $options] = BatchUpsertParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/companies/batch/upsert',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseSimplePublicUpsertObject::class,
        );
    }
}

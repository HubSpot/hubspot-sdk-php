<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM\Objects;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Objects\CRMObjectsBatchResponseSimplePublicUpsertObject;
use HubspotSDK\CRM\Objects\CRMObjectsCollectionResponseSimplePublicObjectWithAssociations;
use HubspotSDK\CRM\Objects\CRMObjectsCollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\CRM\Objects\CRMObjectsCreatedResponseSimplePublicObject;
use HubspotSDK\CRM\Objects\CRMObjectsFilterGroup;
use HubspotSDK\CRM\Objects\CRMObjectsPublicAssociationsForObject;
use HubspotSDK\CRM\Objects\CRMObjectsSimplePublicObject;
use HubspotSDK\CRM\Objects\CRMObjectsSimplePublicObjectBatchInputUpsert;
use HubspotSDK\CRM\Objects\CRMObjectsSimplePublicObjectWithAssociations;
use HubspotSDK\CRM\Objects\Deals\DealCreateParams;
use HubspotSDK\CRM\Objects\Deals\DealListParams;
use HubspotSDK\CRM\Objects\Deals\DealMergeParams;
use HubspotSDK\CRM\Objects\Deals\DealReadParams;
use HubspotSDK\CRM\Objects\Deals\DealSearchParams;
use HubspotSDK\CRM\Objects\Deals\DealUpdateParams;
use HubspotSDK\CRM\Objects\Deals\DealUpsertParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CRM\Objects\DealsContract;
use HubspotSDK\Services\CRM\Objects\Deals\AssociationsService;
use HubspotSDK\Services\CRM\Objects\Deals\BatchService;

use const HubspotSDK\Core\OMIT as omit;

final class DealsService implements DealsContract
{
    /**
     * @@api
     */
    public AssociationsService $associations;

    /**
     * @@api
     */
    public BatchService $batch;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->associations = new AssociationsService($client);
        $this->batch = new BatchService($client);
    }

    /**
     * @api
     *
     * Create
     *
     * @param array<string, string> $properties
     * @param list<CRMObjectsPublicAssociationsForObject> $associations
     *
     * @throws APIException
     */
    public function create(
        $properties,
        $associations = omit,
        ?RequestOptions $requestOptions = null
    ): CRMObjectsCreatedResponseSimplePublicObject {
        $params = ['properties' => $properties, 'associations' => $associations];

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
    ): CRMObjectsCreatedResponseSimplePublicObject {
        [$parsed, $options] = DealCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/0-3',
            body: (object) $parsed,
            options: $options,
            convert: CRMObjectsCreatedResponseSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Update
     *
     * @param array<string, string> $properties
     * @param string $idProperty
     *
     * @throws APIException
     */
    public function update(
        string $dealID,
        $properties,
        $idProperty = omit,
        ?RequestOptions $requestOptions = null,
    ): CRMObjectsSimplePublicObject {
        $params = ['properties' => $properties, 'idProperty' => $idProperty];

        return $this->updateRaw($dealID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $dealID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CRMObjectsSimplePublicObject {
        [$parsed, $options] = DealUpdateParams::parseRequest(
            $params,
            $requestOptions
        );
        $query_params = ['idProperty'];

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['crm/v3/objects/0-3/%1$s', $dealID],
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: CRMObjectsSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * List
     *
     * @param string $after
     * @param bool $archived
     * @param list<string> $associations
     * @param int $limit
     * @param list<string> $properties
     * @param list<string> $propertiesWithHistory
     *
     * @throws APIException
     */
    public function list(
        $after = omit,
        $archived = omit,
        $associations = omit,
        $limit = omit,
        $properties = omit,
        $propertiesWithHistory = omit,
        ?RequestOptions $requestOptions = null,
    ): CRMObjectsCollectionResponseSimplePublicObjectWithAssociations {
        $params = [
            'after' => $after,
            'archived' => $archived,
            'associations' => $associations,
            'limit' => $limit,
            'properties' => $properties,
            'propertiesWithHistory' => $propertiesWithHistory,
        ];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CRMObjectsCollectionResponseSimplePublicObjectWithAssociations {
        [$parsed, $options] = DealListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'crm/v3/objects/0-3',
            query: $parsed,
            options: $options,
            convert: CRMObjectsCollectionResponseSimplePublicObjectWithAssociations::class,
        );
    }

    /**
     * @api
     *
     * Archive
     *
     * @throws APIException
     */
    public function delete(
        string $dealID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['crm/v3/objects/0-3/%1$s', $dealID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Merge two deals with same type
     *
     * @param string $objectIDToMerge
     * @param string $primaryObjectID
     *
     * @throws APIException
     */
    public function merge(
        $objectIDToMerge,
        $primaryObjectID,
        ?RequestOptions $requestOptions = null
    ): CRMObjectsSimplePublicObject {
        $params = [
            'objectIDToMerge' => $objectIDToMerge,
            'primaryObjectID' => $primaryObjectID,
        ];

        return $this->mergeRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function mergeRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CRMObjectsSimplePublicObject {
        [$parsed, $options] = DealMergeParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/0-3/merge',
            body: (object) $parsed,
            options: $options,
            convert: CRMObjectsSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Read
     *
     * @param bool $archived
     * @param list<string> $associations
     * @param string $idProperty
     * @param list<string> $properties
     * @param list<string> $propertiesWithHistory
     *
     * @throws APIException
     */
    public function read(
        string $dealID,
        $archived = omit,
        $associations = omit,
        $idProperty = omit,
        $properties = omit,
        $propertiesWithHistory = omit,
        ?RequestOptions $requestOptions = null,
    ): CRMObjectsSimplePublicObjectWithAssociations {
        $params = [
            'archived' => $archived,
            'associations' => $associations,
            'idProperty' => $idProperty,
            'properties' => $properties,
            'propertiesWithHistory' => $propertiesWithHistory,
        ];

        return $this->readRaw($dealID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function readRaw(
        string $dealID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CRMObjectsSimplePublicObjectWithAssociations {
        [$parsed, $options] = DealReadParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/objects/0-3/%1$s', $dealID],
            query: $parsed,
            options: $options,
            convert: CRMObjectsSimplePublicObjectWithAssociations::class,
        );
    }

    /**
     * @api
     *
     * @param string $after
     * @param list<CRMObjectsFilterGroup> $filterGroups
     * @param int $limit
     * @param list<string> $properties
     * @param string $query
     * @param list<string> $sorts
     *
     * @throws APIException
     */
    public function search(
        $after = omit,
        $filterGroups = omit,
        $limit = omit,
        $properties = omit,
        $query = omit,
        $sorts = omit,
        ?RequestOptions $requestOptions = null,
    ): CRMObjectsCollectionResponseWithTotalSimplePublicObject {
        $params = [
            'after' => $after,
            'filterGroups' => $filterGroups,
            'limit' => $limit,
            'properties' => $properties,
            'query' => $query,
            'sorts' => $sorts,
        ];

        return $this->searchRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function searchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CRMObjectsCollectionResponseWithTotalSimplePublicObject {
        [$parsed, $options] = DealSearchParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/0-3/search',
            body: (object) $parsed,
            options: $options,
            convert: CRMObjectsCollectionResponseWithTotalSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Create or update a batch of deals by unique property values
     *
     * @param list<CRMObjectsSimplePublicObjectBatchInputUpsert> $inputs
     *
     * @throws APIException
     */
    public function upsert(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): CRMObjectsBatchResponseSimplePublicUpsertObject {
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
    ): CRMObjectsBatchResponseSimplePublicUpsertObject {
        [$parsed, $options] = DealUpsertParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/0-3/batch/upsert',
            body: (object) $parsed,
            options: $options,
            convert: CRMObjectsBatchResponseSimplePublicUpsertObject::class,
        );
    }
}

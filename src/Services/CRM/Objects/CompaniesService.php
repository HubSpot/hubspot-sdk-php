<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM\Objects;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Objects\Companies\CompanyCreateParams;
use HubspotSDK\CRM\Objects\Companies\CompanyDeleteParams;
use HubspotSDK\CRM\Objects\Companies\CompanyListParams;
use HubspotSDK\CRM\Objects\Companies\CompanyMergeParams;
use HubspotSDK\CRM\Objects\Companies\CompanyReadParams;
use HubspotSDK\CRM\Objects\Companies\CompanySearchParams;
use HubspotSDK\CRM\Objects\Companies\CompanyUpdateParams;
use HubspotSDK\CRM\Objects\Companies\CompanyUpsertParams;
use HubspotSDK\CRM\Objects\CRMObjectsBatchResponseSimplePublicObject;
use HubspotSDK\CRM\Objects\CRMObjectsBatchResponseSimplePublicUpsertObject;
use HubspotSDK\CRM\Objects\CRMObjectsCollectionResponseSimplePublicObjectWithAssociations;
use HubspotSDK\CRM\Objects\CRMObjectsCollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\CRM\Objects\CRMObjectsCreatedResponseSimplePublicObject;
use HubspotSDK\CRM\Objects\CRMObjectsFilterGroup;
use HubspotSDK\CRM\Objects\CRMObjectsPublicAssociationsForObject;
use HubspotSDK\CRM\Objects\CRMObjectsSimplePublicObject;
use HubspotSDK\CRM\Objects\CRMObjectsSimplePublicObjectBatchInput;
use HubspotSDK\CRM\Objects\CRMObjectsSimplePublicObjectBatchInputUpsert;
use HubspotSDK\CRM\Objects\CRMObjectsSimplePublicObjectID;
use HubspotSDK\CRM\Objects\CRMObjectsSimplePublicObjectWithAssociations;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CRM\Objects\CompaniesContract;

use const HubspotSDK\Core\OMIT as omit;

final class CompaniesService implements CompaniesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a company
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
        [$parsed, $options] = CompanyCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/companies',
            body: (object) $parsed,
            options: $options,
            convert: CRMObjectsCreatedResponseSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Update a batch of companies
     *
     * @param list<CRMObjectsSimplePublicObjectBatchInput> $inputs
     *
     * @throws APIException
     */
    public function update(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): CRMObjectsBatchResponseSimplePublicObject {
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
    ): CRMObjectsBatchResponseSimplePublicObject {
        [$parsed, $options] = CompanyUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/companies/batch/update',
            body: (object) $parsed,
            options: $options,
            convert: CRMObjectsBatchResponseSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Retrieve companies
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
        [$parsed, $options] = CompanyListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'crm/v3/objects/companies',
            query: $parsed,
            options: $options,
            convert: CRMObjectsCollectionResponseSimplePublicObjectWithAssociations::class,
        );
    }

    /**
     * @api
     *
     * Archive a batch of companies
     *
     * @param list<CRMObjectsSimplePublicObjectID> $inputs
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
        [$parsed, $options] = CompanyDeleteParams::parseRequest(
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
     * Merge two companies
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
        [$parsed, $options] = CompanyMergeParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/companies/merge',
            body: (object) $parsed,
            options: $options,
            convert: CRMObjectsSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a company
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
        string $companyID,
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

        return $this->readRaw($companyID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function readRaw(
        string $companyID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CRMObjectsSimplePublicObjectWithAssociations {
        [$parsed, $options] = CompanyReadParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/objects/companies/%1$s', $companyID],
            query: $parsed,
            options: $options,
            convert: CRMObjectsSimplePublicObjectWithAssociations::class,
        );
    }

    /**
     * @api
     *
     * Search for companies
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
        [$parsed, $options] = CompanySearchParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/companies/search',
            body: (object) $parsed,
            options: $options,
            convert: CRMObjectsCollectionResponseWithTotalSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Create or update a batch of companies by unique property values
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
        [$parsed, $options] = CompanyUpsertParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/companies/batch/upsert',
            body: (object) $parsed,
            options: $options,
            convert: CRMObjectsBatchResponseSimplePublicUpsertObject::class,
        );
    }
}

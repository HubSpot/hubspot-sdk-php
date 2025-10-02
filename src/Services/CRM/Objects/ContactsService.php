<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM\Objects;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Objects\Contacts\ContactCreateParams;
use HubspotSDK\CRM\Objects\Contacts\ContactDeleteParams;
use HubspotSDK\CRM\Objects\Contacts\ContactListParams;
use HubspotSDK\CRM\Objects\Contacts\ContactMergeParams;
use HubspotSDK\CRM\Objects\Contacts\ContactPurgeParams;
use HubspotSDK\CRM\Objects\Contacts\ContactReadParams;
use HubspotSDK\CRM\Objects\Contacts\ContactSearchParams;
use HubspotSDK\CRM\Objects\Contacts\ContactUpdateParams;
use HubspotSDK\CRM\Objects\Contacts\ContactUpsertParams;
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
use HubspotSDK\ServiceContracts\CRM\Objects\ContactsContract;

use const HubspotSDK\Core\OMIT as omit;

final class ContactsService implements ContactsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a contact
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
        [$parsed, $options] = ContactCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/contacts',
            body: (object) $parsed,
            options: $options,
            convert: CRMObjectsCreatedResponseSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Update a batch of contacts
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
        [$parsed, $options] = ContactUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/contacts/batch/update',
            body: (object) $parsed,
            options: $options,
            convert: CRMObjectsBatchResponseSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Retrieve contacts
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
        [$parsed, $options] = ContactListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'crm/v3/objects/contacts',
            query: $parsed,
            options: $options,
            convert: CRMObjectsCollectionResponseSimplePublicObjectWithAssociations::class,
        );
    }

    /**
     * @api
     *
     * Archive a batch of contacts
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
        [$parsed, $options] = ContactDeleteParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/contacts/batch/archive',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Merge two contacts
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
        [$parsed, $options] = ContactMergeParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/contacts/merge',
            body: (object) $parsed,
            options: $options,
            convert: CRMObjectsSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Permanently delete a contact (GDPR-compliant)
     *
     * @param string $objectID
     * @param string $idProperty
     *
     * @throws APIException
     */
    public function purge(
        $objectID,
        $idProperty = omit,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['objectID' => $objectID, 'idProperty' => $idProperty];

        return $this->purgeRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function purgeRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = ContactPurgeParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/contacts/gdpr-delete',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve a contact
     *
     * @param bool $archived
     * @param list<string> $associations
     * @param list<string> $properties
     * @param list<string> $propertiesWithHistory
     *
     * @throws APIException
     */
    public function read(
        string $contactID,
        $archived = omit,
        $associations = omit,
        $properties = omit,
        $propertiesWithHistory = omit,
        ?RequestOptions $requestOptions = null,
    ): CRMObjectsSimplePublicObjectWithAssociations {
        $params = [
            'archived' => $archived,
            'associations' => $associations,
            'properties' => $properties,
            'propertiesWithHistory' => $propertiesWithHistory,
        ];

        return $this->readRaw($contactID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function readRaw(
        string $contactID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CRMObjectsSimplePublicObjectWithAssociations {
        [$parsed, $options] = ContactReadParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/objects/contacts/%1$s', $contactID],
            query: $parsed,
            options: $options,
            convert: CRMObjectsSimplePublicObjectWithAssociations::class,
        );
    }

    /**
     * @api
     *
     * Search for contacts
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
        [$parsed, $options] = ContactSearchParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/contacts/search',
            body: (object) $parsed,
            options: $options,
            convert: CRMObjectsCollectionResponseWithTotalSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Create or update a batch of contacts
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
        [$parsed, $options] = ContactUpsertParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/contacts/batch/upsert',
            body: (object) $parsed,
            options: $options,
            convert: CRMObjectsBatchResponseSimplePublicUpsertObject::class,
        );
    }
}

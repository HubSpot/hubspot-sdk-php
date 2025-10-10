<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM\Objects;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Objects\CollectionResponseSimplePublicObjectWithAssociations;
use HubspotSDK\CRM\Objects\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\CRM\Objects\CreatedResponseSimplePublicObject;
use HubspotSDK\CRM\Objects\Deals\DealCreateByObjectTypeIDParams;
use HubspotSDK\CRM\Objects\Deals\DealGetByObjectTypeIDParams;
use HubspotSDK\CRM\Objects\Deals\DealListByObjectTypeIDParams;
use HubspotSDK\CRM\Objects\Deals\DealMergeByObjectTypeIDParams;
use HubspotSDK\CRM\Objects\Deals\DealSearchByObjectTypeIDParams;
use HubspotSDK\CRM\Objects\Deals\DealUpdateByObjectTypeIDParams;
use HubspotSDK\CRM\Objects\FilterGroup;
use HubspotSDK\CRM\Objects\PublicAssociationsForObject;
use HubspotSDK\CRM\Objects\SimplePublicObject;
use HubspotSDK\CRM\Objects\SimplePublicObjectWithAssociations;
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
     * @param list<PublicAssociationsForObject> $associations
     *
     * @throws APIException
     */
    public function createByObjectTypeID(
        $properties,
        $associations = omit,
        ?RequestOptions $requestOptions = null
    ): CreatedResponseSimplePublicObject {
        $params = ['properties' => $properties, 'associations' => $associations];

        return $this->createByObjectTypeIDRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createByObjectTypeIDRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CreatedResponseSimplePublicObject {
        [$parsed, $options] = DealCreateByObjectTypeIDParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/0-3',
            body: (object) $parsed,
            options: $options,
            convert: CreatedResponseSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Archive
     *
     * @throws APIException
     */
    public function deleteByObjectTypeID(
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
    public function getByObjectTypeID(
        string $dealID,
        $archived = omit,
        $associations = omit,
        $idProperty = omit,
        $properties = omit,
        $propertiesWithHistory = omit,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations {
        $params = [
            'archived' => $archived,
            'associations' => $associations,
            'idProperty' => $idProperty,
            'properties' => $properties,
            'propertiesWithHistory' => $propertiesWithHistory,
        ];

        return $this->getByObjectTypeIDRaw($dealID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getByObjectTypeIDRaw(
        string $dealID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): SimplePublicObjectWithAssociations {
        [$parsed, $options] = DealGetByObjectTypeIDParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/objects/0-3/%1$s', $dealID],
            query: $parsed,
            options: $options,
            convert: SimplePublicObjectWithAssociations::class,
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
    public function listByObjectTypeID(
        $after = omit,
        $archived = omit,
        $associations = omit,
        $limit = omit,
        $properties = omit,
        $propertiesWithHistory = omit,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseSimplePublicObjectWithAssociations {
        $params = [
            'after' => $after,
            'archived' => $archived,
            'associations' => $associations,
            'limit' => $limit,
            'properties' => $properties,
            'propertiesWithHistory' => $propertiesWithHistory,
        ];

        return $this->listByObjectTypeIDRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listByObjectTypeIDRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseSimplePublicObjectWithAssociations {
        [$parsed, $options] = DealListByObjectTypeIDParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'crm/v3/objects/0-3',
            query: $parsed,
            options: $options,
            convert: CollectionResponseSimplePublicObjectWithAssociations::class,
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
    public function mergeByObjectTypeID(
        $objectIDToMerge,
        $primaryObjectID,
        ?RequestOptions $requestOptions = null
    ): SimplePublicObject {
        $params = [
            'objectIDToMerge' => $objectIDToMerge,
            'primaryObjectID' => $primaryObjectID,
        ];

        return $this->mergeByObjectTypeIDRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function mergeByObjectTypeIDRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): SimplePublicObject {
        [$parsed, $options] = DealMergeByObjectTypeIDParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/0-3/merge',
            body: (object) $parsed,
            options: $options,
            convert: SimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * @param string $after
     * @param list<FilterGroup> $filterGroups
     * @param int $limit
     * @param list<string> $properties
     * @param string $query
     * @param list<string> $sorts
     *
     * @throws APIException
     */
    public function searchByObjectTypeID(
        $after = omit,
        $filterGroups = omit,
        $limit = omit,
        $properties = omit,
        $query = omit,
        $sorts = omit,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalSimplePublicObject {
        $params = [
            'after' => $after,
            'filterGroups' => $filterGroups,
            'limit' => $limit,
            'properties' => $properties,
            'query' => $query,
            'sorts' => $sorts,
        ];

        return $this->searchByObjectTypeIDRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function searchByObjectTypeIDRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalSimplePublicObject {
        [$parsed, $options] = DealSearchByObjectTypeIDParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/0-3/search',
            body: (object) $parsed,
            options: $options,
            convert: CollectionResponseWithTotalSimplePublicObject::class,
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
    public function updateByObjectTypeID(
        string $dealID,
        $properties,
        $idProperty = omit,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject {
        $params = ['properties' => $properties, 'idProperty' => $idProperty];

        return $this->updateByObjectTypeIDRaw($dealID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateByObjectTypeIDRaw(
        string $dealID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): SimplePublicObject {
        [$parsed, $options] = DealUpdateByObjectTypeIDParams::parseRequest(
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
            convert: SimplePublicObject::class,
        );
    }
}

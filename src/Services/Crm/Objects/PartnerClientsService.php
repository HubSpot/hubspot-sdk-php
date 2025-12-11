<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Objects;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\Filter\Operator;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Objects\PartnerClientsContract;
use HubspotSDK\Services\Crm\Objects\PartnerClients\AssociationsService;
use HubspotSDK\Services\Crm\Objects\PartnerClients\BatchService;

final class PartnerClientsService implements PartnerClientsContract
{
    /**
     * @api
     */
    public PartnerClientsRawService $raw;

    /**
     * @api
     */
    public AssociationsService $associations;

    /**
     * @api
     */
    public BatchService $batch;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PartnerClientsRawService($client);
        $this->associations = new AssociationsService($client);
        $this->batch = new BatchService($client);
    }

    /**
     * @api
     *
     * @param string $partnerClientID Path param:
     * @param array<string,string> $properties body param: Key value pairs representing the properties of the object
     * @param string $idProperty Query param:
     *
     * @throws APIException
     */
    public function update(
        string $partnerClientID,
        array $properties,
        ?string $idProperty = null,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject {
        $params = Util::removeNulls(
            ['properties' => $properties, 'idProperty' => $idProperty]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($partnerClientID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param list<string> $associations
     * @param list<string> $properties
     * @param list<string> $propertiesWithHistory
     *
     * @return Page<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        bool $archived = false,
        ?array $associations = null,
        int $limit = 10,
        ?array $properties = null,
        ?array $propertiesWithHistory = null,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(
            [
                'after' => $after,
                'archived' => $archived,
                'associations' => $associations,
                'limit' => $limit,
                'properties' => $properties,
                'propertiesWithHistory' => $propertiesWithHistory,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param list<string> $associations
     * @param list<string> $properties
     * @param list<string> $propertiesWithHistory
     *
     * @throws APIException
     */
    public function get(
        string $partnerClientID,
        bool $archived = false,
        ?array $associations = null,
        ?string $idProperty = null,
        ?array $properties = null,
        ?array $propertiesWithHistory = null,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations {
        $params = Util::removeNulls(
            [
                'archived' => $archived,
                'associations' => $associations,
                'idProperty' => $idProperty,
                'properties' => $properties,
                'propertiesWithHistory' => $propertiesWithHistory,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($partnerClientID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $after a paging cursor token for retrieving subsequent pages
     * @param list<array{
     *   filters: list<array{
     *     operator: 'BETWEEN'|'CONTAINS_TOKEN'|'EQ'|'GT'|'GTE'|'HAS_PROPERTY'|'IN'|'LT'|'LTE'|'NEQ'|'NOT_CONTAINS_TOKEN'|'NOT_HAS_PROPERTY'|'NOT_IN'|Operator,
     *     propertyName: string,
     *     highValue?: string,
     *     value?: string,
     *     values?: list<string>,
     *   }>,
     * }> $filterGroups Up to 6 groups of filters defining additional query criteria
     * @param int $limit the maximum results to return, up to 200 objects
     * @param list<string> $properties a list of property names to include in the response
     * @param list<string> $sorts specifies sorting order based on object properties
     * @param string $query the search query string, up to 3000 characters
     *
     * @throws APIException
     */
    public function search(
        string $after,
        array $filterGroups,
        int $limit,
        array $properties,
        array $sorts,
        ?string $query = null,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalSimplePublicObject {
        $params = Util::removeNulls(
            [
                'after' => $after,
                'filterGroups' => $filterGroups,
                'limit' => $limit,
                'properties' => $properties,
                'sorts' => $sorts,
                'query' => $query,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->search(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}

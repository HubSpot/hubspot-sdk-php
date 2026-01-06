<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Objects\PartnerServices;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\AssociatedID;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Objects\PartnerServices\AssociationsContract;

final class AssociationsService implements AssociationsContract
{
    /**
     * @api
     */
    public AssociationsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AssociationsRawService($client);
    }

    /**
     * @api
     *
     * Associate a partner service with another object
     *
     * @throws APIException
     */
    public function update(
        string $associationType,
        string $partnerServiceID,
        string $toObjectType,
        string $toObjectID,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations {
        $params = [
            'partnerServiceID' => $partnerServiceID,
            'toObjectType' => $toObjectType,
            'toObjectID' => $toObjectID,
        ];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($associationType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List associations of a partner service by type
     *
     * @param string $toObjectType Path param:
     * @param string $partnerServiceID Path param:
     * @param string $after Query param: The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $includeFa Query param:
     * @param int $limit query param: The maximum number of results to display per page
     *
     * @return Page<AssociatedID>
     *
     * @throws APIException
     */
    public function list(
        string $toObjectType,
        string $partnerServiceID,
        ?string $after = null,
        bool $includeFa = false,
        int $limit = 500,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = [
            'partnerServiceID' => $partnerServiceID,
            'after' => $after,
            'includeFa' => $includeFa,
            'limit' => $limit,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($toObjectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Remove an association between two partner services
     *
     * @throws APIException
     */
    public function delete(
        string $associationType,
        string $partnerServiceID,
        string $toObjectType,
        string $toObjectID,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = [
            'partnerServiceID' => $partnerServiceID,
            'toObjectType' => $toObjectType,
            'toObjectID' => $toObjectID,
        ];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($associationType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}

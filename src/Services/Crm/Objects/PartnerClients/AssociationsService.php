<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Objects\PartnerClients;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\AssociatedID;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Objects\PartnerClients\AssociationsContract;

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
     * Associate a partner client with another object
     *
     * @throws APIException
     */
    public function update(
        string $associationType,
        string $partnerClientID,
        string $toObjectType,
        string $toObjectID,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations {
        $params = Util::removeNulls(
            [
                'partnerClientID' => $partnerClientID,
                'toObjectType' => $toObjectType,
                'toObjectID' => $toObjectID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($associationType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List associations of a partner client by type
     *
     * @param string $toObjectType Path param:
     * @param string $partnerClientID Path param:
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
        string $partnerClientID,
        ?string $after = null,
        bool $includeFa = false,
        int $limit = 500,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(
            [
                'partnerClientID' => $partnerClientID,
                'after' => $after,
                'includeFa' => $includeFa,
                'limit' => $limit,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($toObjectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Remove an association between two partner clients
     *
     * @throws APIException
     */
    public function delete(
        string $associationType,
        string $partnerClientID,
        string $toObjectType,
        string $toObjectID,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            [
                'partnerClientID' => $partnerClientID,
                'toObjectType' => $toObjectType,
                'toObjectID' => $toObjectID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($associationType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}

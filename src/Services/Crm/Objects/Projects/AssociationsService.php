<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Objects\Projects;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\AssociatedID;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Objects\Projects\AssociationsContract;

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
     * @throws APIException
     */
    public function update(
        string $associationType,
        string $projectID,
        string $toObjectType,
        string $toObjectID,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations {
        $params = Util::removeNulls(
            [
                'projectID' => $projectID,
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
     * @param string $toObjectType Path param:
     * @param string $projectID Path param:
     * @param string $after Query param:
     * @param bool $includeFa Query param:
     * @param int $limit Query param:
     *
     * @return Page<AssociatedID>
     *
     * @throws APIException
     */
    public function list(
        string $toObjectType,
        string $projectID,
        ?string $after = null,
        bool $includeFa = false,
        int $limit = 500,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(
            [
                'projectID' => $projectID,
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
     * @throws APIException
     */
    public function delete(
        string $associationType,
        string $projectID,
        string $toObjectType,
        string $toObjectID,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            [
                'projectID' => $projectID,
                'toObjectType' => $toObjectType,
                'toObjectID' => $toObjectID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($associationType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}

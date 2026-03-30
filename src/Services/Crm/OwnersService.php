<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Owners\OwnerGetParams\IDProperty;
use HubspotSDK\Crm\Owners\PublicOwner;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\OwnersContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class OwnersService implements OwnersContract
{
    /**
     * @api
     */
    public OwnersRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new OwnersRawService($client);
    }

    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param string $email Filter by email address (optional)
     * @param int $limit the maximum number of results to display per page
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<PublicOwner>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        bool $archived = false,
        ?string $email = null,
        int $limit = 100,
        RequestOptions|array|null $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(
            [
                'after' => $after,
                'archived' => $archived,
                'email' => $email,
                'limit' => $limit,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve details of a specific owner using either their 'id' or 'userId'.
     *
     * @param bool $archived whether to return only results that have been archived
     * @param IDProperty|value-of<IDProperty> $idProperty
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        int $ownerID,
        bool $archived = false,
        IDProperty|string $idProperty = 'id',
        RequestOptions|array|null $requestOptions = null,
    ): PublicOwner {
        $params = Util::removeNulls(
            ['archived' => $archived, 'idProperty' => $idProperty]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($ownerID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}

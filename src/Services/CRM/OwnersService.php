<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Owners\OwnerGetParams;
use HubspotSDK\CRM\Owners\OwnerGetParams\IDProperty;
use HubspotSDK\CRM\Owners\OwnerListParams;
use HubspotSDK\CRM\Owners\PublicOwner;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CRM\OwnersContract;

use const HubspotSDK\Core\OMIT as omit;

final class OwnersService implements OwnersContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a paginated list of owners available in the account.
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results (optional).
     * @param bool $archived whether to return only results that have been archived
     * @param string $email filter by email address (optional)
     * @param int $limit the maximum number of results to display per page
     *
     * @return Page<PublicOwner>
     *
     * @throws APIException
     */
    public function list(
        $after = omit,
        $archived = omit,
        $email = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = [
            'after' => $after,
            'archived' => $archived,
            'email' => $email,
            'limit' => $limit,
        ];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return Page<PublicOwner>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = OwnerListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'crm/v3/owners/',
            query: $parsed,
            options: $options,
            convert: PublicOwner::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Retrieve details of a specific owner using either their 'id' or 'userId'.
     *
     * @param bool $archived whether to return only results that have been archived
     * @param IDProperty|value-of<IDProperty> $idProperty specifies whether to use 'id' or 'userId' as the identifier for the owner
     *
     * @throws APIException
     */
    public function get(
        int $ownerID,
        $archived = omit,
        $idProperty = omit,
        ?RequestOptions $requestOptions = null,
    ): PublicOwner {
        $params = ['archived' => $archived, 'idProperty' => $idProperty];

        return $this->getRaw($ownerID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        int $ownerID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicOwner {
        [$parsed, $options] = OwnerGetParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/owners/%1$s', $ownerID],
            query: $parsed,
            options: $options,
            convert: PublicOwner::class,
        );
    }
}

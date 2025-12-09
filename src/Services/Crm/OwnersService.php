<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Owners\OwnerGetParams;
use HubspotSDK\Crm\Owners\OwnerListParams;
use HubspotSDK\Crm\Owners\PublicOwner;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\OwnersContract;

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
     * @param array{
     *   after?: string, archived?: bool, email?: string, limit?: int
     * }|OwnerListParams $params
     *
     * @return Page<PublicOwner>
     *
     * @throws APIException
     */
    public function list(
        array|OwnerListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = OwnerListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<Page<PublicOwner>> */
        $response = $this->client->request(
            method: 'get',
            path: 'crm/v3/owners/',
            query: $parsed,
            options: $options,
            convert: PublicOwner::class,
            page: Page::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve details of a specific owner using either their 'id' or 'userId'.
     *
     * @param array{archived?: bool, idProperty?: 'id'|'userId'}|OwnerGetParams $params
     *
     * @throws APIException
     */
    public function get(
        int $ownerID,
        array|OwnerGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicOwner {
        [$parsed, $options] = OwnerGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<PublicOwner> */
        $response = $this->client->request(
            method: 'get',
            path: ['crm/v3/owners/%1$s', $ownerID],
            query: $parsed,
            options: $options,
            convert: PublicOwner::class,
        );

        return $response->parse();
    }
}

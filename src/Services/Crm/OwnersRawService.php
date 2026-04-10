<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\Owners\OwnerGetParams;
use HubSpotSDK\Crm\Owners\OwnerGetParams\IDProperty;
use HubSpotSDK\Crm\Owners\OwnerListParams;
use HubSpotSDK\Crm\Owners\PublicOwner;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Crm\OwnersRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class OwnersRawService implements OwnersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param array{
     *   after?: string, archived?: bool, email?: string, limit?: int
     * }|OwnerListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<PublicOwner>>
     *
     * @throws APIException
     */
    public function list(
        array|OwnerListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = OwnerListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'crm/owners/2026-03',
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
     * @param array{
     *   archived?: bool, idProperty?: IDProperty|value-of<IDProperty>
     * }|OwnerGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicOwner>
     *
     * @throws APIException
     */
    public function get(
        int $ownerID,
        array|OwnerGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = OwnerGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm/owners/2026-03/%1$s', $ownerID],
            query: $parsed,
            options: $options,
            convert: PublicOwner::class,
        );
    }
}

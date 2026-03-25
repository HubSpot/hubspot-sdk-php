<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Owners\OwnerGetParams;
use HubspotSDK\Crm\Owners\OwnerGetParams\IDProperty;
use HubspotSDK\Crm\Owners\OwnerListParams;
use HubspotSDK\Crm\Owners\PublicOwner;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\OwnersRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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

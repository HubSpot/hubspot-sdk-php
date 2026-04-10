<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm\Properties;

use HubSpotSDK\Client;
use HubSpotSDK\CollectionResponsePropertyGroupNoPaging;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\Properties\Groups\GroupCreateParams;
use HubSpotSDK\Crm\Properties\Groups\GroupDeleteParams;
use HubSpotSDK\Crm\Properties\Groups\GroupGetParams;
use HubSpotSDK\Crm\Properties\Groups\GroupListParams;
use HubSpotSDK\Crm\Properties\Groups\GroupUpdateParams;
use HubSpotSDK\PropertyGroup;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Crm\Properties\GroupsRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class GroupsRawService implements GroupsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create and return a copy of a new property group.
     *
     * @param array{
     *   label: string, name: string, displayOrder?: int
     * }|GroupCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PropertyGroup>
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        array|GroupCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = GroupCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['crm/properties/2026-03/%1$s/groups', $objectType],
            body: (object) $parsed,
            options: $options,
            convert: PropertyGroup::class,
        );
    }

    /**
     * @api
     *
     * Perform a partial update of a property group identified by {groupName}. Provided fields will be overwritten.
     *
     * @param string $groupName Path param
     * @param array{
     *   objectType: string, displayOrder?: int, label?: string
     * }|GroupUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PropertyGroup>
     *
     * @throws APIException
     */
    public function update(
        string $groupName,
        array|GroupUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = GroupUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: [
                'crm/properties/2026-03/%1$s/groups/%2$s', $objectType, $groupName,
            ],
            body: (object) array_diff_key($parsed, array_flip(['objectType'])),
            options: $options,
            convert: PropertyGroup::class,
        );
    }

    /**
     * @api
     *
     * Read all existing property groups for the specified object type and HubSpot account.
     *
     * @param array{locale?: string}|GroupListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponsePropertyGroupNoPaging>
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        array|GroupListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = GroupListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm/properties/2026-03/%1$s/groups', $objectType],
            query: $parsed,
            options: $options,
            convert: CollectionResponsePropertyGroupNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Move a property group identified by {groupName} to the recycling bin.
     *
     * @param array{objectType: string}|GroupDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $groupName,
        array|GroupDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = GroupDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'crm/properties/2026-03/%1$s/groups/%2$s', $objectType, $groupName,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Read a property group identified by {groupName}.
     *
     * @param string $groupName Path param
     * @param array{objectType: string, locale?: string}|GroupGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PropertyGroup>
     *
     * @throws APIException
     */
    public function get(
        string $groupName,
        array|GroupGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = GroupGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'crm/properties/2026-03/%1$s/groups/%2$s', $objectType, $groupName,
            ],
            query: $parsed,
            options: $options,
            convert: PropertyGroup::class,
        );
    }
}

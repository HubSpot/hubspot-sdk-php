<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\MediaBridge;

use HubspotSDK\Client;
use HubspotSDK\Cms\MediaBridge\CollectionResponsePropertyGroupNoPaging;
use HubspotSDK\Cms\MediaBridge\Groups\GroupCreateParams;
use HubspotSDK\Cms\MediaBridge\Groups\GroupDeleteByNameParams;
use HubspotSDK\Cms\MediaBridge\Groups\GroupGetByNameParams;
use HubspotSDK\Cms\MediaBridge\Groups\GroupListParams;
use HubspotSDK\Cms\MediaBridge\Groups\GroupUpdateByNameParams;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Properties\PropertyGroup;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\MediaBridge\GroupsContract;

final class GroupsService implements GroupsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new property group for the specified object type.
     *
     * @param array{
     *   appId: string, label: string, name: string, displayOrder?: int
     * }|GroupCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        array|GroupCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PropertyGroup {
        [$parsed, $options] = GroupCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'media-bridge/v1/%1$s/properties/%2$s/groups', $appID, $objectType,
            ],
            body: (object) array_diff_key($parsed, ['appId']),
            options: $options,
            convert: PropertyGroup::class,
        );
    }

    /**
     * @api
     *
     * Get the property groups for a specified object type.
     *
     * @param array{appId: string}|GroupListParams $params
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        array|GroupListParams $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePropertyGroupNoPaging {
        [$parsed, $options] = GroupListParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'media-bridge/v1/%1$s/properties/%2$s/groups', $appID, $objectType,
            ],
            options: $options,
            convert: CollectionResponsePropertyGroupNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Delete an existing property group by name
     *
     * @param array{appId: string, objectType: string}|GroupDeleteByNameParams $params
     *
     * @throws APIException
     */
    public function deleteByName(
        string $groupName,
        array|GroupDeleteByNameParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = GroupDeleteByNameParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: [
                'media-bridge/v1/%1$s/properties/%2$s/groups/%3$s',
                $appID,
                $objectType,
                $groupName,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Get the details of an existing property group by name.
     *
     * @param array{appId: string, objectType: string}|GroupGetByNameParams $params
     *
     * @throws APIException
     */
    public function getByName(
        string $groupName,
        array|GroupGetByNameParams $params,
        ?RequestOptions $requestOptions = null,
    ): PropertyGroup {
        [$parsed, $options] = GroupGetByNameParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'media-bridge/v1/%1$s/properties/%2$s/groups/%3$s',
                $appID,
                $objectType,
                $groupName,
            ],
            options: $options,
            convert: PropertyGroup::class,
        );
    }

    /**
     * @api
     *
     * Update an existing property group by name.
     *
     * @param array{
     *   appId: string, objectType: string, displayOrder?: int, label?: string
     * }|GroupUpdateByNameParams $params
     *
     * @throws APIException
     */
    public function updateByName(
        string $groupName,
        array|GroupUpdateByNameParams $params,
        ?RequestOptions $requestOptions = null,
    ): PropertyGroup {
        [$parsed, $options] = GroupUpdateByNameParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: [
                'media-bridge/v1/%1$s/properties/%2$s/groups/%3$s',
                $appID,
                $objectType,
                $groupName,
            ],
            body: (object) array_diff_key(
                $parsed,
                array_flip(['appId', 'objectType'])
            ),
            options: $options,
            convert: PropertyGroup::class,
        );
    }
}

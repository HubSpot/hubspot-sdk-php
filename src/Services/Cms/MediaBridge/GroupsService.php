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
use HubspotSDK\CRM\Properties\PropertyGroup;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\MediaBridge\GroupsContract;

use const HubspotSDK\Core\OMIT as omit;

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
     * @param string $appID
     * @param string $label
     * @param string $name
     * @param int $displayOrder
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        $appID,
        $label,
        $name,
        $displayOrder = omit,
        ?RequestOptions $requestOptions = null,
    ): PropertyGroup {
        $params = [
            'appID' => $appID,
            'label' => $label,
            'name' => $name,
            'displayOrder' => $displayOrder,
        ];

        return $this->createRaw($objectType, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        string $objectType,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PropertyGroup {
        [$parsed, $options] = GroupCreateParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'media-bridge/v1/%1$s/properties/%2$s/groups', $appID, $objectType,
            ],
            body: (object) array_diff_key($parsed, ['appID']),
            options: $options,
            convert: PropertyGroup::class,
        );
    }

    /**
     * @api
     *
     * Get the property groups for a specified object type.
     *
     * @param string $appID
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        $appID,
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePropertyGroupNoPaging {
        $params = ['appID' => $appID];

        return $this->listRaw($objectType, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        string $objectType,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePropertyGroupNoPaging {
        [$parsed, $options] = GroupListParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

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
     * @param string $appID
     * @param string $objectType
     *
     * @throws APIException
     */
    public function deleteByName(
        string $groupName,
        $appID,
        $objectType,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = ['appID' => $appID, 'objectType' => $objectType];

        return $this->deleteByNameRaw($groupName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteByNameRaw(
        string $groupName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = GroupDeleteByNameParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
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
     * @param string $appID
     * @param string $objectType
     *
     * @throws APIException
     */
    public function getByName(
        string $groupName,
        $appID,
        $objectType,
        ?RequestOptions $requestOptions = null,
    ): PropertyGroup {
        $params = ['appID' => $appID, 'objectType' => $objectType];

        return $this->getByNameRaw($groupName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getByNameRaw(
        string $groupName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PropertyGroup {
        [$parsed, $options] = GroupGetByNameParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
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
     * @param string $appID
     * @param string $objectType
     * @param int $displayOrder
     * @param string $label
     *
     * @throws APIException
     */
    public function updateByName(
        string $groupName,
        $appID,
        $objectType,
        $displayOrder = omit,
        $label = omit,
        ?RequestOptions $requestOptions = null,
    ): PropertyGroup {
        $params = [
            'appID' => $appID,
            'objectType' => $objectType,
            'displayOrder' => $displayOrder,
            'label' => $label,
        ];

        return $this->updateByNameRaw($groupName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateByNameRaw(
        string $groupName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PropertyGroup {
        [$parsed, $options] = GroupUpdateByNameParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
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
                array_flip(['appID', 'objectType'])
            ),
            options: $options,
            convert: PropertyGroup::class,
        );
    }
}

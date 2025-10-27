<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM\Properties;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Properties\CollectionResponsePropertyGroup;
use HubspotSDK\CRM\Properties\CreatedResponsePropertyGroup;
use HubspotSDK\CRM\Properties\Groups\GroupCreateParams;
use HubspotSDK\CRM\Properties\Groups\GroupDeleteParams;
use HubspotSDK\CRM\Properties\Groups\GroupGetParams;
use HubspotSDK\CRM\Properties\Groups\GroupUpdateParams;
use HubspotSDK\CRM\Properties\PropertyGroup;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CRM\Properties\GroupsContract;

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
     * Create and return a copy of a new property group.
     *
     * @param string $label
     * @param string $name
     * @param int $displayOrder
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        $label,
        $name,
        $displayOrder = omit,
        ?RequestOptions $requestOptions = null,
    ): CreatedResponsePropertyGroup {
        $params = [
            'label' => $label, 'name' => $name, 'displayOrder' => $displayOrder,
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
    ): CreatedResponsePropertyGroup {
        [$parsed, $options] = GroupCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['crm/v3/properties/%1$s/groups', $objectType],
            body: (object) $parsed,
            options: $options,
            convert: CreatedResponsePropertyGroup::class,
        );
    }

    /**
     * @api
     *
     * Perform a partial update of a property group identified by {groupName}. Provided fields will be overwritten.
     *
     * @param string $objectType
     * @param int $displayOrder
     * @param string $label
     *
     * @throws APIException
     */
    public function update(
        string $groupName,
        $objectType,
        $displayOrder = omit,
        $label = omit,
        ?RequestOptions $requestOptions = null,
    ): PropertyGroup {
        $params = [
            'objectType' => $objectType,
            'displayOrder' => $displayOrder,
            'label' => $label,
        ];

        return $this->updateRaw($groupName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $groupName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PropertyGroup {
        [$parsed, $options] = GroupUpdateParams::parseRequest(
            $params,
            $requestOptions
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['crm/v3/properties/%1$s/groups/%2$s', $objectType, $groupName],
            body: (object) array_diff_key($parsed, ['objectType']),
            options: $options,
            convert: PropertyGroup::class,
        );
    }

    /**
     * @api
     *
     * Read all existing property groups for the specified object type and HubSpot account.
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePropertyGroup {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/properties/%1$s/groups', $objectType],
            options: $requestOptions,
            convert: CollectionResponsePropertyGroup::class,
        );
    }

    /**
     * @api
     *
     * Move a property group identified by {groupName} to the recycling bin.
     *
     * @param string $objectType
     *
     * @throws APIException
     */
    public function delete(
        string $groupName,
        $objectType,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['objectType' => $objectType];

        return $this->deleteRaw($groupName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $groupName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = GroupDeleteParams::parseRequest(
            $params,
            $requestOptions
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['crm/v3/properties/%1$s/groups/%2$s', $objectType, $groupName],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Read a property group identified by {groupName}.
     *
     * @param string $objectType
     *
     * @throws APIException
     */
    public function get(
        string $groupName,
        $objectType,
        ?RequestOptions $requestOptions = null
    ): PropertyGroup {
        $params = ['objectType' => $objectType];

        return $this->getRaw($groupName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        string $groupName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PropertyGroup {
        [$parsed, $options] = GroupGetParams::parseRequest(
            $params,
            $requestOptions
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/properties/%1$s/groups/%2$s', $objectType, $groupName],
            options: $options,
            convert: PropertyGroup::class,
        );
    }
}

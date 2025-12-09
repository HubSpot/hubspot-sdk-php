<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Properties;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Properties\CollectionResponsePropertyGroup;
use HubspotSDK\Crm\Properties\CreatedResponsePropertyGroup;
use HubspotSDK\Crm\Properties\Groups\GroupCreateParams;
use HubspotSDK\Crm\Properties\Groups\GroupDeleteParams;
use HubspotSDK\Crm\Properties\Groups\GroupGetParams;
use HubspotSDK\Crm\Properties\Groups\GroupListParams;
use HubspotSDK\Crm\Properties\Groups\GroupUpdateParams;
use HubspotSDK\Crm\Properties\PropertyGroup;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Properties\GroupsContract;

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
     * @param array{
     *   label: string, name: string, displayOrder?: int
     * }|GroupCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        array|GroupCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): CreatedResponsePropertyGroup {
        [$parsed, $options] = GroupCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<CreatedResponsePropertyGroup> */
        $response = $this->client->request(
            method: 'post',
            path: ['crm/v3/properties/%1$s/groups', $objectType],
            body: (object) $parsed,
            options: $options,
            convert: CreatedResponsePropertyGroup::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Perform a partial update of a property group identified by {groupName}. Provided fields will be overwritten.
     *
     * @param array{
     *   objectType: string, displayOrder?: int, label?: string
     * }|GroupUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $groupName,
        array|GroupUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PropertyGroup {
        [$parsed, $options] = GroupUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        /** @var BaseResponse<PropertyGroup> */
        $response = $this->client->request(
            method: 'patch',
            path: ['crm/v3/properties/%1$s/groups/%2$s', $objectType, $groupName],
            body: (object) array_diff_key($parsed, ['objectType']),
            options: $options,
            convert: PropertyGroup::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Read all existing property groups for the specified object type and HubSpot account.
     *
     * @param array{locale?: string}|GroupListParams $params
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        array|GroupListParams $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePropertyGroup {
        [$parsed, $options] = GroupListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<CollectionResponsePropertyGroup> */
        $response = $this->client->request(
            method: 'get',
            path: ['crm/v3/properties/%1$s/groups', $objectType],
            query: $parsed,
            options: $options,
            convert: CollectionResponsePropertyGroup::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Move a property group identified by {groupName} to the recycling bin.
     *
     * @param array{objectType: string}|GroupDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $groupName,
        array|GroupDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = GroupDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: ['crm/v3/properties/%1$s/groups/%2$s', $objectType, $groupName],
            options: $options,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Read a property group identified by {groupName}.
     *
     * @param array{objectType: string, locale?: string}|GroupGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $groupName,
        array|GroupGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): PropertyGroup {
        [$parsed, $options] = GroupGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        /** @var BaseResponse<PropertyGroup> */
        $response = $this->client->request(
            method: 'get',
            path: ['crm/v3/properties/%1$s/groups/%2$s', $objectType, $groupName],
            query: $parsed,
            options: $options,
            convert: PropertyGroup::class,
        );

        return $response->parse();
    }
}

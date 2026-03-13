<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\MediaBridge;

use HubspotSDK\Client;
use HubspotSDK\Cms\MediaBridge\CollectionResponsePropertyGroupNoPaging;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Properties\PropertyGroup;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\MediaBridge\GroupsContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class GroupsService implements GroupsContract
{
    /**
     * @api
     */
    public GroupsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new GroupsRawService($client);
    }

    /**
     * @api
     *
     * Create a new property group for the specified object type.
     *
     * @param string $objectType path param: The object type to create the new property group for
     * @param int $appID Path param: The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param string $label Body param
     * @param string $name Body param
     * @param int $displayOrder Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        int $appID,
        string $label,
        string $name,
        ?int $displayOrder = null,
        RequestOptions|array|null $requestOptions = null,
    ): PropertyGroup {
        $params = Util::removeNulls(
            [
                'appID' => $appID,
                'label' => $label,
                'name' => $name,
                'displayOrder' => $displayOrder,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the property groups for a specified object type.
     *
     * @param string $objectType the type of object to get the property groups for
     * @param int $appID The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        int $appID,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponsePropertyGroupNoPaging {
        $params = Util::removeNulls(['appID' => $appID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete an existing property group by name
     *
     * @param string $groupName the name of the property group to be deleted
     * @param int $appID The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param string $objectType The object type for the property group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteByName(
        string $groupName,
        int $appID,
        string $objectType,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            ['appID' => $appID, 'objectType' => $objectType]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteByName($groupName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the details of an existing property group by name.
     *
     * @param string $groupName the name for the property group you want to get the details for
     * @param int $appID The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param string $objectType the object type for the property group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getByName(
        string $groupName,
        int $appID,
        string $objectType,
        RequestOptions|array|null $requestOptions = null,
    ): PropertyGroup {
        $params = Util::removeNulls(
            ['appID' => $appID, 'objectType' => $objectType]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getByName($groupName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update an existing property group by name.
     *
     * @param string $groupName path param: The name of the property group to update
     * @param int $appID Path param: The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param string $objectType path param: The object type for the property group
     * @param int $displayOrder Body param
     * @param string $label Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateByName(
        string $groupName,
        int $appID,
        string $objectType,
        ?int $displayOrder = null,
        ?string $label = null,
        RequestOptions|array|null $requestOptions = null,
    ): PropertyGroup {
        $params = Util::removeNulls(
            [
                'appID' => $appID,
                'objectType' => $objectType,
                'displayOrder' => $displayOrder,
                'label' => $label,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateByName($groupName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}

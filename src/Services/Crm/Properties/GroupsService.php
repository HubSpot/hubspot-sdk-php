<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Properties;

use HubspotSDK\Client;
use HubspotSDK\CollectionResponsePropertyGroupNoPaging;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\PropertyGroup;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Properties\GroupsContract;

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
     * Create and return a copy of a new property group.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        string $label,
        string $name,
        ?int $displayOrder = null,
        RequestOptions|array|null $requestOptions = null,
    ): PropertyGroup {
        $params = Util::removeNulls(
            ['label' => $label, 'name' => $name, 'displayOrder' => $displayOrder]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Perform a partial update of a property group identified by {groupName}. Provided fields will be overwritten.
     *
     * @param string $groupName Path param
     * @param string $objectType Path param
     * @param int $displayOrder Body param
     * @param string $label Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $groupName,
        string $objectType,
        ?int $displayOrder = null,
        ?string $label = null,
        RequestOptions|array|null $requestOptions = null,
    ): PropertyGroup {
        $params = Util::removeNulls(
            [
                'objectType' => $objectType,
                'displayOrder' => $displayOrder,
                'label' => $label,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($groupName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Read all existing property groups for the specified object type and HubSpot account.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        ?string $locale = null,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponsePropertyGroupNoPaging {
        $params = Util::removeNulls(['locale' => $locale]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Move a property group identified by {groupName} to the recycling bin.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $groupName,
        string $objectType,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['objectType' => $objectType]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($groupName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Read a property group identified by {groupName}.
     *
     * @param string $groupName Path param
     * @param string $objectType Path param
     * @param string $locale Query param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $groupName,
        string $objectType,
        ?string $locale = null,
        RequestOptions|array|null $requestOptions = null,
    ): PropertyGroup {
        $params = Util::removeNulls(
            ['objectType' => $objectType, 'locale' => $locale]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($groupName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}

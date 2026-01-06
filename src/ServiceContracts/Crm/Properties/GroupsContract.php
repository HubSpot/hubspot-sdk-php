<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Properties;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Properties\CollectionResponsePropertyGroup;
use HubspotSDK\Crm\Properties\CreatedResponsePropertyGroup;
use HubspotSDK\Crm\Properties\PropertyGroup;
use HubspotSDK\RequestOptions;

interface GroupsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        string $label,
        string $name,
        ?int $displayOrder = null,
        ?RequestOptions $requestOptions = null,
    ): CreatedResponsePropertyGroup;

    /**
     * @api
     *
     * @param string $groupName Path param:
     * @param string $objectType Path param:
     * @param int $displayOrder Body param:
     * @param string $label Body param:
     *
     * @throws APIException
     */
    public function update(
        string $groupName,
        string $objectType,
        ?int $displayOrder = null,
        ?string $label = null,
        ?RequestOptions $requestOptions = null,
    ): PropertyGroup;

    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        ?string $locale = null,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePropertyGroup;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $groupName,
        string $objectType,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $groupName Path param:
     * @param string $objectType Path param:
     * @param string $locale Query param:
     *
     * @throws APIException
     */
    public function get(
        string $groupName,
        string $objectType,
        ?string $locale = null,
        ?RequestOptions $requestOptions = null,
    ): PropertyGroup;
}

<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Properties;

use HubspotSDK\CollectionResponsePropertyGroupNoPaging;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\PropertyGroup;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface GroupsContract
{
    /**
     * @api
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
    ): PropertyGroup;

    /**
     * @api
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
    ): PropertyGroup;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        ?string $locale = null,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponsePropertyGroupNoPaging;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $groupName,
        string $objectType,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
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
    ): PropertyGroup;
}

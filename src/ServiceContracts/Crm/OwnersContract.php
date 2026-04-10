<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\Owners\OwnerGetParams\IDProperty;
use HubSpotSDK\Crm\Owners\PublicOwner;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface OwnersContract
{
    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param string $email Filter by email address (optional)
     * @param int $limit the maximum number of results to display per page
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<PublicOwner>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        bool $archived = false,
        ?string $email = null,
        int $limit = 100,
        RequestOptions|array|null $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param bool $archived whether to return only results that have been archived
     * @param IDProperty|value-of<IDProperty> $idProperty
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        int $ownerID,
        bool $archived = false,
        IDProperty|string $idProperty = 'id',
        RequestOptions|array|null $requestOptions = null,
    ): PublicOwner;
}

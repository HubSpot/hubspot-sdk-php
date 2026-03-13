<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Owners\OwnerGetParams\IDProperty;
use HubspotSDK\Crm\Owners\PublicOwner;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface OwnersContract
{
    /**
     * @api
     *
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

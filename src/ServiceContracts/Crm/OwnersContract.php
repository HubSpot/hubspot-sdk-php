<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Owners\OwnerGetParams\IDProperty;
use HubspotSDK\Crm\Owners\PublicOwner;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface OwnersContract
{
    /**
     * @api
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
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param 'id'|'userId'|IDProperty $idProperty
     *
     * @throws APIException
     */
    public function get(
        int $ownerID,
        bool $archived = false,
        string|IDProperty $idProperty = 'id',
        ?RequestOptions $requestOptions = null,
    ): PublicOwner;
}

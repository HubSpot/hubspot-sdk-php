<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Owners\OwnerGetParams\IDProperty;
use HubspotSDK\CRM\Owners\PublicOwner;
use HubspotSDK\CursorURLPage;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface OwnersContract
{
    /**
     * @api
     *
     * @param string $after
     * @param bool $archived
     * @param string $email
     * @param int $limit
     *
     * @return CursorURLPage<PublicOwner>
     *
     * @throws APIException
     */
    public function list(
        $after = omit,
        $archived = omit,
        $email = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): CursorURLPage;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CursorURLPage<PublicOwner>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CursorURLPage;

    /**
     * @api
     *
     * @param bool $archived
     * @param IDProperty|value-of<IDProperty> $idProperty
     *
     * @throws APIException
     */
    public function get(
        int $ownerID,
        $archived = omit,
        $idProperty = omit,
        ?RequestOptions $requestOptions = null,
    ): PublicOwner;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        int $ownerID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicOwner;
}

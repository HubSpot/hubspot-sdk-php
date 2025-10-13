<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Owners\OwnerGetParams\IDProperty;
use HubspotSDK\CRM\Owners\PublicOwner;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface OwnersContract
{
    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results (optional).
     * @param bool $archived whether to return only results that have been archived
     * @param string $email filter by email address (optional)
     * @param int $limit the maximum number of results to display per page
     *
     * @return Page<PublicOwner>
     *
     * @throws APIException
     */
    public function list(
        $after = omit,
        $archived = omit,
        $email = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return Page<PublicOwner>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @param bool $archived whether to return only results that have been archived
     * @param IDProperty|value-of<IDProperty> $idProperty specifies whether to use 'id' or 'userId' as the identifier for the owner
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

<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Owners\CollectionResponsePublicOwnerForwardPaging;
use HubspotSDK\CRM\Owners\OwnerGetParams;
use HubspotSDK\CRM\Owners\OwnerGetParams\IDProperty;
use HubspotSDK\CRM\Owners\OwnerListParams;
use HubspotSDK\CRM\Owners\PublicOwner;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CRM\OwnersContract;

use const HubspotSDK\Core\OMIT as omit;

final class OwnersService implements OwnersContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a paginated list of owners available in the account.
     *
     * @param string $after
     * @param bool $archived
     * @param string $email
     * @param int $limit
     *
     * @throws APIException
     */
    public function list(
        $after = omit,
        $archived = omit,
        $email = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePublicOwnerForwardPaging {
        $params = [
            'after' => $after,
            'archived' => $archived,
            'email' => $email,
            'limit' => $limit,
        ];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePublicOwnerForwardPaging {
        [$parsed, $options] = OwnerListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'crm/v3/owners/',
            query: $parsed,
            options: $options,
            convert: CollectionResponsePublicOwnerForwardPaging::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a paginated list of owners available in the account.
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
    ): PublicOwner {
        $params = ['archived' => $archived, 'idProperty' => $idProperty];

        return $this->getRaw($ownerID, $params, $requestOptions);
    }

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
    ): PublicOwner {
        [$parsed, $options] = OwnerGetParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/owners/%1$s', $ownerID],
            query: $parsed,
            options: $options,
            convert: PublicOwner::class,
        );
    }
}

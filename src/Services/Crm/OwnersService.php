<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Owners\OwnerGetParams\IDProperty;
use HubspotSDK\Crm\Owners\PublicOwner;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\OwnersContract;

final class OwnersService implements OwnersContract
{
    /**
     * @api
     */
    public OwnersRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new OwnersRawService($client);
    }

    /**
     * @api
     *
     * Retrieve a paginated list of owners available in the account.
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
    ): Page {
        $params = [
            'after' => $after,
            'archived' => $archived,
            'email' => $email,
            'limit' => $limit,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve details of a specific owner using either their 'id' or 'userId'.
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
    ): PublicOwner {
        $params = ['archived' => $archived, 'idProperty' => $idProperty];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($ownerID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}

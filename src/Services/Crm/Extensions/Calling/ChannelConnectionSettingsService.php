<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Extensions\Calling;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\Calling\ChannelConnectionSettingsResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Extensions\Calling\ChannelConnectionSettingsContract;

final class ChannelConnectionSettingsService implements ChannelConnectionSettingsContract
{
    /**
     * @api
     */
    public ChannelConnectionSettingsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ChannelConnectionSettingsRawService($client);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        bool $isReady,
        string $url,
        ?RequestOptions $requestOptions = null,
    ): ChannelConnectionSettingsResponse {
        $params = ['isReady' => $isReady, 'url' => $url];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function update(
        int $appID,
        ?bool $isReady = null,
        ?string $url = null,
        ?RequestOptions $requestOptions = null,
    ): ChannelConnectionSettingsResponse {
        $params = ['isReady' => $isReady, 'url' => $url];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($appID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): ChannelConnectionSettingsResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($appID, requestOptions: $requestOptions);

        return $response->parse();
    }
}

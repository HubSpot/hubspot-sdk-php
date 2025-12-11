<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Extensions\Calling;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Extensions\Calling\SettingsContract;
use HubspotSDK\Webhooks\SettingsResponse;

final class SettingsService implements SettingsContract
{
    /**
     * @api
     */
    public SettingsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SettingsRawService($client);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        int $height,
        bool $isReady,
        string $name,
        bool $supportsCustomObjects,
        bool $supportsInboundCalling,
        string $url,
        bool $usesCallingWindow,
        bool $usesRemote,
        int $width,
        ?RequestOptions $requestOptions = null,
    ): SettingsResponse {
        $params = Util::removeNulls(
            [
                'height' => $height,
                'isReady' => $isReady,
                'name' => $name,
                'supportsCustomObjects' => $supportsCustomObjects,
                'supportsInboundCalling' => $supportsInboundCalling,
                'url' => $url,
                'usesCallingWindow' => $usesCallingWindow,
                'usesRemote' => $usesRemote,
                'width' => $width,
            ],
        );

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
        ?int $height = null,
        ?bool $isReady = null,
        ?string $name = null,
        ?bool $supportsCustomObjects = null,
        ?bool $supportsInboundCalling = null,
        ?string $url = null,
        ?bool $usesCallingWindow = null,
        ?bool $usesRemote = null,
        ?int $width = null,
        ?RequestOptions $requestOptions = null,
    ): SettingsResponse {
        $params = Util::removeNulls(
            [
                'height' => $height,
                'isReady' => $isReady,
                'name' => $name,
                'supportsCustomObjects' => $supportsCustomObjects,
                'supportsInboundCalling' => $supportsInboundCalling,
                'url' => $url,
                'usesCallingWindow' => $usesCallingWindow,
                'usesRemote' => $usesRemote,
                'width' => $width,
            ],
        );

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
    ): SettingsResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($appID, requestOptions: $requestOptions);

        return $response->parse();
    }
}

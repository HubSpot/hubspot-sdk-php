<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM\Extensions\Calling;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Implementation\HasRawResponse;
use HubspotSDK\CRM\Extensions\Calling\Settings\SettingCreateParams;
use HubspotSDK\CRM\Extensions\Calling\Settings\SettingUpdateParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CRM\Extensions\Calling\SettingsContract;
use HubspotSDK\Webhooks\WebhooksSettingsResponse;

use const HubspotSDK\Core\OMIT as omit;

final class SettingsService implements SettingsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Configure a calling extension
     *
     * @param string $name
     * @param string $url
     * @param int $height
     * @param bool $isReady
     * @param bool $supportsCustomObjects
     * @param bool $supportsInboundCalling
     * @param bool $usesCallingWindow
     * @param bool $usesRemote
     * @param int $width
     *
     * @return WebhooksSettingsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        $name,
        $url,
        $height = omit,
        $isReady = omit,
        $supportsCustomObjects = omit,
        $supportsInboundCalling = omit,
        $usesCallingWindow = omit,
        $usesRemote = omit,
        $width = omit,
        ?RequestOptions $requestOptions = null,
    ): WebhooksSettingsResponse {
        $params = [
            'name' => $name,
            'url' => $url,
            'height' => $height,
            'isReady' => $isReady,
            'supportsCustomObjects' => $supportsCustomObjects,
            'supportsInboundCalling' => $supportsInboundCalling,
            'usesCallingWindow' => $usesCallingWindow,
            'usesRemote' => $usesRemote,
            'width' => $width,
        ];

        return $this->createRaw($appID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return WebhooksSettingsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        int $appID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): WebhooksSettingsResponse {
        [$parsed, $options] = SettingCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['crm/v3/extensions/calling/%1$s/settings', $appID],
            body: (object) $parsed,
            options: $options,
            convert: WebhooksSettingsResponse::class,
        );
    }

    /**
     * @api
     *
     * Update settings
     *
     * @param int $height
     * @param bool $isReady
     * @param string $name
     * @param bool $supportsCustomObjects
     * @param bool $supportsInboundCalling
     * @param string $url
     * @param bool $usesCallingWindow
     * @param bool $usesRemote
     * @param int $width
     *
     * @return WebhooksSettingsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function update(
        int $appID,
        $height = omit,
        $isReady = omit,
        $name = omit,
        $supportsCustomObjects = omit,
        $supportsInboundCalling = omit,
        $url = omit,
        $usesCallingWindow = omit,
        $usesRemote = omit,
        $width = omit,
        ?RequestOptions $requestOptions = null,
    ): WebhooksSettingsResponse {
        $params = [
            'height' => $height,
            'isReady' => $isReady,
            'name' => $name,
            'supportsCustomObjects' => $supportsCustomObjects,
            'supportsInboundCalling' => $supportsInboundCalling,
            'url' => $url,
            'usesCallingWindow' => $usesCallingWindow,
            'usesRemote' => $usesRemote,
            'width' => $width,
        ];

        return $this->updateRaw($appID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return WebhooksSettingsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        int $appID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): WebhooksSettingsResponse {
        [$parsed, $options] = SettingUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['crm/v3/extensions/calling/%1$s/settings', $appID],
            body: (object) $parsed,
            options: $options,
            convert: WebhooksSettingsResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete calling settings
     *
     * @throws APIException
     */
    public function delete(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = [];

        return $this->deleteRaw($appID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteRaw(
        int $appID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['crm/v3/extensions/calling/%1$s/settings', $appID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve settings
     *
     * @return WebhooksSettingsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function get(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): WebhooksSettingsResponse {
        $params = [];

        return $this->getRaw($appID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return WebhooksSettingsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function getRaw(
        int $appID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): WebhooksSettingsResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/extensions/calling/%1$s/settings', $appID],
            options: $requestOptions,
            convert: WebhooksSettingsResponse::class,
        );
    }
}

<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM\Extensions\Calling;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Implementation\HasRawResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\Webhooks\WebhooksSettingsResponse;

use const HubspotSDK\Core\OMIT as omit;

interface SettingsContract
{
    /**
     * @api
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
    ): WebhooksSettingsResponse;

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
    ): WebhooksSettingsResponse;

    /**
     * @api
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
    ): WebhooksSettingsResponse;

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
    ): WebhooksSettingsResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteRaw(
        int $appID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @return WebhooksSettingsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function get(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): WebhooksSettingsResponse;

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
    ): WebhooksSettingsResponse;
}

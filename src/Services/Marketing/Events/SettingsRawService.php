<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Events;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Events\EventDetailSettings;
use HubspotSDK\Marketing\Events\Settings\SettingCreateOrUpdateParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Events\SettingsRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class SettingsRawService implements SettingsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param array{eventDetailsURL: string}|SettingCreateOrUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EventDetailSettings>
     *
     * @throws APIException
     */
    public function createOrUpdate(
        int $appID,
        array|SettingCreateOrUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SettingCreateOrUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['marketing/marketing-events/2026-03/%1$s/settings', $appID],
            body: (object) $parsed,
            options: $options,
            convert: EventDetailSettings::class,
        );
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EventDetailSettings>
     *
     * @throws APIException
     */
    public function get(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['marketing/marketing-events/2026-03/%1$s/settings', $appID],
            options: $requestOptions,
            convert: EventDetailSettings::class,
        );
    }
}

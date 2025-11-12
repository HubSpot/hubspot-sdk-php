<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\MediaBridge;

use HubspotSDK\Client;
use HubspotSDK\Cms\MediaBridge\BulkIntegratorObjectCreationResponse;
use HubspotSDK\Cms\MediaBridge\Endpoints;
use HubspotSDK\Cms\MediaBridge\EventVisibilityChange;
use HubspotSDK\Cms\MediaBridge\EventVisibilityResponse;
use HubspotSDK\Cms\MediaBridge\IntegratorOEmbedDomainModel;
use HubspotSDK\Cms\MediaBridge\IntegratorSettings\IntegratorSettingCreateObjectDefinitionParams;
use HubspotSDK\Cms\MediaBridge\IntegratorSettings\IntegratorSettingCreateOembedDomainParams;
use HubspotSDK\Cms\MediaBridge\IntegratorSettings\IntegratorSettingGetObjectDefinitionsByMediaTypeParams;
use HubspotSDK\Cms\MediaBridge\IntegratorSettings\IntegratorSettingGetOembedDomainParams;
use HubspotSDK\Cms\MediaBridge\IntegratorSettings\IntegratorSettingRegisterAppNameParams;
use HubspotSDK\Cms\MediaBridge\IntegratorSettings\IntegratorSettingUpdateAppNameParams;
use HubspotSDK\Cms\MediaBridge\IntegratorSettings\IntegratorSettingUpdateEventVisibilitySettingsParams;
use HubspotSDK\Cms\MediaBridge\IntegratorSettings\IntegratorSettingUpdateOembedDomainParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeProviderRegistrationResponse;
use HubspotSDK\Cms\MediaBridge\ObjectDefinitionResponse;
use HubspotSDK\Cms\MediaBridge\OEmbedDomainsCollectionResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\MediaBridge\IntegratorSettingsContract;

final class IntegratorSettingsService implements IntegratorSettingsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new media object type
     *
     * @param array{
     *   mediaTypes: list<"VIDEO"|"AUDIO"|"DOCUMENT"|"OTHER"|"IMAGE">
     * }|IntegratorSettingCreateObjectDefinitionParams $params
     *
     * @throws APIException
     */
    public function createObjectDefinition(
        string $appID,
        array|IntegratorSettingCreateObjectDefinitionParams $params,
        ?RequestOptions $requestOptions = null,
    ): BulkIntegratorObjectCreationResponse {
        [$parsed, $options] = IntegratorSettingCreateObjectDefinitionParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['media-bridge/v1/%1$s/settings/object-definitions', $appID],
            body: (object) $parsed,
            options: $options,
            convert: BulkIntegratorObjectCreationResponse::class,
        );
    }

    /**
     * @api
     *
     * Set up a new oEmbed domain for your media bridge app.
     *
     * @param array{
     *   endpoints: array{
     *     discovery: bool, schemes: list<string>, url: string
     *   }|Endpoints,
     *   portalId?: int,
     * }|IntegratorSettingCreateOembedDomainParams $params
     *
     * @throws APIException
     */
    public function createOembedDomain(
        string $appID,
        array|IntegratorSettingCreateOembedDomainParams $params,
        ?RequestOptions $requestOptions = null,
    ): IntegratorOEmbedDomainModel {
        [$parsed, $options] = IntegratorSettingCreateOembedDomainParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['media-bridge/v1/%1$s/settings/oembed-domains', $appID],
            body: (object) $parsed,
            options: $options,
            convert: IntegratorOEmbedDomainModel::class,
        );
    }

    /**
     * @api
     *
     * Delete an existing oEmbed domain.
     *
     * @throws APIException
     */
    public function deleteOembedDomain(
        string $appID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['media-bridge/v1/%1$s/settings/oembed-domains', $appID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Get the visibility settings for media bridge events for your apps.
     *
     * @throws APIException
     */
    public function getEventVisibilitySettings(
        string $appID,
        ?RequestOptions $requestOptions = null
    ): EventVisibilityResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['media-bridge/v1/%1$s/settings/event-visibility', $appID],
            options: $requestOptions,
            convert: EventVisibilityResponse::class,
        );
    }

    /**
     * @api
     *
     * Get the existing objects types that belong to the specified media type.
     *
     * @param array{
     *   appId: string
     * }|IntegratorSettingGetObjectDefinitionsByMediaTypeParams $params
     *
     * @throws APIException
     */
    public function getObjectDefinitionsByMediaType(
        string $mediaType,
        array|IntegratorSettingGetObjectDefinitionsByMediaTypeParams $params,
        ?RequestOptions $requestOptions = null,
    ): ObjectDefinitionResponse {
        [$parsed, $options] = IntegratorSettingGetObjectDefinitionsByMediaTypeParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'media-bridge/v1/%1$s/settings/object-definitions/%2$s',
                $appID,
                $mediaType,
            ],
            options: $options,
            convert: ObjectDefinitionResponse::class,
        );
    }

    /**
     * @api
     *
     * Get the details for an existing oEmbed domain.
     *
     * @param array{appId: string}|IntegratorSettingGetOembedDomainParams $params
     *
     * @throws APIException
     */
    public function getOembedDomain(
        string $oEmbedDomainID,
        array|IntegratorSettingGetOembedDomainParams $params,
        ?RequestOptions $requestOptions = null,
    ): IntegratorOEmbedDomainModel {
        [$parsed, $options] = IntegratorSettingGetOembedDomainParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'media-bridge/v1/%1$s/settings/oembed-domains/%2$s',
                $appID,
                $oEmbedDomainID,
            ],
            options: $options,
            convert: IntegratorOEmbedDomainModel::class,
        );
    }

    /**
     * @api
     *
     * Get the details for existing oEmbed domains for your app
     *
     * @throws APIException
     */
    public function listOembedDomains(
        string $appID,
        ?RequestOptions $requestOptions = null
    ): OEmbedDomainsCollectionResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['media-bridge/v1/%1$s/settings/oembed-domains', $appID],
            options: $requestOptions,
            convert: OEmbedDomainsCollectionResponse::class,
        );
    }

    /**
     * @deprecated
     *
     * @api
     *
     * Register the name that your app will display when a user is selecting media bridge items.
     *
     * @param array{
     *   updatedAt: int, name?: string
     * }|IntegratorSettingRegisterAppNameParams $params
     *
     * @throws APIException
     */
    public function registerAppName(
        string $appID,
        array|IntegratorSettingRegisterAppNameParams $params,
        ?RequestOptions $requestOptions = null,
    ): MediaBridgeProviderRegistrationResponse {
        [$parsed, $options] = IntegratorSettingRegisterAppNameParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['media-bridge/v1/%1$s/settings/register', $appID],
            body: (object) $parsed,
            options: $options,
            convert: MediaBridgeProviderRegistrationResponse::class,
        );
    }

    /**
     * @api
     *
     * Update the name that your app will display when a user is selecting media bridge items.
     *
     * @param array{
     *   updatedAt: int, name?: string
     * }|IntegratorSettingUpdateAppNameParams $params
     *
     * @throws APIException
     */
    public function updateAppName(
        string $appID,
        array|IntegratorSettingUpdateAppNameParams $params,
        ?RequestOptions $requestOptions = null,
    ): MediaBridgeProviderRegistrationResponse {
        [$parsed, $options] = IntegratorSettingUpdateAppNameParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: ['media-bridge/v1/%1$s/settings', $appID],
            body: (object) $parsed,
            options: $options,
            convert: MediaBridgeProviderRegistrationResponse::class,
        );
    }

    /**
     * @api
     *
     * Set the visibility settings for media bridge events created by your app.
     *
     * @param array{
     *   eventType: "ALL"|"MEDIA_PLAYS"|"MEDIA_PLAYS_PERCENT"|"ATTENTION_SPAN",
     *   updatedAt: int,
     *   showInReporting?: bool,
     *   showInTimeline?: bool,
     *   showInWorkflows?: bool,
     * }|IntegratorSettingUpdateEventVisibilitySettingsParams $params
     *
     * @throws APIException
     */
    public function updateEventVisibilitySettings(
        string $appID,
        array|IntegratorSettingUpdateEventVisibilitySettingsParams $params,
        ?RequestOptions $requestOptions = null,
    ): EventVisibilityChange {
        [$parsed, $options] = IntegratorSettingUpdateEventVisibilitySettingsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['media-bridge/v1/%1$s/settings/event-visibility', $appID],
            body: (object) $parsed,
            options: $options,
            convert: EventVisibilityChange::class,
        );
    }

    /**
     * @api
     *
     * Update an existing oEmbed domain.
     *
     * @param array{
     *   appId: string,
     *   endpoints: array{
     *     discovery: bool, schemes: list<string>, url: string
     *   }|Endpoints,
     *   portalId?: int,
     * }|IntegratorSettingUpdateOembedDomainParams $params
     *
     * @throws APIException
     */
    public function updateOembedDomain(
        string $oEmbedDomainID,
        array|IntegratorSettingUpdateOembedDomainParams $params,
        ?RequestOptions $requestOptions = null,
    ): IntegratorOEmbedDomainModel {
        [$parsed, $options] = IntegratorSettingUpdateOembedDomainParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: [
                'media-bridge/v1/%1$s/settings/oembed-domains/%2$s',
                $appID,
                $oEmbedDomainID,
            ],
            body: (object) array_diff_key($parsed, ['appId']),
            options: $options,
            convert: IntegratorOEmbedDomainModel::class,
        );
    }
}

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
use HubspotSDK\Cms\MediaBridge\IntegratorSettings\IntegratorSettingCreateObjectDefinitionParams\MediaType;
use HubspotSDK\Cms\MediaBridge\IntegratorSettings\IntegratorSettingCreateOembedDomainParams;
use HubspotSDK\Cms\MediaBridge\IntegratorSettings\IntegratorSettingGetObjectDefinitionsByMediaTypeParams;
use HubspotSDK\Cms\MediaBridge\IntegratorSettings\IntegratorSettingGetOembedDomainParams;
use HubspotSDK\Cms\MediaBridge\IntegratorSettings\IntegratorSettingRegisterAppNameParams;
use HubspotSDK\Cms\MediaBridge\IntegratorSettings\IntegratorSettingUpdateAppNameParams;
use HubspotSDK\Cms\MediaBridge\IntegratorSettings\IntegratorSettingUpdateEventVisibilitySettingsParams;
use HubspotSDK\Cms\MediaBridge\IntegratorSettings\IntegratorSettingUpdateEventVisibilitySettingsParams\EventType;
use HubspotSDK\Cms\MediaBridge\IntegratorSettings\IntegratorSettingUpdateOembedDomainParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeProviderRegistrationResponse;
use HubspotSDK\Cms\MediaBridge\ObjectDefinitionResponse;
use HubspotSDK\Cms\MediaBridge\OEmbedDomainsCollectionResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\MediaBridge\IntegratorSettingsContract;

use const HubspotSDK\Core\OMIT as omit;

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
     * @param list<MediaType|value-of<MediaType>> $mediaTypes
     *
     * @throws APIException
     */
    public function createObjectDefinition(
        string $appID,
        $mediaTypes,
        ?RequestOptions $requestOptions = null
    ): BulkIntegratorObjectCreationResponse {
        $params = ['mediaTypes' => $mediaTypes];

        return $this->createObjectDefinitionRaw($appID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createObjectDefinitionRaw(
        string $appID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): BulkIntegratorObjectCreationResponse {
        [
            $parsed, $options,
        ] = IntegratorSettingCreateObjectDefinitionParams::parseRequest(
            $params,
            $requestOptions
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
     * @param Endpoints $endpoints
     * @param int $portalID
     *
     * @throws APIException
     */
    public function createOembedDomain(
        string $appID,
        $endpoints,
        $portalID = omit,
        ?RequestOptions $requestOptions = null,
    ): IntegratorOEmbedDomainModel {
        $params = ['endpoints' => $endpoints, 'portalID' => $portalID];

        return $this->createOembedDomainRaw($appID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createOembedDomainRaw(
        string $appID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): IntegratorOEmbedDomainModel {
        [
            $parsed, $options,
        ] = IntegratorSettingCreateOembedDomainParams::parseRequest(
            $params,
            $requestOptions
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
     * @param string $appID
     *
     * @throws APIException
     */
    public function getObjectDefinitionsByMediaType(
        string $mediaType,
        $appID,
        ?RequestOptions $requestOptions = null
    ): ObjectDefinitionResponse {
        $params = ['appID' => $appID];

        return $this->getObjectDefinitionsByMediaTypeRaw(
            $mediaType,
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getObjectDefinitionsByMediaTypeRaw(
        string $mediaType,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ObjectDefinitionResponse {
        [
            $parsed, $options,
        ] = IntegratorSettingGetObjectDefinitionsByMediaTypeParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

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
     * @param string $appID
     *
     * @throws APIException
     */
    public function getOembedDomain(
        string $oEmbedDomainID,
        $appID,
        ?RequestOptions $requestOptions = null
    ): IntegratorOEmbedDomainModel {
        $params = ['appID' => $appID];

        return $this->getOembedDomainRaw($oEmbedDomainID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getOembedDomainRaw(
        string $oEmbedDomainID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): IntegratorOEmbedDomainModel {
        [$parsed, $options] = IntegratorSettingGetOembedDomainParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

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
     * @param int $updatedAt
     * @param string $name
     *
     * @throws APIException
     */
    public function registerAppName(
        string $appID,
        $updatedAt,
        $name = omit,
        ?RequestOptions $requestOptions = null,
    ): MediaBridgeProviderRegistrationResponse {
        $params = ['updatedAt' => $updatedAt, 'name' => $name];

        return $this->registerAppNameRaw($appID, $params, $requestOptions);
    }

    /**
     * @deprecated
     *
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function registerAppNameRaw(
        string $appID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): MediaBridgeProviderRegistrationResponse {
        [$parsed, $options] = IntegratorSettingRegisterAppNameParams::parseRequest(
            $params,
            $requestOptions
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
     * @param int $updatedAt
     * @param string $name
     *
     * @throws APIException
     */
    public function updateAppName(
        string $appID,
        $updatedAt,
        $name = omit,
        ?RequestOptions $requestOptions = null,
    ): MediaBridgeProviderRegistrationResponse {
        $params = ['updatedAt' => $updatedAt, 'name' => $name];

        return $this->updateAppNameRaw($appID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateAppNameRaw(
        string $appID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): MediaBridgeProviderRegistrationResponse {
        [$parsed, $options] = IntegratorSettingUpdateAppNameParams::parseRequest(
            $params,
            $requestOptions
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
     * @param EventType|value-of<EventType> $eventType
     * @param int $updatedAt
     * @param bool $showInReporting
     * @param bool $showInTimeline
     * @param bool $showInWorkflows
     *
     * @throws APIException
     */
    public function updateEventVisibilitySettings(
        string $appID,
        $eventType,
        $updatedAt,
        $showInReporting = omit,
        $showInTimeline = omit,
        $showInWorkflows = omit,
        ?RequestOptions $requestOptions = null,
    ): EventVisibilityChange {
        $params = [
            'eventType' => $eventType,
            'updatedAt' => $updatedAt,
            'showInReporting' => $showInReporting,
            'showInTimeline' => $showInTimeline,
            'showInWorkflows' => $showInWorkflows,
        ];

        return $this->updateEventVisibilitySettingsRaw(
            $appID,
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateEventVisibilitySettingsRaw(
        string $appID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): EventVisibilityChange {
        [
            $parsed, $options,
        ] = IntegratorSettingUpdateEventVisibilitySettingsParams::parseRequest(
            $params,
            $requestOptions
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
     * @param string $appID
     * @param Endpoints $endpoints
     * @param int $portalID
     *
     * @throws APIException
     */
    public function updateOembedDomain(
        string $oEmbedDomainID,
        $appID,
        $endpoints,
        $portalID = omit,
        ?RequestOptions $requestOptions = null,
    ): IntegratorOEmbedDomainModel {
        $params = [
            'appID' => $appID, 'endpoints' => $endpoints, 'portalID' => $portalID,
        ];

        return $this->updateOembedDomainRaw(
            $oEmbedDomainID,
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateOembedDomainRaw(
        string $oEmbedDomainID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): IntegratorOEmbedDomainModel {
        [
            $parsed, $options,
        ] = IntegratorSettingUpdateOembedDomainParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: [
                'media-bridge/v1/%1$s/settings/oembed-domains/%2$s',
                $appID,
                $oEmbedDomainID,
            ],
            body: (object) array_diff_key($parsed, ['appID']),
            options: $options,
            convert: IntegratorOEmbedDomainModel::class,
        );
    }
}

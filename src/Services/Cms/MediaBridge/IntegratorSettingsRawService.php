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
use HubspotSDK\Cms\MediaBridge\IntegratorSettings\IntegratorSettingDeleteOembedDomainParams;
use HubspotSDK\Cms\MediaBridge\IntegratorSettings\IntegratorSettingGetObjectDefinitionsByMediaTypeParams;
use HubspotSDK\Cms\MediaBridge\IntegratorSettings\IntegratorSettingGetObjectDefinitionsByMediaTypeParams\MediaType;
use HubspotSDK\Cms\MediaBridge\IntegratorSettings\IntegratorSettingGetOembedDomainParams;
use HubspotSDK\Cms\MediaBridge\IntegratorSettings\IntegratorSettingListOembedDomainsParams;
use HubspotSDK\Cms\MediaBridge\IntegratorSettings\IntegratorSettingRegisterAppNameParams;
use HubspotSDK\Cms\MediaBridge\IntegratorSettings\IntegratorSettingUpdateAppNameParams;
use HubspotSDK\Cms\MediaBridge\IntegratorSettings\IntegratorSettingUpdateEventVisibilitySettingsParams;
use HubspotSDK\Cms\MediaBridge\IntegratorSettings\IntegratorSettingUpdateEventVisibilitySettingsParams\EventType;
use HubspotSDK\Cms\MediaBridge\IntegratorSettings\IntegratorSettingUpdateOembedDomainParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeProviderRegistrationResponse;
use HubspotSDK\Cms\MediaBridge\ObjectDefinitionResponse;
use HubspotSDK\Cms\MediaBridge\OEmbedDomainsCollectionResponse;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\MediaBridge\IntegratorSettingsRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 * @phpstan-import-type EndpointsShape from \HubspotSDK\Cms\MediaBridge\Endpoints
 */
final class IntegratorSettingsRawService implements IntegratorSettingsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new media object type
     *
     * @param int $appID The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param array{
     *   mediaTypes: list<IntegratorSettingCreateObjectDefinitionParams\MediaType|value-of<IntegratorSettingCreateObjectDefinitionParams\MediaType>>,
     * }|IntegratorSettingCreateObjectDefinitionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BulkIntegratorObjectCreationResponse>
     *
     * @throws APIException
     */
    public function createObjectDefinition(
        int $appID,
        array|IntegratorSettingCreateObjectDefinitionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = IntegratorSettingCreateObjectDefinitionParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param int $appID The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param array{
     *   endpoints: Endpoints|EndpointsShape, portalID?: int
     * }|IntegratorSettingCreateOembedDomainParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<IntegratorOEmbedDomainModel>
     *
     * @throws APIException
     */
    public function createOembedDomain(
        int $appID,
        array|IntegratorSettingCreateOembedDomainParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = IntegratorSettingCreateOembedDomainParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param int $appID The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param array{
     *   id?: int, domainPortalID?: int
     * }|IntegratorSettingDeleteOembedDomainParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteOembedDomain(
        int $appID,
        array|IntegratorSettingDeleteOembedDomainParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = IntegratorSettingDeleteOembedDomainParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['media-bridge/v1/%1$s/settings/oembed-domains', $appID],
            query: Util::array_transform_keys(
                $parsed,
                ['domainPortalID' => 'domainPortalId']
            ),
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Get the visibility settings for media bridge events for your apps.
     *
     * @param int $appID The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EventVisibilityResponse>
     *
     * @throws APIException
     */
    public function getEventVisibilitySettings(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param MediaType|value-of<MediaType> $mediaType path param: The type of media that you want to get the object types for
     * @param array{
     *   appID: int, includeFullDefinition?: bool
     * }|IntegratorSettingGetObjectDefinitionsByMediaTypeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ObjectDefinitionResponse>
     *
     * @throws APIException
     */
    public function getObjectDefinitionsByMediaType(
        MediaType|string $mediaType,
        array|IntegratorSettingGetObjectDefinitionsByMediaTypeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = IntegratorSettingGetObjectDefinitionsByMediaTypeParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'media-bridge/v1/%1$s/settings/object-definitions/%2$s',
                $appID,
                $mediaType,
            ],
            query: $parsed,
            options: $options,
            convert: ObjectDefinitionResponse::class,
        );
    }

    /**
     * @api
     *
     * Get the details for an existing oEmbed domain.
     *
     * @param string $oEmbedDomainID the ID for the oEmbed domain
     * @param array{appID: int}|IntegratorSettingGetOembedDomainParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<IntegratorOEmbedDomainModel>
     *
     * @throws APIException
     */
    public function getOembedDomain(
        string $oEmbedDomainID,
        array|IntegratorSettingGetOembedDomainParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = IntegratorSettingGetOembedDomainParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
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
     * @param int $appID The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param array{
     *   domainPortalID?: int
     * }|IntegratorSettingListOembedDomainsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<OEmbedDomainsCollectionResponse>
     *
     * @throws APIException
     */
    public function listOembedDomains(
        int $appID,
        array|IntegratorSettingListOembedDomainsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = IntegratorSettingListOembedDomainsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['media-bridge/v1/%1$s/settings/oembed-domains', $appID],
            query: Util::array_transform_keys(
                $parsed,
                ['domainPortalID' => 'domainPortalId']
            ),
            options: $options,
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
     * @param int $appID The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param array{
     *   updatedAt: int, name?: string
     * }|IntegratorSettingRegisterAppNameParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MediaBridgeProviderRegistrationResponse>
     *
     * @throws APIException
     */
    public function registerAppName(
        int $appID,
        array|IntegratorSettingRegisterAppNameParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = IntegratorSettingRegisterAppNameParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param int $appID The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param array{
     *   updatedAt: int, name?: string
     * }|IntegratorSettingUpdateAppNameParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MediaBridgeProviderRegistrationResponse>
     *
     * @throws APIException
     */
    public function updateAppName(
        int $appID,
        array|IntegratorSettingUpdateAppNameParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = IntegratorSettingUpdateAppNameParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param int $appID The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param array{
     *   eventType: EventType|value-of<EventType>,
     *   updatedAt: int,
     *   showInReporting?: bool,
     *   showInTimeline?: bool,
     *   showInWorkflows?: bool,
     * }|IntegratorSettingUpdateEventVisibilitySettingsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EventVisibilityChange>
     *
     * @throws APIException
     */
    public function updateEventVisibilitySettings(
        int $appID,
        array|IntegratorSettingUpdateEventVisibilitySettingsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = IntegratorSettingUpdateEventVisibilitySettingsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $oEmbedDomainID path param: The ID of the domain to update
     * @param array{
     *   appID: int, endpoints: Endpoints|EndpointsShape, portalID?: int
     * }|IntegratorSettingUpdateOembedDomainParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<IntegratorOEmbedDomainModel>
     *
     * @throws APIException
     */
    public function updateOembedDomain(
        string $oEmbedDomainID,
        array|IntegratorSettingUpdateOembedDomainParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = IntegratorSettingUpdateOembedDomainParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: [
                'media-bridge/v1/%1$s/settings/oembed-domains/%2$s',
                $appID,
                $oEmbedDomainID,
            ],
            body: (object) array_diff_key($parsed, array_flip(['appID'])),
            options: $options,
            convert: IntegratorOEmbedDomainModel::class,
        );
    }
}

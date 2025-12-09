<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\MediaBridge;

use HubspotSDK\Client;
use HubspotSDK\Cms\MediaBridge\BulkIntegratorObjectCreationResponse;
use HubspotSDK\Cms\MediaBridge\Endpoints;
use HubspotSDK\Cms\MediaBridge\EventVisibilityChange;
use HubspotSDK\Cms\MediaBridge\EventVisibilityResponse;
use HubspotSDK\Cms\MediaBridge\IntegratorOEmbedDomainModel;
use HubspotSDK\Cms\MediaBridge\IntegratorSettings\IntegratorSettingGetObjectDefinitionsByMediaTypeParams\MediaType;
use HubspotSDK\Cms\MediaBridge\IntegratorSettings\IntegratorSettingUpdateEventVisibilitySettingsParams\EventType;
use HubspotSDK\Cms\MediaBridge\MediaBridgeProviderRegistrationResponse;
use HubspotSDK\Cms\MediaBridge\ObjectDefinitionResponse;
use HubspotSDK\Cms\MediaBridge\OEmbedDomainsCollectionResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\MediaBridge\IntegratorSettingsContract;

final class IntegratorSettingsService implements IntegratorSettingsContract
{
    /**
     * @api
     */
    public IntegratorSettingsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new IntegratorSettingsRawService($client);
    }

    /**
     * @api
     *
     * Create a new media object type
     *
     * @param int $appID The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param list<'VIDEO'|'AUDIO'|'DOCUMENT'|'OTHER'|'IMAGE'|\HubspotSDK\Cms\MediaBridge\IntegratorSettings\IntegratorSettingCreateObjectDefinitionParams\MediaType> $mediaTypes
     *
     * @throws APIException
     */
    public function createObjectDefinition(
        int $appID,
        array $mediaTypes,
        ?RequestOptions $requestOptions = null
    ): BulkIntegratorObjectCreationResponse {
        $params = ['mediaTypes' => $mediaTypes];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createObjectDefinition($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Set up a new oEmbed domain for your media bridge app.
     *
     * @param int $appID The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param array{
     *   discovery: bool, schemes: list<string>, url: string
     * }|Endpoints $endpoints
     *
     * @throws APIException
     */
    public function createOembedDomain(
        int $appID,
        array|Endpoints $endpoints,
        ?int $portalID = null,
        ?RequestOptions $requestOptions = null,
    ): IntegratorOEmbedDomainModel {
        $params = ['endpoints' => $endpoints, 'portalID' => $portalID];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createOembedDomain($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete an existing oEmbed domain.
     *
     * @param int $appID The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param int $id the ID of the oEmbed to delete
     * @param int $domainPortalID filter response by Hub ID
     *
     * @throws APIException
     */
    public function deleteOembedDomain(
        int $appID,
        ?int $id = null,
        int $domainPortalID = -1,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = ['id' => $id, 'domainPortalID' => $domainPortalID];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteOembedDomain($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the visibility settings for media bridge events for your apps.
     *
     * @param int $appID The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     *
     * @throws APIException
     */
    public function getEventVisibilitySettings(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): EventVisibilityResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getEventVisibilitySettings($appID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the existing objects types that belong to the specified media type.
     *
     * @param MediaType|value-of<MediaType> $mediaType path param: The type of media that you want to get the object types for
     * @param int $appID Path param: The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param bool $includeFullDefinition query param: Include the full definition in the response
     *
     * @throws APIException
     */
    public function getObjectDefinitionsByMediaType(
        MediaType|string $mediaType,
        int $appID,
        ?bool $includeFullDefinition = null,
        ?RequestOptions $requestOptions = null,
    ): ObjectDefinitionResponse {
        $params = [
            'appID' => $appID, 'includeFullDefinition' => $includeFullDefinition,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getObjectDefinitionsByMediaType($mediaType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the details for an existing oEmbed domain.
     *
     * @param string $oEmbedDomainID the ID for the oEmbed domain
     * @param int $appID The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     *
     * @throws APIException
     */
    public function getOembedDomain(
        string $oEmbedDomainID,
        int $appID,
        ?RequestOptions $requestOptions = null
    ): IntegratorOEmbedDomainModel {
        $params = ['appID' => $appID];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getOembedDomain($oEmbedDomainID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the details for existing oEmbed domains for your app
     *
     * @param int $appID The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param int $domainPortalID filter response by Hub ID
     *
     * @throws APIException
     */
    public function listOembedDomains(
        int $appID,
        int $domainPortalID = -1,
        ?RequestOptions $requestOptions = null
    ): OEmbedDomainsCollectionResponse {
        $params = ['domainPortalID' => $domainPortalID];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listOembedDomains($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @deprecated
     *
     * @api
     *
     * Register the name that your app will display when a user is selecting media bridge items.
     *
     * @param int $appID The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     *
     * @throws APIException
     */
    public function registerAppName(
        int $appID,
        int $updatedAt,
        ?string $name = null,
        ?RequestOptions $requestOptions = null,
    ): MediaBridgeProviderRegistrationResponse {
        $params = ['updatedAt' => $updatedAt, 'name' => $name];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->registerAppName($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update the name that your app will display when a user is selecting media bridge items.
     *
     * @param int $appID The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     *
     * @throws APIException
     */
    public function updateAppName(
        int $appID,
        int $updatedAt,
        ?string $name = null,
        ?RequestOptions $requestOptions = null,
    ): MediaBridgeProviderRegistrationResponse {
        $params = ['updatedAt' => $updatedAt, 'name' => $name];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateAppName($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Set the visibility settings for media bridge events created by your app.
     *
     * @param int $appID The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param 'ALL'|'ATTENTION_SPAN'|'MEDIA_PLAYS'|'MEDIA_PLAYS_PERCENT'|EventType $eventType
     *
     * @throws APIException
     */
    public function updateEventVisibilitySettings(
        int $appID,
        string|EventType $eventType,
        int $updatedAt,
        ?bool $showInReporting = null,
        ?bool $showInTimeline = null,
        ?bool $showInWorkflows = null,
        ?RequestOptions $requestOptions = null,
    ): EventVisibilityChange {
        $params = [
            'eventType' => $eventType,
            'updatedAt' => $updatedAt,
            'showInReporting' => $showInReporting,
            'showInTimeline' => $showInTimeline,
            'showInWorkflows' => $showInWorkflows,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateEventVisibilitySettings($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update an existing oEmbed domain.
     *
     * @param string $oEmbedDomainID path param: The ID of the domain to update
     * @param int $appID Path param: The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param array{
     *   discovery: bool, schemes: list<string>, url: string
     * }|Endpoints $endpoints Body param:
     * @param int $portalID Body param:
     *
     * @throws APIException
     */
    public function updateOembedDomain(
        string $oEmbedDomainID,
        int $appID,
        array|Endpoints $endpoints,
        ?int $portalID = null,
        ?RequestOptions $requestOptions = null,
    ): IntegratorOEmbedDomainModel {
        $params = [
            'appID' => $appID, 'endpoints' => $endpoints, 'portalID' => $portalID,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateOembedDomain($oEmbedDomainID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}

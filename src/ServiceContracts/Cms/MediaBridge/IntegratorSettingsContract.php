<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\MediaBridge;

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

interface IntegratorSettingsContract
{
    /**
     * @api
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
    ): BulkIntegratorObjectCreationResponse;

    /**
     * @api
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
    ): IntegratorOEmbedDomainModel;

    /**
     * @api
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
    ): mixed;

    /**
     * @api
     *
     * @param int $appID The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     *
     * @throws APIException
     */
    public function getEventVisibilitySettings(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): EventVisibilityResponse;

    /**
     * @api
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
    ): ObjectDefinitionResponse;

    /**
     * @api
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
    ): IntegratorOEmbedDomainModel;

    /**
     * @api
     *
     * @param int $appID The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param int $domainPortalID filter response by Hub ID
     *
     * @throws APIException
     */
    public function listOembedDomains(
        int $appID,
        int $domainPortalID = -1,
        ?RequestOptions $requestOptions = null,
    ): OEmbedDomainsCollectionResponse;

    /**
     * @deprecated
     *
     * @api
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
    ): MediaBridgeProviderRegistrationResponse;

    /**
     * @api
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
    ): MediaBridgeProviderRegistrationResponse;

    /**
     * @api
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
    ): EventVisibilityChange;

    /**
     * @api
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
    ): IntegratorOEmbedDomainModel;
}

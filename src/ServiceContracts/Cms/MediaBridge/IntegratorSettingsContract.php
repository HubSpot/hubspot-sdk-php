<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\BulkIntegratorObjectCreationResponse;
use HubspotSDK\Cms\MediaBridge\Endpoints;
use HubspotSDK\Cms\MediaBridge\EventVisibilityChange;
use HubspotSDK\Cms\MediaBridge\EventVisibilityResponse;
use HubspotSDK\Cms\MediaBridge\IntegratorOEmbedDomainModel;
use HubspotSDK\Cms\MediaBridge\IntegratorSettings\IntegratorSettingCreateObjectDefinitionParams\MediaType;
use HubspotSDK\Cms\MediaBridge\IntegratorSettings\IntegratorSettingUpdateEventVisibilitySettingsParams\EventType;
use HubspotSDK\Cms\MediaBridge\MediaBridgeProviderRegistrationResponse;
use HubspotSDK\Cms\MediaBridge\ObjectDefinitionResponse;
use HubspotSDK\Cms\MediaBridge\OEmbedDomainsCollectionResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface IntegratorSettingsContract
{
    /**
     * @api
     *
     * @param list<MediaType|value-of<MediaType>> $mediaTypes
     *
     * @throws APIException
     */
    public function createObjectDefinition(
        string $appID,
        $mediaTypes,
        ?RequestOptions $requestOptions = null
    ): BulkIntegratorObjectCreationResponse;

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
    ): BulkIntegratorObjectCreationResponse;

    /**
     * @api
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
    ): IntegratorOEmbedDomainModel;

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
    ): IntegratorOEmbedDomainModel;

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteOembedDomain(
        string $appID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getEventVisibilitySettings(
        string $appID,
        ?RequestOptions $requestOptions = null
    ): EventVisibilityResponse;

    /**
     * @api
     *
     * @param string $appID
     *
     * @throws APIException
     */
    public function getObjectDefinitionsByMediaType(
        string $mediaType,
        $appID,
        ?RequestOptions $requestOptions = null
    ): ObjectDefinitionResponse;

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
    ): ObjectDefinitionResponse;

    /**
     * @api
     *
     * @param string $appID
     *
     * @throws APIException
     */
    public function getOembedDomain(
        string $oEmbedDomainID,
        $appID,
        ?RequestOptions $requestOptions = null
    ): IntegratorOEmbedDomainModel;

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
    ): IntegratorOEmbedDomainModel;

    /**
     * @api
     *
     * @throws APIException
     */
    public function listOembedDomains(
        string $appID,
        ?RequestOptions $requestOptions = null
    ): OEmbedDomainsCollectionResponse;

    /**
     * @deprecated
     *
     * @api
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
    ): MediaBridgeProviderRegistrationResponse;

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
    ): MediaBridgeProviderRegistrationResponse;

    /**
     * @api
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
    ): MediaBridgeProviderRegistrationResponse;

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
    ): MediaBridgeProviderRegistrationResponse;

    /**
     * @api
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
    ): EventVisibilityChange;

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
    ): EventVisibilityChange;

    /**
     * @api
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
    ): IntegratorOEmbedDomainModel;

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
    ): IntegratorOEmbedDomainModel;
}

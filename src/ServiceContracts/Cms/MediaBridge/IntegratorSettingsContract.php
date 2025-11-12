<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\BulkIntegratorObjectCreationResponse;
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

interface IntegratorSettingsContract
{
    /**
     * @api
     *
     * @param array<mixed>|IntegratorSettingCreateObjectDefinitionParams $params
     *
     * @throws APIException
     */
    public function createObjectDefinition(
        string $appID,
        array|IntegratorSettingCreateObjectDefinitionParams $params,
        ?RequestOptions $requestOptions = null,
    ): BulkIntegratorObjectCreationResponse;

    /**
     * @api
     *
     * @param array<mixed>|IntegratorSettingCreateOembedDomainParams $params
     *
     * @throws APIException
     */
    public function createOembedDomain(
        string $appID,
        array|IntegratorSettingCreateOembedDomainParams $params,
        ?RequestOptions $requestOptions = null,
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
     * @param array<mixed>|IntegratorSettingGetObjectDefinitionsByMediaTypeParams $params
     *
     * @throws APIException
     */
    public function getObjectDefinitionsByMediaType(
        string $mediaType,
        array|IntegratorSettingGetObjectDefinitionsByMediaTypeParams $params,
        ?RequestOptions $requestOptions = null,
    ): ObjectDefinitionResponse;

    /**
     * @api
     *
     * @param array<mixed>|IntegratorSettingGetOembedDomainParams $params
     *
     * @throws APIException
     */
    public function getOembedDomain(
        string $oEmbedDomainID,
        array|IntegratorSettingGetOembedDomainParams $params,
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
     * @param array<mixed>|IntegratorSettingRegisterAppNameParams $params
     *
     * @throws APIException
     */
    public function registerAppName(
        string $appID,
        array|IntegratorSettingRegisterAppNameParams $params,
        ?RequestOptions $requestOptions = null,
    ): MediaBridgeProviderRegistrationResponse;

    /**
     * @api
     *
     * @param array<mixed>|IntegratorSettingUpdateAppNameParams $params
     *
     * @throws APIException
     */
    public function updateAppName(
        string $appID,
        array|IntegratorSettingUpdateAppNameParams $params,
        ?RequestOptions $requestOptions = null,
    ): MediaBridgeProviderRegistrationResponse;

    /**
     * @api
     *
     * @param array<mixed>|IntegratorSettingUpdateEventVisibilitySettingsParams $params
     *
     * @throws APIException
     */
    public function updateEventVisibilitySettings(
        string $appID,
        array|IntegratorSettingUpdateEventVisibilitySettingsParams $params,
        ?RequestOptions $requestOptions = null,
    ): EventVisibilityChange;

    /**
     * @api
     *
     * @param array<mixed>|IntegratorSettingUpdateOembedDomainParams $params
     *
     * @throws APIException
     */
    public function updateOembedDomain(
        string $oEmbedDomainID,
        array|IntegratorSettingUpdateOembedDomainParams $params,
        ?RequestOptions $requestOptions = null,
    ): IntegratorOEmbedDomainModel;
}

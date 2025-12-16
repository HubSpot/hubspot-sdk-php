<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\BulkIntegratorObjectCreationResponse;
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
use HubspotSDK\Cms\MediaBridge\IntegratorSettings\IntegratorSettingUpdateOembedDomainParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeProviderRegistrationResponse;
use HubspotSDK\Cms\MediaBridge\ObjectDefinitionResponse;
use HubspotSDK\Cms\MediaBridge\OEmbedDomainsCollectionResponse;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface IntegratorSettingsRawContract
{
    /**
     * @api
     *
     * @param int $appID The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param array<string,mixed>|IntegratorSettingCreateObjectDefinitionParams $params
     *
     * @return BaseResponse<BulkIntegratorObjectCreationResponse>
     *
     * @throws APIException
     */
    public function createObjectDefinition(
        int $appID,
        array|IntegratorSettingCreateObjectDefinitionParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $appID The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param array<string,mixed>|IntegratorSettingCreateOembedDomainParams $params
     *
     * @return BaseResponse<IntegratorOEmbedDomainModel>
     *
     * @throws APIException
     */
    public function createOembedDomain(
        int $appID,
        array|IntegratorSettingCreateOembedDomainParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $appID The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param array<string,mixed>|IntegratorSettingDeleteOembedDomainParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteOembedDomain(
        int $appID,
        array|IntegratorSettingDeleteOembedDomainParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $appID The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     *
     * @return BaseResponse<EventVisibilityResponse>
     *
     * @throws APIException
     */
    public function getEventVisibilitySettings(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param MediaType|value-of<MediaType> $mediaType path param: The type of media that you want to get the object types for
     * @param array<string,mixed>|IntegratorSettingGetObjectDefinitionsByMediaTypeParams $params
     *
     * @return BaseResponse<ObjectDefinitionResponse>
     *
     * @throws APIException
     */
    public function getObjectDefinitionsByMediaType(
        MediaType|string $mediaType,
        array|IntegratorSettingGetObjectDefinitionsByMediaTypeParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $oEmbedDomainID the ID for the oEmbed domain
     * @param array<string,mixed>|IntegratorSettingGetOembedDomainParams $params
     *
     * @return BaseResponse<IntegratorOEmbedDomainModel>
     *
     * @throws APIException
     */
    public function getOembedDomain(
        string $oEmbedDomainID,
        array|IntegratorSettingGetOembedDomainParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $appID The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param array<string,mixed>|IntegratorSettingListOembedDomainsParams $params
     *
     * @return BaseResponse<OEmbedDomainsCollectionResponse>
     *
     * @throws APIException
     */
    public function listOembedDomains(
        int $appID,
        array|IntegratorSettingListOembedDomainsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param int $appID The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param array<string,mixed>|IntegratorSettingRegisterAppNameParams $params
     *
     * @return BaseResponse<MediaBridgeProviderRegistrationResponse>
     *
     * @throws APIException
     */
    public function registerAppName(
        int $appID,
        array|IntegratorSettingRegisterAppNameParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $appID The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param array<string,mixed>|IntegratorSettingUpdateAppNameParams $params
     *
     * @return BaseResponse<MediaBridgeProviderRegistrationResponse>
     *
     * @throws APIException
     */
    public function updateAppName(
        int $appID,
        array|IntegratorSettingUpdateAppNameParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $appID The appId for the media bridge app. It is possible to have multiple apps in your developer account that use the media bridge.
     * @param array<string,mixed>|IntegratorSettingUpdateEventVisibilitySettingsParams $params
     *
     * @return BaseResponse<EventVisibilityChange>
     *
     * @throws APIException
     */
    public function updateEventVisibilitySettings(
        int $appID,
        array|IntegratorSettingUpdateEventVisibilitySettingsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $oEmbedDomainID path param: The ID of the domain to update
     * @param array<string,mixed>|IntegratorSettingUpdateOembedDomainParams $params
     *
     * @return BaseResponse<IntegratorOEmbedDomainModel>
     *
     * @throws APIException
     */
    public function updateOembedDomain(
        string $oEmbedDomainID,
        array|IntegratorSettingUpdateOembedDomainParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}

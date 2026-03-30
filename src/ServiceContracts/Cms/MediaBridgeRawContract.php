<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms;

use HubspotSDK\AssociationDefinition;
use HubspotSDK\Cms\MediaBridge\AttentionSpanEvent;
use HubspotSDK\Cms\MediaBridge\BulkIntegratorObjectCreationResponse;
use HubspotSDK\Cms\MediaBridge\CollectionResponseObjectSchemaNoPaging;
use HubspotSDK\Cms\MediaBridge\CollectionResponsePropertyNoPaging;
use HubspotSDK\Cms\MediaBridge\EventVisibilityChange;
use HubspotSDK\Cms\MediaBridge\EventVisibilityResponse;
use HubspotSDK\Cms\MediaBridge\IntegratorOEmbedDomainModel;
use HubspotSDK\Cms\MediaBridge\MediaBridgeCreateAssociationParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeCreateAttentionSpanEventParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeCreateMediaPlayedEventParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeCreateMediaPlayedPercentEventParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeCreateObjectTypeParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeCreateOembedDomainParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeCreatePropertyGroupParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeCreatePropertyParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeDeleteAssociationParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeDeleteOembedDomainParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeDeletePropertyGroupParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeDeletePropertyParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeGetOembedDomainParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeGetPropertyGroupParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeGetPropertyParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeGetSchemaParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeListObjectTypesByMediaTypeParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeListObjectTypesByMediaTypeParams\MediaType;
use HubspotSDK\Cms\MediaBridge\MediaBridgeListOembedDomainsParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeListPropertiesParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeListPropertyGroupsParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeListSchemasParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeProviderRegistrationResponse;
use HubspotSDK\Cms\MediaBridge\MediaBridgeRegisterAppNameParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeUpdateEventVisibilitySettingsParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeUpdateOembedDomainParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeUpdatePropertyGroupParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeUpdatePropertyParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeUpdateSchemaParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeUpdateSettingsParams;
use HubspotSDK\Cms\MediaBridge\MediaPlayedEvent;
use HubspotSDK\Cms\MediaBridge\MediaPlayedPercentageEvent;
use HubspotSDK\Cms\MediaBridge\ObjectDefinitionResponse;
use HubspotSDK\Cms\MediaBridge\ObjectSchema;
use HubspotSDK\Cms\MediaBridge\OEmbedDomainsCollectionResponse;
use HubspotSDK\Cms\MediaBridge\Property;
use HubspotSDK\CollectionResponsePropertyGroupNoPaging;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\ObjectTypeDefinition;
use HubspotSDK\PropertyGroup;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface MediaBridgeRawContract
{
    /**
     * @api
     *
     * @param string $objectType Path param
     * @param array<string,mixed>|MediaBridgeCreateAssociationParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AssociationDefinition>
     *
     * @throws APIException
     */
    public function createAssociation(
        string $objectType,
        array|MediaBridgeCreateAssociationParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MediaBridgeCreateAttentionSpanEventParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AttentionSpanEvent>
     *
     * @throws APIException
     */
    public function createAttentionSpanEvent(
        array|MediaBridgeCreateAttentionSpanEventParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MediaBridgeCreateMediaPlayedEventParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MediaPlayedEvent>
     *
     * @throws APIException
     */
    public function createMediaPlayedEvent(
        array|MediaBridgeCreateMediaPlayedEventParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MediaBridgeCreateMediaPlayedPercentEventParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MediaPlayedPercentageEvent>
     *
     * @throws APIException
     */
    public function createMediaPlayedPercentEvent(
        array|MediaBridgeCreateMediaPlayedPercentEventParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MediaBridgeCreateObjectTypeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BulkIntegratorObjectCreationResponse>
     *
     * @throws APIException
     */
    public function createObjectType(
        int $appID,
        array|MediaBridgeCreateObjectTypeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MediaBridgeCreateOembedDomainParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<IntegratorOEmbedDomainModel>
     *
     * @throws APIException
     */
    public function createOembedDomain(
        int $appID,
        array|MediaBridgeCreateOembedDomainParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectType Path param
     * @param array<string,mixed>|MediaBridgeCreatePropertyParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Property>
     *
     * @throws APIException
     */
    public function createProperty(
        string $objectType,
        array|MediaBridgeCreatePropertyParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectType Path param
     * @param array<string,mixed>|MediaBridgeCreatePropertyGroupParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PropertyGroup>
     *
     * @throws APIException
     */
    public function createPropertyGroup(
        string $objectType,
        array|MediaBridgeCreatePropertyGroupParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AssociationDefinition>
     *
     * @throws APIException
     */
    public function createVideoAssociationDefinition(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MediaBridgeDeleteAssociationParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteAssociation(
        string $associationID,
        array|MediaBridgeDeleteAssociationParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MediaBridgeDeleteOembedDomainParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteOembedDomain(
        int $appID,
        array|MediaBridgeDeleteOembedDomainParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MediaBridgeDeletePropertyParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteProperty(
        string $propertyName,
        array|MediaBridgeDeletePropertyParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MediaBridgeDeletePropertyGroupParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deletePropertyGroup(
        string $groupName,
        array|MediaBridgeDeletePropertyGroupParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EventVisibilityResponse>
     *
     * @throws APIException
     */
    public function getEventVisibilitySettings(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MediaBridgeGetOembedDomainParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<IntegratorOEmbedDomainModel>
     *
     * @throws APIException
     */
    public function getOembedDomain(
        string $oEmbedDomainID,
        array|MediaBridgeGetOembedDomainParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $propertyName Path param
     * @param array<string,mixed>|MediaBridgeGetPropertyParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Property>
     *
     * @throws APIException
     */
    public function getProperty(
        string $propertyName,
        array|MediaBridgeGetPropertyParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MediaBridgeGetPropertyGroupParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PropertyGroup>
     *
     * @throws APIException
     */
    public function getPropertyGroup(
        string $groupName,
        array|MediaBridgeGetPropertyGroupParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MediaBridgeGetSchemaParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ObjectSchema>
     *
     * @throws APIException
     */
    public function getSchema(
        string $objectType,
        array|MediaBridgeGetSchemaParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param MediaType|string $mediaType Path param
     * @param array<string,mixed>|MediaBridgeListObjectTypesByMediaTypeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ObjectDefinitionResponse>
     *
     * @throws APIException
     */
    public function listObjectTypesByMediaType(
        MediaType|string $mediaType,
        array|MediaBridgeListObjectTypesByMediaTypeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MediaBridgeListOembedDomainsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<OEmbedDomainsCollectionResponse>
     *
     * @throws APIException
     */
    public function listOembedDomains(
        int $appID,
        array|MediaBridgeListOembedDomainsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectType Path param
     * @param array<string,mixed>|MediaBridgeListPropertiesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponsePropertyNoPaging>
     *
     * @throws APIException
     */
    public function listProperties(
        string $objectType,
        array|MediaBridgeListPropertiesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MediaBridgeListPropertyGroupsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponsePropertyGroupNoPaging>
     *
     * @throws APIException
     */
    public function listPropertyGroups(
        string $objectType,
        array|MediaBridgeListPropertyGroupsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MediaBridgeListSchemasParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseObjectSchemaNoPaging>
     *
     * @throws APIException
     */
    public function listSchemas(
        int $appID,
        array|MediaBridgeListSchemasParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param array<string,mixed>|MediaBridgeRegisterAppNameParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MediaBridgeProviderRegistrationResponse>
     *
     * @throws APIException
     */
    public function registerAppName(
        int $appID,
        array|MediaBridgeRegisterAppNameParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MediaBridgeUpdateEventVisibilitySettingsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EventVisibilityChange>
     *
     * @throws APIException
     */
    public function updateEventVisibilitySettings(
        int $appID,
        array|MediaBridgeUpdateEventVisibilitySettingsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $oEmbedDomainID Path param
     * @param array<string,mixed>|MediaBridgeUpdateOembedDomainParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<IntegratorOEmbedDomainModel>
     *
     * @throws APIException
     */
    public function updateOembedDomain(
        string $oEmbedDomainID,
        array|MediaBridgeUpdateOembedDomainParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $propertyName Path param
     * @param array<string,mixed>|MediaBridgeUpdatePropertyParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Property>
     *
     * @throws APIException
     */
    public function updateProperty(
        string $propertyName,
        array|MediaBridgeUpdatePropertyParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $groupName Path param
     * @param array<string,mixed>|MediaBridgeUpdatePropertyGroupParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PropertyGroup>
     *
     * @throws APIException
     */
    public function updatePropertyGroup(
        string $groupName,
        array|MediaBridgeUpdatePropertyGroupParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectType Path param
     * @param array<string,mixed>|MediaBridgeUpdateSchemaParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ObjectTypeDefinition>
     *
     * @throws APIException
     */
    public function updateSchema(
        string $objectType,
        array|MediaBridgeUpdateSchemaParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MediaBridgeUpdateSettingsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MediaBridgeProviderRegistrationResponse>
     *
     * @throws APIException
     */
    public function updateSettings(
        int $appID,
        array|MediaBridgeUpdateSettingsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}

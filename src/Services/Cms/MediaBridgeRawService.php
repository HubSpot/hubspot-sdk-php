<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms;

use HubspotSDK\AssociationDefinition;
use HubspotSDK\Client;
use HubspotSDK\Cms\MediaBridge\AttentionSpanCalculatedValues;
use HubspotSDK\Cms\MediaBridge\AttentionSpanEvent;
use HubspotSDK\Cms\MediaBridge\BulkIntegratorObjectCreationResponse;
use HubspotSDK\Cms\MediaBridge\CollectionResponseObjectSchemaNoPaging;
use HubspotSDK\Cms\MediaBridge\CollectionResponsePropertyNoPaging;
use HubspotSDK\Cms\MediaBridge\Endpoints;
use HubspotSDK\Cms\MediaBridge\EventVisibilityChange;
use HubspotSDK\Cms\MediaBridge\EventVisibilityResponse;
use HubspotSDK\Cms\MediaBridge\IntegratorOEmbedDomainModel;
use HubspotSDK\Cms\MediaBridge\MediaBridgeCreateAssociationParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeCreateAttentionSpanEventParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeCreateAttentionSpanEventParams\ExternalPlayContext;
use HubspotSDK\Cms\MediaBridge\MediaBridgeCreateAttentionSpanEventParams\MediaType;
use HubspotSDK\Cms\MediaBridge\MediaBridgeCreateMediaPlayedEventParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeCreateMediaPlayedEventParams\State;
use HubspotSDK\Cms\MediaBridge\MediaBridgeCreateMediaPlayedPercentEventParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeCreateObjectTypeParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeCreateOembedDomainParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeCreatePropertyGroupParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeCreatePropertyParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeCreatePropertyParams\DataSensitivity;
use HubspotSDK\Cms\MediaBridge\MediaBridgeCreatePropertyParams\FieldType;
use HubspotSDK\Cms\MediaBridge\MediaBridgeCreatePropertyParams\Type;
use HubspotSDK\Cms\MediaBridge\MediaBridgeDeleteAssociationParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeDeleteOembedDomainParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeDeletePropertyGroupParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeDeletePropertyParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeGetOembedDomainParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeGetPropertyGroupParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeGetPropertyParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeGetSchemaParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeListObjectTypesByMediaTypeParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeListOembedDomainsParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeListPropertiesParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeListPropertyGroupsParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeListSchemasParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeProviderRegistrationResponse;
use HubspotSDK\Cms\MediaBridge\MediaBridgeRegisterAppNameParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeUpdateEventVisibilitySettingsParams;
use HubspotSDK\Cms\MediaBridge\MediaBridgeUpdateEventVisibilitySettingsParams\EventType;
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
use HubspotSDK\Core\Util;
use HubspotSDK\ObjectTypeDefinition;
use HubspotSDK\ObjectTypeDefinitionLabels;
use HubspotSDK\OptionInput;
use HubspotSDK\PropertyGroup;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\MediaBridgeRawContract;

/**
 * @phpstan-import-type AttentionSpanCalculatedValuesShape from \HubspotSDK\Cms\MediaBridge\AttentionSpanCalculatedValues
 * @phpstan-import-type ObjectTypeDefinitionLabelsShape from \HubspotSDK\ObjectTypeDefinitionLabels
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 * @phpstan-import-type EndpointsShape from \HubspotSDK\Cms\MediaBridge\Endpoints
 * @phpstan-import-type OptionInputShape from \HubspotSDK\OptionInput
 */
final class MediaBridgeRawService implements MediaBridgeRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new association definition for the specified object type.
     *
     * @param string $objectType Path param
     * @param array{
     *   appID: int, fromObjectTypeID: string, toObjectTypeID: string, name?: string
     * }|MediaBridgeCreateAssociationParams $params
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
    ): BaseResponse {
        [$parsed, $options] = MediaBridgeCreateAssociationParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'media-bridge/2026-03/%1$s/schemas/%2$s/associations',
                $appID,
                $objectType,
            ],
            body: (object) array_diff_key($parsed, array_flip(['appID'])),
            options: $options,
            convert: AssociationDefinition::class,
        );
    }

    /**
     * @api
     *
     * Create an event containing the viewers attention span details for the media.
     *
     * @param array{
     *   mediaType: MediaType|value-of<MediaType>,
     *   occurredTimestamp: int,
     *   rawDataMap: array<string,int>,
     *   sessionID: string,
     *   _hsenc?: string,
     *   contactID?: int,
     *   contactUtk?: string,
     *   derivedValues?: AttentionSpanCalculatedValues|AttentionSpanCalculatedValuesShape,
     *   externalID?: string,
     *   externalPlayContext?: ExternalPlayContext|value-of<ExternalPlayContext>,
     *   mediaBridgeID?: int,
     *   mediaName?: string,
     *   mediaURL?: string,
     *   pageID?: int,
     *   pageName?: string,
     *   pageURL?: string,
     *   rawDataString?: string,
     * }|MediaBridgeCreateAttentionSpanEventParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AttentionSpanEvent>
     *
     * @throws APIException
     */
    public function createAttentionSpanEvent(
        array|MediaBridgeCreateAttentionSpanEventParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MediaBridgeCreateAttentionSpanEventParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'media-bridge/2026-03/events/attention-span',
            body: (object) $parsed,
            options: $options,
            convert: AttentionSpanEvent::class,
        );
    }

    /**
     * @api
     *
     * Create an event for when a user begins playing a piece of media.
     *
     * @param array{
     *   mediaType: MediaBridgeCreateMediaPlayedEventParams\MediaType|value-of<MediaBridgeCreateMediaPlayedEventParams\MediaType>,
     *   occurredTimestamp: int,
     *   sessionID: string,
     *   state: State|value-of<State>,
     *   _hsenc?: string,
     *   contactID?: int,
     *   contactUtk?: string,
     *   externalID?: string,
     *   externalPlayContext?: MediaBridgeCreateMediaPlayedEventParams\ExternalPlayContext|value-of<MediaBridgeCreateMediaPlayedEventParams\ExternalPlayContext>,
     *   iframeURL?: string,
     *   mediaBridgeID?: int,
     *   mediaName?: string,
     *   mediaURL?: string,
     *   pageID?: int,
     *   pageName?: string,
     *   pageURL?: string,
     * }|MediaBridgeCreateMediaPlayedEventParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MediaPlayedEvent>
     *
     * @throws APIException
     */
    public function createMediaPlayedEvent(
        array|MediaBridgeCreateMediaPlayedEventParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MediaBridgeCreateMediaPlayedEventParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'media-bridge/2026-03/events/media-played',
            body: (object) $parsed,
            options: $options,
            convert: MediaPlayedEvent::class,
        );
    }

    /**
     * @api
     *
     * Create an event representing a user reaching quarterly milestones in a piece of media they're viewing.
     *
     * @param array{
     *   mediaType: MediaBridgeCreateMediaPlayedPercentEventParams\MediaType|value-of<MediaBridgeCreateMediaPlayedPercentEventParams\MediaType>,
     *   occurredTimestamp: int,
     *   playedPercent: int,
     *   sessionID: string,
     *   _hsenc?: string,
     *   contactID?: int,
     *   contactUtk?: string,
     *   externalID?: string,
     *   externalPlayContext?: MediaBridgeCreateMediaPlayedPercentEventParams\ExternalPlayContext|value-of<MediaBridgeCreateMediaPlayedPercentEventParams\ExternalPlayContext>,
     *   mediaBridgeID?: int,
     *   mediaName?: string,
     *   mediaURL?: string,
     *   pageID?: int,
     *   pageName?: string,
     *   pageURL?: string,
     * }|MediaBridgeCreateMediaPlayedPercentEventParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MediaPlayedPercentageEvent>
     *
     * @throws APIException
     */
    public function createMediaPlayedPercentEvent(
        array|MediaBridgeCreateMediaPlayedPercentEventParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MediaBridgeCreateMediaPlayedPercentEventParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'media-bridge/2026-03/events/media-played-percent',
            body: (object) $parsed,
            options: $options,
            convert: MediaPlayedPercentageEvent::class,
        );
    }

    /**
     * @api
     *
     * Create a new media object type
     *
     * @param array{
     *   mediaTypes: list<MediaBridgeCreateObjectTypeParams\MediaType|value-of<MediaBridgeCreateObjectTypeParams\MediaType>>,
     * }|MediaBridgeCreateObjectTypeParams $params
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
    ): BaseResponse {
        [$parsed, $options] = MediaBridgeCreateObjectTypeParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['media-bridge/2026-03/%1$s/settings/object-definitions', $appID],
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
     *   endpoints: Endpoints|EndpointsShape, portalID?: int
     * }|MediaBridgeCreateOembedDomainParams $params
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
    ): BaseResponse {
        [$parsed, $options] = MediaBridgeCreateOembedDomainParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['media-bridge/2026-03/%1$s/settings/oembed-domains', $appID],
            body: (object) $parsed,
            options: $options,
            convert: IntegratorOEmbedDomainModel::class,
        );
    }

    /**
     * @api
     *
     * Create a new property for the specified media type
     *
     * @param string $objectType Path param
     * @param array{
     *   appID: int,
     *   fieldType: value-of<FieldType>,
     *   groupName: string,
     *   label: string,
     *   name: string,
     *   type: Type|value-of<Type>,
     *   calculationFormula?: string,
     *   dataSensitivity?: DataSensitivity|value-of<DataSensitivity>,
     *   description?: string,
     *   displayOrder?: int,
     *   externalOptions?: bool,
     *   formField?: bool,
     *   hasUniqueValue?: bool,
     *   hidden?: bool,
     *   options?: list<OptionInput|OptionInputShape>,
     *   referencedObjectType?: string,
     * }|MediaBridgeCreatePropertyParams $params
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
    ): BaseResponse {
        [$parsed, $options] = MediaBridgeCreatePropertyParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['media-bridge/2026-03/%1$s/properties/%2$s', $appID, $objectType],
            body: (object) array_diff_key($parsed, array_flip(['appID'])),
            options: $options,
            convert: Property::class,
        );
    }

    /**
     * @api
     *
     * Create a new property group for the specified object type.
     *
     * @param string $objectType Path param
     * @param array{
     *   appID: int, label: string, name: string, displayOrder?: int
     * }|MediaBridgeCreatePropertyGroupParams $params
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
    ): BaseResponse {
        [$parsed, $options] = MediaBridgeCreatePropertyGroupParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'media-bridge/2026-03/%1$s/properties/%2$s/groups', $appID, $objectType,
            ],
            body: (object) array_diff_key($parsed, array_flip(['appID'])),
            options: $options,
            convert: PropertyGroup::class,
        );
    }

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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'media-bridge/2026-03/%1$s/settings/video-association-definition',
                $appID,
            ],
            options: $requestOptions,
            convert: AssociationDefinition::class,
        );
    }

    /**
     * @api
     *
     * Delete an existing association definition for an object type.
     *
     * @param array{
     *   appID: int, objectType: string
     * }|MediaBridgeDeleteAssociationParams $params
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
    ): BaseResponse {
        [$parsed, $options] = MediaBridgeDeleteAssociationParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'media-bridge/2026-03/%1$s/schemas/%2$s/associations/%3$s',
                $appID,
                $objectType,
                $associationID,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Delete an existing oEmbed domain.
     *
     * @param array{
     *   id?: int, domainPortalID?: int
     * }|MediaBridgeDeleteOembedDomainParams $params
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
    ): BaseResponse {
        [$parsed, $options] = MediaBridgeDeleteOembedDomainParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['media-bridge/2026-03/%1$s/settings/oembed-domains', $appID],
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
     * Delete an existing property for an object type.
     *
     * @param array{
     *   appID: int, objectType: string
     * }|MediaBridgeDeletePropertyParams $params
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
    ): BaseResponse {
        [$parsed, $options] = MediaBridgeDeletePropertyParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'media-bridge/2026-03/%1$s/properties/%2$s/%3$s',
                $appID,
                $objectType,
                $propertyName,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Delete an existing property group by name
     *
     * @param array{
     *   appID: int, objectType: string
     * }|MediaBridgeDeletePropertyGroupParams $params
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
    ): BaseResponse {
        [$parsed, $options] = MediaBridgeDeletePropertyGroupParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'media-bridge/2026-03/%1$s/properties/%2$s/groups/%3$s',
                $appID,
                $objectType,
                $groupName,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Get the visibility settings for media bridge events for your apps.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['media-bridge/2026-03/%1$s/settings/event-visibility', $appID],
            options: $requestOptions,
            convert: EventVisibilityResponse::class,
        );
    }

    /**
     * @api
     *
     * Get the details for an existing oEmbed domain.
     *
     * @param array{appID: int}|MediaBridgeGetOembedDomainParams $params
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
    ): BaseResponse {
        [$parsed, $options] = MediaBridgeGetOembedDomainParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'media-bridge/2026-03/%1$s/settings/oembed-domains/%2$s',
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
     * Get the details for an existing property by name.
     *
     * @param string $propertyName Path param
     * @param array{
     *   appID: int, objectType: string, archived?: bool, properties?: string
     * }|MediaBridgeGetPropertyParams $params
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
    ): BaseResponse {
        [$parsed, $options] = MediaBridgeGetPropertyParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'media-bridge/2026-03/%1$s/properties/%2$s/%3$s',
                $appID,
                $objectType,
                $propertyName,
            ],
            query: $parsed,
            options: $options,
            convert: Property::class,
        );
    }

    /**
     * @api
     *
     * Get the details of an existing property group by name.
     *
     * @param array{
     *   appID: int, objectType: string
     * }|MediaBridgeGetPropertyGroupParams $params
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
    ): BaseResponse {
        [$parsed, $options] = MediaBridgeGetPropertyGroupParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'media-bridge/2026-03/%1$s/properties/%2$s/groups/%3$s',
                $appID,
                $objectType,
                $groupName,
            ],
            options: $options,
            convert: PropertyGroup::class,
        );
    }

    /**
     * @api
     *
     * Get the schema for a specified object type.
     *
     * @param array{appID: int}|MediaBridgeGetSchemaParams $params
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
    ): BaseResponse {
        [$parsed, $options] = MediaBridgeGetSchemaParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['media-bridge/2026-03/%1$s/schemas/%2$s', $appID, $objectType],
            options: $options,
            convert: ObjectSchema::class,
        );
    }

    /**
     * @api
     *
     * Get the existing objects types that belong to the specified media type.
     *
     * @param MediaBridgeListObjectTypesByMediaTypeParams\MediaType|value-of<MediaBridgeListObjectTypesByMediaTypeParams\MediaType> $mediaType Path param
     * @param array{
     *   appID: int, includeFullDefinition?: bool
     * }|MediaBridgeListObjectTypesByMediaTypeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ObjectDefinitionResponse>
     *
     * @throws APIException
     */
    public function listObjectTypesByMediaType(
        MediaBridgeListObjectTypesByMediaTypeParams\MediaType|string $mediaType,
        array|MediaBridgeListObjectTypesByMediaTypeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MediaBridgeListObjectTypesByMediaTypeParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'media-bridge/2026-03/%1$s/settings/object-definitions/%2$s',
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
     * Get the details for existing oEmbed domains for your app
     *
     * @param array{domainPortalID?: int}|MediaBridgeListOembedDomainsParams $params
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
    ): BaseResponse {
        [$parsed, $options] = MediaBridgeListOembedDomainsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['media-bridge/2026-03/%1$s/settings/oembed-domains', $appID],
            query: Util::array_transform_keys(
                $parsed,
                ['domainPortalID' => 'domainPortalId']
            ),
            options: $options,
            convert: OEmbedDomainsCollectionResponse::class,
        );
    }

    /**
     * @api
     *
     * Get the existing properties defined for a media object type.
     *
     * @param string $objectType Path param
     * @param array{
     *   appID: int, archived?: bool, properties?: string
     * }|MediaBridgeListPropertiesParams $params
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
    ): BaseResponse {
        [$parsed, $options] = MediaBridgeListPropertiesParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['media-bridge/2026-03/%1$s/properties/%2$s', $appID, $objectType],
            query: $parsed,
            options: $options,
            convert: CollectionResponsePropertyNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Get the property groups for a specified object type.
     *
     * @param array{appID: int}|MediaBridgeListPropertyGroupsParams $params
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
    ): BaseResponse {
        [$parsed, $options] = MediaBridgeListPropertyGroupsParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'media-bridge/2026-03/%1$s/properties/%2$s/groups', $appID, $objectType,
            ],
            options: $options,
            convert: CollectionResponsePropertyGroupNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Get the schemas for all object types.
     *
     * @param array{archived?: bool}|MediaBridgeListSchemasParams $params
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
    ): BaseResponse {
        [$parsed, $options] = MediaBridgeListSchemasParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['media-bridge/2026-03/%1$s/schemas', $appID],
            query: $parsed,
            options: $options,
            convert: CollectionResponseObjectSchemaNoPaging::class,
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
     *   updatedAt: int,
     *   allowImportOnDisconnect?: bool,
     *   moduleName?: string,
     *   name?: string,
     * }|MediaBridgeRegisterAppNameParams $params
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
    ): BaseResponse {
        [$parsed, $options] = MediaBridgeRegisterAppNameParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['media-bridge/2026-03/%1$s/settings/register', $appID],
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
     *   eventType: EventType|value-of<EventType>,
     *   updatedAt: int,
     *   showInReporting?: bool,
     *   showInTimeline?: bool,
     *   showInWorkflows?: bool,
     * }|MediaBridgeUpdateEventVisibilitySettingsParams $params
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
    ): BaseResponse {
        [$parsed, $options] = MediaBridgeUpdateEventVisibilitySettingsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['media-bridge/2026-03/%1$s/settings/event-visibility', $appID],
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
     * @param string $oEmbedDomainID Path param
     * @param array{
     *   appID: int, endpoints: Endpoints|EndpointsShape, portalID?: int
     * }|MediaBridgeUpdateOembedDomainParams $params
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
    ): BaseResponse {
        [$parsed, $options] = MediaBridgeUpdateOembedDomainParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: [
                'media-bridge/2026-03/%1$s/settings/oembed-domains/%2$s',
                $appID,
                $oEmbedDomainID,
            ],
            body: (object) array_diff_key($parsed, array_flip(['appID'])),
            options: $options,
            convert: IntegratorOEmbedDomainModel::class,
        );
    }

    /**
     * @api
     *
     * Update an existing property for an object type.
     *
     * @param string $propertyName Path param
     * @param array{
     *   appID: int,
     *   objectType: string,
     *   calculationFormula?: string,
     *   description?: string,
     *   displayOrder?: int,
     *   fieldType?: value-of<MediaBridgeUpdatePropertyParams\FieldType>,
     *   formField?: bool,
     *   groupName?: string,
     *   hasUniqueValue?: bool,
     *   hidden?: bool,
     *   label?: string,
     *   options?: list<OptionInput|OptionInputShape>,
     *   type?: MediaBridgeUpdatePropertyParams\Type|value-of<MediaBridgeUpdatePropertyParams\Type>,
     * }|MediaBridgeUpdatePropertyParams $params
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
    ): BaseResponse {
        [$parsed, $options] = MediaBridgeUpdatePropertyParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: [
                'media-bridge/2026-03/%1$s/properties/%2$s/%3$s',
                $appID,
                $objectType,
                $propertyName,
            ],
            body: (object) array_diff_key(
                $parsed,
                array_flip(['appID', 'objectType'])
            ),
            options: $options,
            convert: Property::class,
        );
    }

    /**
     * @api
     *
     * Update an existing property group by name.
     *
     * @param string $groupName Path param
     * @param array{
     *   appID: int, objectType: string, displayOrder?: int, label?: string
     * }|MediaBridgeUpdatePropertyGroupParams $params
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
    ): BaseResponse {
        [$parsed, $options] = MediaBridgeUpdatePropertyGroupParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: [
                'media-bridge/2026-03/%1$s/properties/%2$s/groups/%3$s',
                $appID,
                $objectType,
                $groupName,
            ],
            body: (object) array_diff_key(
                $parsed,
                array_flip(['appID', 'objectType'])
            ),
            options: $options,
            convert: PropertyGroup::class,
        );
    }

    /**
     * @api
     *
     * Update the schema for an existing object type
     *
     * @param string $objectType Path param
     * @param array{
     *   appID: int,
     *   clearDescription: bool,
     *   allowsSensitiveProperties?: bool,
     *   description?: string,
     *   labels?: ObjectTypeDefinitionLabels|ObjectTypeDefinitionLabelsShape,
     *   primaryDisplayProperty?: string,
     *   requiredProperties?: list<string>,
     *   restorable?: bool,
     *   searchableProperties?: list<string>,
     *   secondaryDisplayProperties?: list<string>,
     * }|MediaBridgeUpdateSchemaParams $params
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
    ): BaseResponse {
        [$parsed, $options] = MediaBridgeUpdateSchemaParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['media-bridge/2026-03/%1$s/schemas/%2$s', $appID, $objectType],
            body: (object) array_diff_key($parsed, array_flip(['appID'])),
            options: $options,
            convert: ObjectTypeDefinition::class,
        );
    }

    /**
     * @api
     *
     * Update the name that your app will display when a user is selecting media bridge items.
     *
     * @param array{
     *   updatedAt: int,
     *   allowImportOnDisconnect?: bool,
     *   moduleName?: string,
     *   name?: string,
     * }|MediaBridgeUpdateSettingsParams $params
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
    ): BaseResponse {
        [$parsed, $options] = MediaBridgeUpdateSettingsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['media-bridge/2026-03/%1$s/settings', $appID],
            body: (object) $parsed,
            options: $options,
            convert: MediaBridgeProviderRegistrationResponse::class,
        );
    }
}

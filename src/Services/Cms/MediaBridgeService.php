<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms;

use HubspotSDK\Client;
use HubspotSDK\Cms\MediaBridge\AttentionSpanCalculatedValues;
use HubspotSDK\Cms\MediaBridge\BulkIntegratorObjectCreationResponse;
use HubspotSDK\Cms\MediaBridge\Endpoints;
use HubspotSDK\Cms\MediaBridge\EventVisibilityChange;
use HubspotSDK\Cms\MediaBridge\EventVisibilityResponse;
use HubspotSDK\Cms\MediaBridge\IntegratorOEmbedDomainModel;
use HubspotSDK\Cms\MediaBridge\MediaBridgeCreateAttentionSpanEventParams\ExternalPlayContext;
use HubspotSDK\Cms\MediaBridge\MediaBridgeCreateMediaPlayedEventParams\State;
use HubspotSDK\Cms\MediaBridge\MediaBridgeCreatePropertyParams\DataSensitivity;
use HubspotSDK\Cms\MediaBridge\MediaBridgeCreatePropertyParams\FieldType;
use HubspotSDK\Cms\MediaBridge\MediaBridgeCreatePropertyParams\Type;
use HubspotSDK\Cms\MediaBridge\MediaBridgeListParams\MediaType;
use HubspotSDK\Cms\MediaBridge\MediaBridgeObject;
use HubspotSDK\Cms\MediaBridge\MediaBridgeProviderRegistrationResponse;
use HubspotSDK\Cms\MediaBridge\MediaBridgeUpdateEventVisibilitySettingsParams\EventType;
use HubspotSDK\Cms\MediaBridge\ObjectDefinitionResponse;
use HubspotSDK\Cms\MediaBridge\OEmbedDomainsCollectionResponse;
use HubspotSDK\CollectionResponseObjectSchemaNoPaging;
use HubspotSDK\CollectionResponsePropertyGroupNoPaging;
use HubspotSDK\CollectionResponsePropertyNoPaging;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Events\AssociationDefinition;
use HubspotSDK\ObjectSchema;
use HubspotSDK\ObjectTypeDefinition;
use HubspotSDK\ObjectTypeDefinitionLabels;
use HubspotSDK\OptionInput;
use HubspotSDK\Page;
use HubspotSDK\Property;
use HubspotSDK\PropertyGroup;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\MediaBridgeContract;
use HubspotSDK\Services\Cms\MediaBridge\BatchService;

/**
 * @phpstan-import-type AttentionSpanCalculatedValuesShape from \HubspotSDK\Cms\MediaBridge\AttentionSpanCalculatedValues
 * @phpstan-import-type ObjectTypeDefinitionLabelsShape from \HubspotSDK\ObjectTypeDefinitionLabels
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 * @phpstan-import-type EndpointsShape from \HubspotSDK\Cms\MediaBridge\Endpoints
 * @phpstan-import-type OptionInputShape from \HubspotSDK\OptionInput
 */
final class MediaBridgeService implements MediaBridgeContract
{
    /**
     * @api
     */
    public MediaBridgeRawService $raw;

    /**
     * @api
     */
    public BatchService $batch;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MediaBridgeRawService($client);
        $this->batch = new BatchService($client);
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        RequestOptions|array|null $requestOptions = null
    ): MediaBridgeObject {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        int $objectID,
        RequestOptions|array|null $requestOptions = null
    ): MediaBridgeObject {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($objectID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param MediaType|value-of<MediaType> $mediaType
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit the maximum number of results to display per page
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<MediaBridgeObject>
     *
     * @throws APIException
     */
    public function list(
        MediaType|string $mediaType,
        ?string $after = null,
        int $limit = 20,
        RequestOptions|array|null $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(['after' => $after, 'limit' => $limit]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($mediaType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param \HubspotSDK\Cms\MediaBridge\MediaBridgeDeleteParams\MediaType|value-of<\HubspotSDK\Cms\MediaBridge\MediaBridgeDeleteParams\MediaType> $mediaType
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $objectID,
        \HubspotSDK\Cms\MediaBridge\MediaBridgeDeleteParams\MediaType|string $mediaType,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['mediaType' => $mediaType]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($objectID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create a new association definition for the specified object type.
     *
     * @param string $objectType Path param
     * @param string $appID Path param
     * @param string $fromObjectTypeID Body param
     * @param string $toObjectTypeID Body param
     * @param string $name Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createAssociation(
        string $objectType,
        string $appID,
        string $fromObjectTypeID,
        string $toObjectTypeID,
        ?string $name = null,
        RequestOptions|array|null $requestOptions = null,
    ): AssociationDefinition {
        $params = Util::removeNulls(
            [
                'appID' => $appID,
                'fromObjectTypeID' => $fromObjectTypeID,
                'toObjectTypeID' => $toObjectTypeID,
                'name' => $name,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createAssociation($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create an event containing the viewers attention span details for the media.
     *
     * @param \HubspotSDK\Cms\MediaBridge\MediaBridgeCreateAttentionSpanEventParams\MediaType|value-of<\HubspotSDK\Cms\MediaBridge\MediaBridgeCreateAttentionSpanEventParams\MediaType> $mediaType
     * @param array<string,int> $rawDataMap
     * @param AttentionSpanCalculatedValues|AttentionSpanCalculatedValuesShape $derivedValues
     * @param ExternalPlayContext|value-of<ExternalPlayContext> $externalPlayContext
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createAttentionSpanEvent(
        \HubspotSDK\Cms\MediaBridge\MediaBridgeCreateAttentionSpanEventParams\MediaType|string $mediaType,
        int $occurredTimestamp,
        array $rawDataMap,
        string $sessionID,
        ?string $_hsenc = null,
        ?int $contactID = null,
        ?string $contactUtk = null,
        AttentionSpanCalculatedValues|array|null $derivedValues = null,
        ?string $externalID = null,
        ExternalPlayContext|string|null $externalPlayContext = null,
        ?int $mediaBridgeID = null,
        ?string $mediaName = null,
        ?string $mediaURL = null,
        ?int $pageID = null,
        ?string $pageName = null,
        ?string $pageURL = null,
        ?string $rawDataString = null,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(
            [
                'mediaType' => $mediaType,
                'occurredTimestamp' => $occurredTimestamp,
                'rawDataMap' => $rawDataMap,
                'sessionID' => $sessionID,
                '_hsenc' => $_hsenc,
                'contactID' => $contactID,
                'contactUtk' => $contactUtk,
                'derivedValues' => $derivedValues,
                'externalID' => $externalID,
                'externalPlayContext' => $externalPlayContext,
                'mediaBridgeID' => $mediaBridgeID,
                'mediaName' => $mediaName,
                'mediaURL' => $mediaURL,
                'pageID' => $pageID,
                'pageName' => $pageName,
                'pageURL' => $pageURL,
                'rawDataString' => $rawDataString,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createAttentionSpanEvent(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create an event for when a user begins playing a piece of media.
     *
     * @param \HubspotSDK\Cms\MediaBridge\MediaBridgeCreateMediaPlayedEventParams\MediaType|value-of<\HubspotSDK\Cms\MediaBridge\MediaBridgeCreateMediaPlayedEventParams\MediaType> $mediaType
     * @param State|value-of<State> $state
     * @param \HubspotSDK\Cms\MediaBridge\MediaBridgeCreateMediaPlayedEventParams\ExternalPlayContext|value-of<\HubspotSDK\Cms\MediaBridge\MediaBridgeCreateMediaPlayedEventParams\ExternalPlayContext> $externalPlayContext
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createMediaPlayedEvent(
        \HubspotSDK\Cms\MediaBridge\MediaBridgeCreateMediaPlayedEventParams\MediaType|string $mediaType,
        int $occurredTimestamp,
        string $sessionID,
        State|string $state,
        ?string $_hsenc = null,
        ?int $contactID = null,
        ?string $contactUtk = null,
        ?string $externalID = null,
        \HubspotSDK\Cms\MediaBridge\MediaBridgeCreateMediaPlayedEventParams\ExternalPlayContext|string|null $externalPlayContext = null,
        ?string $iframeURL = null,
        ?int $mediaBridgeID = null,
        ?string $mediaName = null,
        ?string $mediaURL = null,
        ?int $pageID = null,
        ?string $pageName = null,
        ?string $pageURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(
            [
                'mediaType' => $mediaType,
                'occurredTimestamp' => $occurredTimestamp,
                'sessionID' => $sessionID,
                'state' => $state,
                '_hsenc' => $_hsenc,
                'contactID' => $contactID,
                'contactUtk' => $contactUtk,
                'externalID' => $externalID,
                'externalPlayContext' => $externalPlayContext,
                'iframeURL' => $iframeURL,
                'mediaBridgeID' => $mediaBridgeID,
                'mediaName' => $mediaName,
                'mediaURL' => $mediaURL,
                'pageID' => $pageID,
                'pageName' => $pageName,
                'pageURL' => $pageURL,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createMediaPlayedEvent(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create an event representing a user reaching quarterly milestones in a piece of media they're viewing.
     *
     * @param \HubspotSDK\Cms\MediaBridge\MediaBridgeCreateMediaPlayedPercentEventParams\MediaType|value-of<\HubspotSDK\Cms\MediaBridge\MediaBridgeCreateMediaPlayedPercentEventParams\MediaType> $mediaType
     * @param \HubspotSDK\Cms\MediaBridge\MediaBridgeCreateMediaPlayedPercentEventParams\ExternalPlayContext|value-of<\HubspotSDK\Cms\MediaBridge\MediaBridgeCreateMediaPlayedPercentEventParams\ExternalPlayContext> $externalPlayContext
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createMediaPlayedPercentEvent(
        \HubspotSDK\Cms\MediaBridge\MediaBridgeCreateMediaPlayedPercentEventParams\MediaType|string $mediaType,
        int $occurredTimestamp,
        int $playedPercent,
        string $sessionID,
        ?string $_hsenc = null,
        ?int $contactID = null,
        ?string $contactUtk = null,
        ?string $externalID = null,
        \HubspotSDK\Cms\MediaBridge\MediaBridgeCreateMediaPlayedPercentEventParams\ExternalPlayContext|string|null $externalPlayContext = null,
        ?int $mediaBridgeID = null,
        ?string $mediaName = null,
        ?string $mediaURL = null,
        ?int $pageID = null,
        ?string $pageName = null,
        ?string $pageURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(
            [
                'mediaType' => $mediaType,
                'occurredTimestamp' => $occurredTimestamp,
                'playedPercent' => $playedPercent,
                'sessionID' => $sessionID,
                '_hsenc' => $_hsenc,
                'contactID' => $contactID,
                'contactUtk' => $contactUtk,
                'externalID' => $externalID,
                'externalPlayContext' => $externalPlayContext,
                'mediaBridgeID' => $mediaBridgeID,
                'mediaName' => $mediaName,
                'mediaURL' => $mediaURL,
                'pageID' => $pageID,
                'pageName' => $pageName,
                'pageURL' => $pageURL,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createMediaPlayedPercentEvent(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create a new media object type
     *
     * @param list<\HubspotSDK\Cms\MediaBridge\MediaBridgeCreateObjectTypeParams\MediaType|value-of<\HubspotSDK\Cms\MediaBridge\MediaBridgeCreateObjectTypeParams\MediaType>> $mediaTypes
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createObjectType(
        string $appID,
        array $mediaTypes,
        RequestOptions|array|null $requestOptions = null,
    ): BulkIntegratorObjectCreationResponse {
        $params = Util::removeNulls(['mediaTypes' => $mediaTypes]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createObjectType($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Set up a new oEmbed domain for your media bridge app.
     *
     * @param Endpoints|EndpointsShape $endpoints
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createOembedDomain(
        string $appID,
        Endpoints|array $endpoints,
        ?int $portalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): IntegratorOEmbedDomainModel {
        $params = Util::removeNulls(
            ['endpoints' => $endpoints, 'portalID' => $portalID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createOembedDomain($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create a new property for the specified media type
     *
     * @param string $objectType Path param
     * @param string $appID Path param
     * @param FieldType|value-of<FieldType> $fieldType Body param
     * @param string $groupName Body param
     * @param string $label Body param
     * @param string $name Body param
     * @param Type|value-of<Type> $type Body param
     * @param string $calculationFormula Body param
     * @param DataSensitivity|value-of<DataSensitivity> $dataSensitivity Body param
     * @param string $description Body param
     * @param int $displayOrder Body param
     * @param bool $externalOptions Body param
     * @param bool $formField Body param
     * @param bool $hasUniqueValue Body param
     * @param bool $hidden Body param
     * @param list<OptionInput|OptionInputShape> $options Body param
     * @param string $referencedObjectType Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createProperty(
        string $objectType,
        string $appID,
        FieldType|string $fieldType,
        string $groupName,
        string $label,
        string $name,
        Type|string $type,
        ?string $calculationFormula = null,
        DataSensitivity|string|null $dataSensitivity = null,
        ?string $description = null,
        ?int $displayOrder = null,
        ?bool $externalOptions = null,
        ?bool $formField = null,
        ?bool $hasUniqueValue = null,
        ?bool $hidden = null,
        ?array $options = null,
        ?string $referencedObjectType = null,
        RequestOptions|array|null $requestOptions = null,
    ): Property {
        $params = Util::removeNulls(
            [
                'appID' => $appID,
                'fieldType' => $fieldType,
                'groupName' => $groupName,
                'label' => $label,
                'name' => $name,
                'type' => $type,
                'calculationFormula' => $calculationFormula,
                'dataSensitivity' => $dataSensitivity,
                'description' => $description,
                'displayOrder' => $displayOrder,
                'externalOptions' => $externalOptions,
                'formField' => $formField,
                'hasUniqueValue' => $hasUniqueValue,
                'hidden' => $hidden,
                'options' => $options,
                'referencedObjectType' => $referencedObjectType,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createProperty($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create a new property group for the specified object type.
     *
     * @param string $objectType Path param
     * @param string $appID Path param
     * @param string $label Body param
     * @param string $name Body param
     * @param int $displayOrder Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createPropertyGroup(
        string $objectType,
        string $appID,
        string $label,
        string $name,
        ?int $displayOrder = null,
        RequestOptions|array|null $requestOptions = null,
    ): PropertyGroup {
        $params = Util::removeNulls(
            [
                'appID' => $appID,
                'label' => $label,
                'name' => $name,
                'displayOrder' => $displayOrder,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createPropertyGroup($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createVideoAssociationDefinition(
        string $appID,
        RequestOptions|array|null $requestOptions = null
    ): AssociationDefinition {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createVideoAssociationDefinition($appID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete an existing association definition for an object type.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteAssociation(
        string $associationID,
        string $appID,
        string $objectType,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            ['appID' => $appID, 'objectType' => $objectType]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteAssociation($associationID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete an existing oEmbed domain.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteOembedDomain(
        string $appID,
        ?int $id = null,
        int $domainPortalID = -1,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            ['id' => $id, 'domainPortalID' => $domainPortalID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteOembedDomain($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete an existing property for an object type.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteProperty(
        string $propertyName,
        string $appID,
        string $objectType,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            ['appID' => $appID, 'objectType' => $objectType]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteProperty($propertyName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete an existing property group by name
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deletePropertyGroup(
        string $groupName,
        string $appID,
        string $objectType,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            ['appID' => $appID, 'objectType' => $objectType]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deletePropertyGroup($groupName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param \HubspotSDK\Cms\MediaBridge\MediaBridgeGetParams\MediaType|value-of<\HubspotSDK\Cms\MediaBridge\MediaBridgeGetParams\MediaType> $mediaType
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        int $objectID,
        \HubspotSDK\Cms\MediaBridge\MediaBridgeGetParams\MediaType|string $mediaType,
        RequestOptions|array|null $requestOptions = null,
    ): MediaBridgeObject {
        $params = Util::removeNulls(['mediaType' => $mediaType]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($objectID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the visibility settings for media bridge events for your apps.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getEventVisibilitySettings(
        string $appID,
        RequestOptions|array|null $requestOptions = null
    ): EventVisibilityResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getEventVisibilitySettings($appID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the details for an existing oEmbed domain.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getOembedDomain(
        string $oEmbedDomainID,
        string $appID,
        RequestOptions|array|null $requestOptions = null,
    ): IntegratorOEmbedDomainModel {
        $params = Util::removeNulls(['appID' => $appID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getOembedDomain($oEmbedDomainID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the details for an existing property by name.
     *
     * @param string $propertyName Path param
     * @param string $appID Path param
     * @param string $objectType Path param
     * @param bool $archived query param: Whether to return only results that have been archived
     * @param string $properties Query param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getProperty(
        string $propertyName,
        string $appID,
        string $objectType,
        bool $archived = false,
        ?string $properties = null,
        RequestOptions|array|null $requestOptions = null,
    ): Property {
        $params = Util::removeNulls(
            [
                'appID' => $appID,
                'objectType' => $objectType,
                'archived' => $archived,
                'properties' => $properties,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getProperty($propertyName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the details of an existing property group by name.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getPropertyGroup(
        string $groupName,
        string $appID,
        string $objectType,
        RequestOptions|array|null $requestOptions = null,
    ): PropertyGroup {
        $params = Util::removeNulls(
            ['appID' => $appID, 'objectType' => $objectType]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getPropertyGroup($groupName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the schema for a specified object type.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getSchema(
        string $objectType,
        string $appID,
        RequestOptions|array|null $requestOptions = null,
    ): ObjectSchema {
        $params = Util::removeNulls(['appID' => $appID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getSchema($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the existing objects types that belong to the specified media type.
     *
     * @param \HubspotSDK\Cms\MediaBridge\MediaBridgeListObjectTypesByMediaTypeParams\MediaType|value-of<\HubspotSDK\Cms\MediaBridge\MediaBridgeListObjectTypesByMediaTypeParams\MediaType> $mediaType Path param
     * @param string $appID Path param
     * @param bool $includeFullDefinition Query param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listObjectTypesByMediaType(
        \HubspotSDK\Cms\MediaBridge\MediaBridgeListObjectTypesByMediaTypeParams\MediaType|string $mediaType,
        string $appID,
        ?bool $includeFullDefinition = null,
        RequestOptions|array|null $requestOptions = null,
    ): ObjectDefinitionResponse {
        $params = Util::removeNulls(
            ['appID' => $appID, 'includeFullDefinition' => $includeFullDefinition]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listObjectTypesByMediaType($mediaType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the details for existing oEmbed domains for your app
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listOembedDomains(
        string $appID,
        int $domainPortalID = -1,
        RequestOptions|array|null $requestOptions = null,
    ): OEmbedDomainsCollectionResponse {
        $params = Util::removeNulls(['domainPortalID' => $domainPortalID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listOembedDomains($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the existing properties defined for a media object type.
     *
     * @param string $objectType Path param
     * @param string $appID Path param
     * @param bool $archived query param: Whether to return only results that have been archived
     * @param string $properties Query param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listProperties(
        string $objectType,
        string $appID,
        bool $archived = false,
        ?string $properties = null,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponsePropertyNoPaging {
        $params = Util::removeNulls(
            ['appID' => $appID, 'archived' => $archived, 'properties' => $properties]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listProperties($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the property groups for a specified object type.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listPropertyGroups(
        string $objectType,
        string $appID,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponsePropertyGroupNoPaging {
        $params = Util::removeNulls(['appID' => $appID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listPropertyGroups($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the schemas for all object types.
     *
     * @param bool $archived whether to return only results that have been archived
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listSchemas(
        string $appID,
        bool $archived = false,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponseObjectSchemaNoPaging {
        $params = Util::removeNulls(['archived' => $archived]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listSchemas($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @deprecated
     *
     * @api
     *
     * Register the name that your app will display when a user is selecting media bridge items.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function registerAppName(
        string $appID,
        int $updatedAt,
        ?bool $allowImportOnDisconnect = null,
        ?string $moduleName = null,
        ?string $name = null,
        RequestOptions|array|null $requestOptions = null,
    ): MediaBridgeProviderRegistrationResponse {
        $params = Util::removeNulls(
            [
                'updatedAt' => $updatedAt,
                'allowImportOnDisconnect' => $allowImportOnDisconnect,
                'moduleName' => $moduleName,
                'name' => $name,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->registerAppName($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Set the visibility settings for media bridge events created by your app.
     *
     * @param EventType|value-of<EventType> $eventType
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateEventVisibilitySettings(
        string $appID,
        EventType|string $eventType,
        int $updatedAt,
        ?bool $showInReporting = null,
        ?bool $showInTimeline = null,
        ?bool $showInWorkflows = null,
        RequestOptions|array|null $requestOptions = null,
    ): EventVisibilityChange {
        $params = Util::removeNulls(
            [
                'eventType' => $eventType,
                'updatedAt' => $updatedAt,
                'showInReporting' => $showInReporting,
                'showInTimeline' => $showInTimeline,
                'showInWorkflows' => $showInWorkflows,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateEventVisibilitySettings($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update an existing oEmbed domain.
     *
     * @param string $oEmbedDomainID Path param
     * @param string $appID Path param
     * @param Endpoints|EndpointsShape $endpoints Body param
     * @param int $portalID Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateOembedDomain(
        string $oEmbedDomainID,
        string $appID,
        Endpoints|array $endpoints,
        ?int $portalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): IntegratorOEmbedDomainModel {
        $params = Util::removeNulls(
            ['appID' => $appID, 'endpoints' => $endpoints, 'portalID' => $portalID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateOembedDomain($oEmbedDomainID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update an existing property for an object type.
     *
     * @param string $propertyName Path param
     * @param string $appID Path param
     * @param string $objectType Path param
     * @param string $calculationFormula Body param
     * @param string $description Body param
     * @param int $displayOrder Body param
     * @param \HubspotSDK\Cms\MediaBridge\MediaBridgeUpdatePropertyParams\FieldType|value-of<\HubspotSDK\Cms\MediaBridge\MediaBridgeUpdatePropertyParams\FieldType> $fieldType Body param
     * @param bool $formField Body param
     * @param string $groupName Body param
     * @param bool $hasUniqueValue Body param
     * @param bool $hidden Body param
     * @param string $label Body param
     * @param list<OptionInput|OptionInputShape> $options Body param
     * @param \HubspotSDK\Cms\MediaBridge\MediaBridgeUpdatePropertyParams\Type|value-of<\HubspotSDK\Cms\MediaBridge\MediaBridgeUpdatePropertyParams\Type> $type Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateProperty(
        string $propertyName,
        string $appID,
        string $objectType,
        ?string $calculationFormula = null,
        ?string $description = null,
        ?int $displayOrder = null,
        \HubspotSDK\Cms\MediaBridge\MediaBridgeUpdatePropertyParams\FieldType|string|null $fieldType = null,
        ?bool $formField = null,
        ?string $groupName = null,
        ?bool $hasUniqueValue = null,
        ?bool $hidden = null,
        ?string $label = null,
        ?array $options = null,
        \HubspotSDK\Cms\MediaBridge\MediaBridgeUpdatePropertyParams\Type|string|null $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): Property {
        $params = Util::removeNulls(
            [
                'appID' => $appID,
                'objectType' => $objectType,
                'calculationFormula' => $calculationFormula,
                'description' => $description,
                'displayOrder' => $displayOrder,
                'fieldType' => $fieldType,
                'formField' => $formField,
                'groupName' => $groupName,
                'hasUniqueValue' => $hasUniqueValue,
                'hidden' => $hidden,
                'label' => $label,
                'options' => $options,
                'type' => $type,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateProperty($propertyName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update an existing property group by name.
     *
     * @param string $groupName Path param
     * @param string $appID Path param
     * @param string $objectType Path param
     * @param int $displayOrder Body param
     * @param string $label Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updatePropertyGroup(
        string $groupName,
        string $appID,
        string $objectType,
        ?int $displayOrder = null,
        ?string $label = null,
        RequestOptions|array|null $requestOptions = null,
    ): PropertyGroup {
        $params = Util::removeNulls(
            [
                'appID' => $appID,
                'objectType' => $objectType,
                'displayOrder' => $displayOrder,
                'label' => $label,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updatePropertyGroup($groupName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update the schema for an existing object type
     *
     * @param string $objectType Path param
     * @param string $appID Path param
     * @param bool $clearDescription Body param
     * @param bool $allowsSensitiveProperties Body param
     * @param string $description Body param
     * @param ObjectTypeDefinitionLabels|ObjectTypeDefinitionLabelsShape $labels Body param
     * @param string $primaryDisplayProperty Body param
     * @param list<string> $requiredProperties Body param
     * @param bool $restorable Body param
     * @param list<string> $searchableProperties Body param
     * @param list<string> $secondaryDisplayProperties Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateSchema(
        string $objectType,
        string $appID,
        bool $clearDescription,
        ?bool $allowsSensitiveProperties = null,
        ?string $description = null,
        ObjectTypeDefinitionLabels|array|null $labels = null,
        ?string $primaryDisplayProperty = null,
        ?array $requiredProperties = null,
        ?bool $restorable = null,
        ?array $searchableProperties = null,
        ?array $secondaryDisplayProperties = null,
        RequestOptions|array|null $requestOptions = null,
    ): ObjectTypeDefinition {
        $params = Util::removeNulls(
            [
                'appID' => $appID,
                'clearDescription' => $clearDescription,
                'allowsSensitiveProperties' => $allowsSensitiveProperties,
                'description' => $description,
                'labels' => $labels,
                'primaryDisplayProperty' => $primaryDisplayProperty,
                'requiredProperties' => $requiredProperties,
                'restorable' => $restorable,
                'searchableProperties' => $searchableProperties,
                'secondaryDisplayProperties' => $secondaryDisplayProperties,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateSchema($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update the name that your app will display when a user is selecting media bridge items.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateSettings(
        string $appID,
        int $updatedAt,
        ?bool $allowImportOnDisconnect = null,
        ?string $moduleName = null,
        ?string $name = null,
        RequestOptions|array|null $requestOptions = null,
    ): MediaBridgeProviderRegistrationResponse {
        $params = Util::removeNulls(
            [
                'updatedAt' => $updatedAt,
                'allowImportOnDisconnect' => $allowImportOnDisconnect,
                'moduleName' => $moduleName,
                'name' => $name,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateSettings($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}

<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms;

use HubspotSDK\AssociationDefinition;
use HubspotSDK\Cms\MediaBridge\AttentionSpanCalculatedValues;
use HubspotSDK\Cms\MediaBridge\AttentionSpanEvent;
use HubspotSDK\Cms\MediaBridge\BulkIntegratorObjectCreationResponse;
use HubspotSDK\Cms\MediaBridge\CollectionResponseObjectSchemaNoPaging;
use HubspotSDK\Cms\MediaBridge\CollectionResponsePropertyNoPaging;
use HubspotSDK\Cms\MediaBridge\Endpoints;
use HubspotSDK\Cms\MediaBridge\EventVisibilityChange;
use HubspotSDK\Cms\MediaBridge\EventVisibilityResponse;
use HubspotSDK\Cms\MediaBridge\IntegratorOEmbedDomainModel;
use HubspotSDK\Cms\MediaBridge\MediaBridgeCreateAttentionSpanEventParams\ExternalPlayContext;
use HubspotSDK\Cms\MediaBridge\MediaBridgeCreateAttentionSpanEventParams\MediaType;
use HubspotSDK\Cms\MediaBridge\MediaBridgeCreateMediaPlayedEventParams\State;
use HubspotSDK\Cms\MediaBridge\MediaBridgeCreatePropertyParams\DataSensitivity;
use HubspotSDK\Cms\MediaBridge\MediaBridgeCreatePropertyParams\FieldType;
use HubspotSDK\Cms\MediaBridge\MediaBridgeCreatePropertyParams\Type;
use HubspotSDK\Cms\MediaBridge\MediaBridgeProviderRegistrationResponse;
use HubspotSDK\Cms\MediaBridge\MediaBridgeUpdateEventVisibilitySettingsParams\EventType;
use HubspotSDK\Cms\MediaBridge\MediaPlayedEvent;
use HubspotSDK\Cms\MediaBridge\MediaPlayedPercentageEvent;
use HubspotSDK\Cms\MediaBridge\ObjectDefinitionResponse;
use HubspotSDK\Cms\MediaBridge\ObjectSchema;
use HubspotSDK\Cms\MediaBridge\OEmbedDomainsCollectionResponse;
use HubspotSDK\Cms\MediaBridge\Property;
use HubspotSDK\CollectionResponsePropertyGroupNoPaging;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\ObjectTypeDefinition;
use HubspotSDK\ObjectTypeDefinitionLabels;
use HubspotSDK\OptionInput;
use HubspotSDK\PropertyGroup;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type AttentionSpanCalculatedValuesShape from \HubspotSDK\Cms\MediaBridge\AttentionSpanCalculatedValues
 * @phpstan-import-type ObjectTypeDefinitionLabelsShape from \HubspotSDK\ObjectTypeDefinitionLabels
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 * @phpstan-import-type EndpointsShape from \HubspotSDK\Cms\MediaBridge\Endpoints
 * @phpstan-import-type OptionInputShape from \HubspotSDK\OptionInput
 */
interface MediaBridgeContract
{
    /**
     * @api
     *
     * @param string $objectType Path param
     * @param int $appID Path param
     * @param string $fromObjectTypeID Body param
     * @param string $toObjectTypeID Body param
     * @param string $name Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createAssociation(
        string $objectType,
        int $appID,
        string $fromObjectTypeID,
        string $toObjectTypeID,
        ?string $name = null,
        RequestOptions|array|null $requestOptions = null,
    ): AssociationDefinition;

    /**
     * @api
     *
     * @param MediaType|value-of<MediaType> $mediaType
     * @param array<string,int> $rawDataMap
     * @param AttentionSpanCalculatedValues|AttentionSpanCalculatedValuesShape $derivedValues
     * @param ExternalPlayContext|value-of<ExternalPlayContext> $externalPlayContext
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createAttentionSpanEvent(
        MediaType|string $mediaType,
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
    ): AttentionSpanEvent;

    /**
     * @api
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
    ): MediaPlayedEvent;

    /**
     * @api
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
    ): MediaPlayedPercentageEvent;

    /**
     * @api
     *
     * @param list<\HubspotSDK\Cms\MediaBridge\MediaBridgeCreateObjectTypeParams\MediaType|value-of<\HubspotSDK\Cms\MediaBridge\MediaBridgeCreateObjectTypeParams\MediaType>> $mediaTypes
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createObjectType(
        int $appID,
        array $mediaTypes,
        RequestOptions|array|null $requestOptions = null,
    ): BulkIntegratorObjectCreationResponse;

    /**
     * @api
     *
     * @param Endpoints|EndpointsShape $endpoints
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createOembedDomain(
        int $appID,
        Endpoints|array $endpoints,
        ?int $portalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): IntegratorOEmbedDomainModel;

    /**
     * @api
     *
     * @param string $objectType Path param
     * @param int $appID Path param
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
        int $appID,
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
    ): Property;

    /**
     * @api
     *
     * @param string $objectType Path param
     * @param int $appID Path param
     * @param string $label Body param
     * @param string $name Body param
     * @param int $displayOrder Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createPropertyGroup(
        string $objectType,
        int $appID,
        string $label,
        string $name,
        ?int $displayOrder = null,
        RequestOptions|array|null $requestOptions = null,
    ): PropertyGroup;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createVideoAssociationDefinition(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): AssociationDefinition;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteAssociation(
        string $associationID,
        int $appID,
        string $objectType,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteOembedDomain(
        int $appID,
        ?int $id = null,
        int $domainPortalID = -1,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteProperty(
        string $propertyName,
        int $appID,
        string $objectType,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deletePropertyGroup(
        string $groupName,
        int $appID,
        string $objectType,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getEventVisibilitySettings(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): EventVisibilityResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getOembedDomain(
        string $oEmbedDomainID,
        int $appID,
        RequestOptions|array|null $requestOptions = null,
    ): IntegratorOEmbedDomainModel;

    /**
     * @api
     *
     * @param string $propertyName Path param
     * @param int $appID Path param
     * @param string $objectType Path param
     * @param bool $archived query param: Whether to return only results that have been archived
     * @param string $properties Query param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getProperty(
        string $propertyName,
        int $appID,
        string $objectType,
        bool $archived = false,
        ?string $properties = null,
        RequestOptions|array|null $requestOptions = null,
    ): Property;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getPropertyGroup(
        string $groupName,
        int $appID,
        string $objectType,
        RequestOptions|array|null $requestOptions = null,
    ): PropertyGroup;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getSchema(
        string $objectType,
        int $appID,
        RequestOptions|array|null $requestOptions = null,
    ): ObjectSchema;

    /**
     * @api
     *
     * @param \HubspotSDK\Cms\MediaBridge\MediaBridgeListObjectTypesByMediaTypeParams\MediaType|string $mediaType Path param
     * @param int $appID Path param
     * @param bool $includeFullDefinition Query param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listObjectTypesByMediaType(
        \HubspotSDK\Cms\MediaBridge\MediaBridgeListObjectTypesByMediaTypeParams\MediaType|string $mediaType,
        int $appID,
        ?bool $includeFullDefinition = null,
        RequestOptions|array|null $requestOptions = null,
    ): ObjectDefinitionResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listOembedDomains(
        int $appID,
        int $domainPortalID = -1,
        RequestOptions|array|null $requestOptions = null,
    ): OEmbedDomainsCollectionResponse;

    /**
     * @api
     *
     * @param string $objectType Path param
     * @param int $appID Path param
     * @param bool $archived query param: Whether to return only results that have been archived
     * @param string $properties Query param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listProperties(
        string $objectType,
        int $appID,
        bool $archived = false,
        ?string $properties = null,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponsePropertyNoPaging;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listPropertyGroups(
        string $objectType,
        int $appID,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponsePropertyGroupNoPaging;

    /**
     * @api
     *
     * @param bool $archived whether to return only results that have been archived
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listSchemas(
        int $appID,
        bool $archived = false,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponseObjectSchemaNoPaging;

    /**
     * @deprecated
     *
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function registerAppName(
        int $appID,
        int $updatedAt,
        ?bool $allowImportOnDisconnect = null,
        ?string $moduleName = null,
        ?string $name = null,
        RequestOptions|array|null $requestOptions = null,
    ): MediaBridgeProviderRegistrationResponse;

    /**
     * @api
     *
     * @param EventType|value-of<EventType> $eventType
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateEventVisibilitySettings(
        int $appID,
        EventType|string $eventType,
        int $updatedAt,
        ?bool $showInReporting = null,
        ?bool $showInTimeline = null,
        ?bool $showInWorkflows = null,
        RequestOptions|array|null $requestOptions = null,
    ): EventVisibilityChange;

    /**
     * @api
     *
     * @param string $oEmbedDomainID Path param
     * @param int $appID Path param
     * @param Endpoints|EndpointsShape $endpoints Body param
     * @param int $portalID Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateOembedDomain(
        string $oEmbedDomainID,
        int $appID,
        Endpoints|array $endpoints,
        ?int $portalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): IntegratorOEmbedDomainModel;

    /**
     * @api
     *
     * @param string $propertyName Path param
     * @param int $appID Path param
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
        int $appID,
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
    ): Property;

    /**
     * @api
     *
     * @param string $groupName Path param
     * @param int $appID Path param
     * @param string $objectType Path param
     * @param int $displayOrder Body param
     * @param string $label Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updatePropertyGroup(
        string $groupName,
        int $appID,
        string $objectType,
        ?int $displayOrder = null,
        ?string $label = null,
        RequestOptions|array|null $requestOptions = null,
    ): PropertyGroup;

    /**
     * @api
     *
     * @param string $objectType Path param
     * @param int $appID Path param
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
        int $appID,
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
    ): ObjectTypeDefinition;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateSettings(
        int $appID,
        int $updatedAt,
        ?bool $allowImportOnDisconnect = null,
        ?string $moduleName = null,
        ?string $name = null,
        RequestOptions|array|null $requestOptions = null,
    ): MediaBridgeProviderRegistrationResponse;
}

<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Cms;

use HubSpotSDK\AssociationDefinition;
use HubSpotSDK\Cms\MediaBridge\AttentionSpanCalculatedValues;
use HubSpotSDK\Cms\MediaBridge\AttentionSpanEvent;
use HubSpotSDK\Cms\MediaBridge\BulkIntegratorObjectCreationResponse;
use HubSpotSDK\Cms\MediaBridge\CollectionResponseObjectSchemaNoPaging;
use HubSpotSDK\Cms\MediaBridge\CollectionResponsePropertyNoPaging;
use HubSpotSDK\Cms\MediaBridge\Endpoints;
use HubSpotSDK\Cms\MediaBridge\EventVisibilityChange;
use HubSpotSDK\Cms\MediaBridge\EventVisibilityResponse;
use HubSpotSDK\Cms\MediaBridge\IntegratorOEmbedDomainModel;
use HubSpotSDK\Cms\MediaBridge\MediaBridgeCreateAttentionSpanEventParams\ExternalPlayContext;
use HubSpotSDK\Cms\MediaBridge\MediaBridgeCreateAttentionSpanEventParams\MediaType;
use HubSpotSDK\Cms\MediaBridge\MediaBridgeCreateMediaPlayedEventParams\State;
use HubSpotSDK\Cms\MediaBridge\MediaBridgeCreatePropertyParams\DataSensitivity;
use HubSpotSDK\Cms\MediaBridge\MediaBridgeCreatePropertyParams\FieldType;
use HubSpotSDK\Cms\MediaBridge\MediaBridgeCreatePropertyParams\NumberDisplayHint;
use HubSpotSDK\Cms\MediaBridge\MediaBridgeCreatePropertyParams\Type;
use HubSpotSDK\Cms\MediaBridge\MediaBridgeProviderRegistrationResponse;
use HubSpotSDK\Cms\MediaBridge\MediaBridgeUpdateEventVisibilitySettingsParams\EventType;
use HubSpotSDK\Cms\MediaBridge\MediaPlayedEvent;
use HubSpotSDK\Cms\MediaBridge\MediaPlayedPercentageEvent;
use HubSpotSDK\Cms\MediaBridge\ObjectDefinitionResponse;
use HubSpotSDK\Cms\MediaBridge\ObjectSchema;
use HubSpotSDK\Cms\MediaBridge\OEmbedDomainsCollectionResponse;
use HubSpotSDK\Cms\MediaBridge\Property;
use HubSpotSDK\CollectionResponsePropertyGroupNoPaging;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\ObjectTypeDefinition;
use HubSpotSDK\ObjectTypeDefinitionLabels;
use HubSpotSDK\OptionInput;
use HubSpotSDK\PropertyGroup;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type AttentionSpanCalculatedValuesShape from \HubSpotSDK\Cms\MediaBridge\AttentionSpanCalculatedValues
 * @phpstan-import-type ObjectTypeDefinitionLabelsShape from \HubSpotSDK\ObjectTypeDefinitionLabels
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 * @phpstan-import-type EndpointsShape from \HubSpotSDK\Cms\MediaBridge\Endpoints
 * @phpstan-import-type OptionInputShape from \HubSpotSDK\OptionInput
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
     * @param \HubSpotSDK\Cms\MediaBridge\MediaBridgeCreateMediaPlayedEventParams\MediaType|value-of<\HubSpotSDK\Cms\MediaBridge\MediaBridgeCreateMediaPlayedEventParams\MediaType> $mediaType
     * @param State|value-of<State> $state
     * @param \HubSpotSDK\Cms\MediaBridge\MediaBridgeCreateMediaPlayedEventParams\ExternalPlayContext|value-of<\HubSpotSDK\Cms\MediaBridge\MediaBridgeCreateMediaPlayedEventParams\ExternalPlayContext> $externalPlayContext
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createMediaPlayedEvent(
        \HubSpotSDK\Cms\MediaBridge\MediaBridgeCreateMediaPlayedEventParams\MediaType|string $mediaType,
        int $occurredTimestamp,
        string $sessionID,
        State|string $state,
        ?string $_hsenc = null,
        ?int $contactID = null,
        ?string $contactUtk = null,
        ?string $externalID = null,
        \HubSpotSDK\Cms\MediaBridge\MediaBridgeCreateMediaPlayedEventParams\ExternalPlayContext|string|null $externalPlayContext = null,
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
     * @param \HubSpotSDK\Cms\MediaBridge\MediaBridgeCreateMediaPlayedPercentEventParams\MediaType|value-of<\HubSpotSDK\Cms\MediaBridge\MediaBridgeCreateMediaPlayedPercentEventParams\MediaType> $mediaType
     * @param \HubSpotSDK\Cms\MediaBridge\MediaBridgeCreateMediaPlayedPercentEventParams\ExternalPlayContext|value-of<\HubSpotSDK\Cms\MediaBridge\MediaBridgeCreateMediaPlayedPercentEventParams\ExternalPlayContext> $externalPlayContext
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createMediaPlayedPercentEvent(
        \HubSpotSDK\Cms\MediaBridge\MediaBridgeCreateMediaPlayedPercentEventParams\MediaType|string $mediaType,
        int $occurredTimestamp,
        int $playedPercent,
        string $sessionID,
        ?string $_hsenc = null,
        ?int $contactID = null,
        ?string $contactUtk = null,
        ?string $externalID = null,
        \HubSpotSDK\Cms\MediaBridge\MediaBridgeCreateMediaPlayedPercentEventParams\ExternalPlayContext|string|null $externalPlayContext = null,
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
     * @param list<\HubSpotSDK\Cms\MediaBridge\MediaBridgeCreateObjectTypeParams\MediaType|value-of<\HubSpotSDK\Cms\MediaBridge\MediaBridgeCreateObjectTypeParams\MediaType>> $mediaTypes
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
     * @param string $currencyPropertyName Body param
     * @param DataSensitivity|value-of<DataSensitivity> $dataSensitivity Body param
     * @param string $description Body param
     * @param int $displayOrder Body param
     * @param bool $externalOptions Body param
     * @param bool $formField Body param
     * @param bool $hasUniqueValue Body param
     * @param bool $hidden Body param
     * @param NumberDisplayHint|value-of<NumberDisplayHint> $numberDisplayHint Body param
     * @param list<OptionInput|OptionInputShape> $options Body param
     * @param string $referencedObjectType Body param
     * @param bool $showCurrencySymbol Body param
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
        ?string $currencyPropertyName = null,
        DataSensitivity|string|null $dataSensitivity = null,
        ?string $description = null,
        ?int $displayOrder = null,
        ?bool $externalOptions = null,
        ?bool $formField = null,
        ?bool $hasUniqueValue = null,
        ?bool $hidden = null,
        NumberDisplayHint|string|null $numberDisplayHint = null,
        ?array $options = null,
        ?string $referencedObjectType = null,
        ?bool $showCurrencySymbol = null,
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
     * @param \HubSpotSDK\Cms\MediaBridge\MediaBridgeListObjectTypesByMediaTypeParams\MediaType|string $mediaType Path param
     * @param int $appID Path param
     * @param bool $includeFullDefinition Query param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listObjectTypesByMediaType(
        \HubSpotSDK\Cms\MediaBridge\MediaBridgeListObjectTypesByMediaTypeParams\MediaType|string $mediaType,
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
     * @param string $currencyPropertyName Body param
     * @param string $description Body param
     * @param int $displayOrder Body param
     * @param \HubSpotSDK\Cms\MediaBridge\MediaBridgeUpdatePropertyParams\FieldType|value-of<\HubSpotSDK\Cms\MediaBridge\MediaBridgeUpdatePropertyParams\FieldType> $fieldType Body param
     * @param bool $formField Body param
     * @param string $groupName Body param
     * @param bool $hasUniqueValue Body param
     * @param bool $hidden Body param
     * @param string $label Body param
     * @param \HubSpotSDK\Cms\MediaBridge\MediaBridgeUpdatePropertyParams\NumberDisplayHint|value-of<\HubSpotSDK\Cms\MediaBridge\MediaBridgeUpdatePropertyParams\NumberDisplayHint> $numberDisplayHint Body param
     * @param list<OptionInput|OptionInputShape> $options Body param
     * @param bool $showCurrencySymbol Body param
     * @param \HubSpotSDK\Cms\MediaBridge\MediaBridgeUpdatePropertyParams\Type|value-of<\HubSpotSDK\Cms\MediaBridge\MediaBridgeUpdatePropertyParams\Type> $type Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateProperty(
        string $propertyName,
        int $appID,
        string $objectType,
        ?string $calculationFormula = null,
        ?string $currencyPropertyName = null,
        ?string $description = null,
        ?int $displayOrder = null,
        \HubSpotSDK\Cms\MediaBridge\MediaBridgeUpdatePropertyParams\FieldType|string|null $fieldType = null,
        ?bool $formField = null,
        ?string $groupName = null,
        ?bool $hasUniqueValue = null,
        ?bool $hidden = null,
        ?string $label = null,
        \HubSpotSDK\Cms\MediaBridge\MediaBridgeUpdatePropertyParams\NumberDisplayHint|string|null $numberDisplayHint = null,
        ?array $options = null,
        ?bool $showCurrencySymbol = null,
        \HubSpotSDK\Cms\MediaBridge\MediaBridgeUpdatePropertyParams\Type|string|null $type = null,
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

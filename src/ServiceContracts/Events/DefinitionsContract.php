<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Events;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Events\BehavioralEventHTTPCompletionRequest;
use HubspotSDK\Events\Definitions\ExternalBehavioralEventPropertyCreate;
use HubspotSDK\Events\Definitions\ExternalBehavioralEventTypeDefinition;
use HubspotSDK\Events\Definitions\ExternalObjectResolutionMappingRequest;
use HubspotSDK\OptionInput;
use HubspotSDK\Page;
use HubspotSDK\Property;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type ExternalBehavioralEventPropertyCreateShape from \HubspotSDK\Events\Definitions\ExternalBehavioralEventPropertyCreate
 * @phpstan-import-type ExternalObjectResolutionMappingRequestShape from \HubspotSDK\Events\Definitions\ExternalObjectResolutionMappingRequest
 * @phpstan-import-type BehavioralEventHTTPCompletionRequestShape from \HubspotSDK\Events\BehavioralEventHTTPCompletionRequest
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 * @phpstan-import-type OptionInputShape from \HubspotSDK\OptionInput
 */
interface DefinitionsContract
{
    /**
     * @api
     *
     * @param string $label Human readable label for the event. Used in HubSpot UI
     * @param list<ExternalBehavioralEventPropertyCreate|ExternalBehavioralEventPropertyCreateShape> $propertyDefinitions List of custom properties on event
     * @param ExternalObjectResolutionMappingRequest|ExternalObjectResolutionMappingRequestShape $customMatchingID
     * @param string $description a description of the event that will be shown as help text in HubSpot
     * @param string $name Internal event name, which must be used when referencing the event from this event definitions API. If a name is not supplied, one will be generated based on the label. The `name` value will also be used to automatically generate a `fullyQualifiedName` for the event definition, which you'll use when sending event completions to this event.
     * @param string $primaryObject The object type to associate this event to. Can be one of CONTACT, COMPANY, DEAL, TICKET. If no primaryObject is supplied, we will default to associating the event to CONTACT objects.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        bool $includeDefaultProperties,
        string $label,
        array $propertyDefinitions,
        ExternalObjectResolutionMappingRequest|array|null $customMatchingID = null,
        ?string $description = null,
        ?string $name = null,
        ?string $primaryObject = null,
        RequestOptions|array|null $requestOptions = null,
    ): ExternalBehavioralEventTypeDefinition;

    /**
     * @api
     *
     * @param string $description a description of the event that will be shown as help text in HubSpot
     * @param string $label Human readable label for the event. Used in HubSpot UI
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $eventName,
        ?string $description = null,
        ?string $label = null,
        RequestOptions|array|null $requestOptions = null,
    ): ExternalBehavioralEventTypeDefinition;

    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit the maximum number of results to display per page
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<ExternalBehavioralEventTypeDefinition>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        ?bool $includeProperties = null,
        ?int $limit = null,
        ?string $searchString = null,
        ?string $sortOrder = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $eventName,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $label Human readable label for the property. Used in HubSpot UI
     * @param string $type The data type of the property. Can be one of the following: [string, number, enumeration, datetime]
     * @param string $description a description of the property that will be shown as help text in HubSpot
     * @param string $name Internal property name, which must be used when referencing the property from the API
     * @param list<OptionInput|OptionInputShape> $options A list of available options for the property if it is an enumeration. NOTE: This field is only applicable for enumerated properties.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createProperty(
        string $eventName,
        string $label,
        string $type,
        ?string $description = null,
        ?string $name = null,
        ?array $options = null,
        RequestOptions|array|null $requestOptions = null,
    ): Property;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteProperty(
        string $propertyName,
        string $eventName,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $eventName,
        RequestOptions|array|null $requestOptions = null
    ): ExternalBehavioralEventTypeDefinition;

    /**
     * @api
     *
     * @param list<BehavioralEventHTTPCompletionRequest|BehavioralEventHTTPCompletionRequestShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function sendBatch(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $propertyName Path param
     * @param string $eventName Path param
     * @param string $description body param: A description of the property that will be shown as help text in HubSpot
     * @param string $label Body param: Human readable label for the property. Used in HubSpot UI
     * @param list<OptionInput|OptionInputShape> $options Body param: A list of available options for the property if it is an enumeration. NOTE: This field is only applicable for enumerated properties.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateProperty(
        string $propertyName,
        string $eventName,
        ?string $description = null,
        ?string $label = null,
        ?array $options = null,
        RequestOptions|array|null $requestOptions = null,
    ): Property;
}

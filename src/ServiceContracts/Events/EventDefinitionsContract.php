<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Events;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Events\EventDefinitions\ExternalBehavioralEventPropertyCreate;
use HubspotSDK\Events\EventDefinitions\ExternalBehavioralEventTypeDefinition;
use HubspotSDK\OptionInput;
use HubspotSDK\Page;
use HubspotSDK\Property;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface EventDefinitionsContract
{
    /**
     * @api
     *
     * @param string $label Human readable label for the event. Used in HubSpot UI
     * @param list<ExternalBehavioralEventPropertyCreate> $propertyDefinitions List of custom properties on event
     * @param string $description a description of the event that will be shown as help text in HubSpot
     * @param string $name Internal event name, which must be used when referencing the event from this event definitions API. If a name is not supplied, one will be generated based on the label. The `name` value will also be used to automatically generate a `fullyQualifiedName` for the event definition, which you'll use when sending event completions to this event.
     * @param string $primaryObject The object type to associate this event to. Can be one of CONTACT, COMPANY, DEAL, TICKET. If no primaryObject is supplied, we will default to associating the event to CONTACT objects.
     *
     * @throws APIException
     */
    public function create(
        $label,
        $propertyDefinitions,
        $description = omit,
        $name = omit,
        $primaryObject = omit,
        ?RequestOptions $requestOptions = null,
    ): ExternalBehavioralEventTypeDefinition;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): ExternalBehavioralEventTypeDefinition;

    /**
     * @api
     *
     * @param string $description a description of the event that will be shown as help text in HubSpot
     * @param string $label Human readable label for the event. Used in HubSpot UI
     *
     * @throws APIException
     */
    public function update(
        string $eventName,
        $description = omit,
        $label = omit,
        ?RequestOptions $requestOptions = null,
    ): ExternalBehavioralEventTypeDefinition;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $eventName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ExternalBehavioralEventTypeDefinition;

    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $includeProperties
     * @param int $limit the maximum number of results to display per page
     * @param string $searchString Characters in the event name that the user is searching for. This search is a naive “contains” search, no fuzzy matching is done.
     * @param string $sortOrder
     *
     * @return Page<ExternalBehavioralEventTypeDefinition>
     *
     * @throws APIException
     */
    public function list(
        $after = omit,
        $includeProperties = omit,
        $limit = omit,
        $searchString = omit,
        $sortOrder = omit,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return Page<ExternalBehavioralEventTypeDefinition>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $eventName,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $label Human readable label for the property. Used in HubSpot UI
     * @param string $type The data type of the property. Can be one of the following: [string, number, enumeration, datetime]
     * @param string $description a description of the property that will be shown as help text in HubSpot
     * @param string $name Internal property name, which must be used when referencing the property from the API
     * @param list<OptionInput> $options A list of available options for the property if it is an enumeration. NOTE: This field is only applicable for enumerated properties.
     *
     * @throws APIException
     */
    public function createProperty(
        string $eventName,
        $label,
        $type,
        $description = omit,
        $name = omit,
        $options = omit,
        ?RequestOptions $requestOptions = null,
    ): Property;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createPropertyRaw(
        string $eventName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): Property;

    /**
     * @api
     *
     * @param string $eventName
     *
     * @throws APIException
     */
    public function deleteProperty(
        string $propertyName,
        $eventName,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deletePropertyRaw(
        string $propertyName,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        string $eventName,
        ?RequestOptions $requestOptions = null
    ): ExternalBehavioralEventTypeDefinition;

    /**
     * @api
     *
     * @param string $eventName
     * @param string $description a description of the property that will be shown as help text in HubSpot
     * @param string $label Human readable label for the property. Used in HubSpot UI
     * @param list<OptionInput> $options A list of available options for the property if it is an enumeration. NOTE: This field is only applicable for enumerated properties.
     *
     * @throws APIException
     */
    public function updateProperty(
        string $propertyName,
        $eventName,
        $description = omit,
        $label = omit,
        $options = omit,
        ?RequestOptions $requestOptions = null,
    ): Property;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updatePropertyRaw(
        string $propertyName,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): Property;
}

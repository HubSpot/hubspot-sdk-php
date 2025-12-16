<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Events;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Events\EventDefinitions\EventDefinitionCreateParams;
use HubspotSDK\Events\EventDefinitions\EventDefinitionCreatePropertyParams;
use HubspotSDK\Events\EventDefinitions\EventDefinitionDeletePropertyParams;
use HubspotSDK\Events\EventDefinitions\EventDefinitionListParams;
use HubspotSDK\Events\EventDefinitions\EventDefinitionUpdateParams;
use HubspotSDK\Events\EventDefinitions\EventDefinitionUpdatePropertyParams;
use HubspotSDK\Events\EventDefinitions\ExternalBehavioralEventTypeDefinition;
use HubspotSDK\Page;
use HubspotSDK\Property;
use HubspotSDK\RequestOptions;

interface EventDefinitionsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|EventDefinitionCreateParams $params
     *
     * @return BaseResponse<ExternalBehavioralEventTypeDefinition>
     *
     * @throws APIException
     */
    public function create(
        array|EventDefinitionCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $eventName the internal name of the custom event
     * @param array<string,mixed>|EventDefinitionUpdateParams $params
     *
     * @return BaseResponse<ExternalBehavioralEventTypeDefinition>
     *
     * @throws APIException
     */
    public function update(
        string $eventName,
        array|EventDefinitionUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EventDefinitionListParams $params
     *
     * @return BaseResponse<Page<ExternalBehavioralEventTypeDefinition>>
     *
     * @throws APIException
     */
    public function list(
        array|EventDefinitionListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $eventName the name of the event definition
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $eventName,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $eventName the internal name of the custom event
     * @param array<string,mixed>|EventDefinitionCreatePropertyParams $params
     *
     * @return BaseResponse<Property>
     *
     * @throws APIException
     */
    public function createProperty(
        string $eventName,
        array|EventDefinitionCreatePropertyParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $propertyName the internal name of the property to delete
     * @param array<string,mixed>|EventDefinitionDeletePropertyParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteProperty(
        string $propertyName,
        array|EventDefinitionDeletePropertyParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $eventName the internal name of the custom event
     *
     * @return BaseResponse<ExternalBehavioralEventTypeDefinition>
     *
     * @throws APIException
     */
    public function get(
        string $eventName,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $propertyName path param: The internal name of the property to update
     * @param array<string,mixed>|EventDefinitionUpdatePropertyParams $params
     *
     * @return BaseResponse<Property>
     *
     * @throws APIException
     */
    public function updateProperty(
        string $propertyName,
        array|EventDefinitionUpdatePropertyParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}

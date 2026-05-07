<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Crm\Properties\CollectionResponsePropertyNoPaging;
use HubSpotSDK\Crm\Properties\PropertyCreateParams\DataSensitivity;
use HubSpotSDK\Crm\Properties\PropertyCreateParams\FieldType;
use HubSpotSDK\Crm\Properties\PropertyCreateParams\NumberDisplayHint;
use HubSpotSDK\Crm\Properties\PropertyCreateParams\Type;
use HubSpotSDK\OptionInput;
use HubSpotSDK\Property;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Crm\PropertiesContract;
use HubSpotSDK\Services\Crm\Properties\BatchService;
use HubSpotSDK\Services\Crm\Properties\GroupsService;

/**
 * @phpstan-import-type OptionInputShape from \HubSpotSDK\OptionInput
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class PropertiesService implements PropertiesContract
{
    /**
     * @api
     */
    public PropertiesRawService $raw;

    /**
     * @api
     */
    public BatchService $batch;

    /**
     * @api
     */
    public GroupsService $groups;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PropertiesRawService($client);
        $this->batch = new BatchService($client);
        $this->groups = new GroupsService($client);
    }

    /**
     * @api
     *
     * Create and return a copy of a new property for the specified object type.
     *
     * @param FieldType|value-of<FieldType> $fieldType
     * @param Type|value-of<Type> $type
     * @param DataSensitivity|value-of<DataSensitivity> $dataSensitivity
     * @param NumberDisplayHint|value-of<NumberDisplayHint> $numberDisplayHint
     * @param list<OptionInput|OptionInputShape> $options
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
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
    ): Property {
        $params = Util::removeNulls(
            [
                'fieldType' => $fieldType,
                'groupName' => $groupName,
                'label' => $label,
                'name' => $name,
                'type' => $type,
                'calculationFormula' => $calculationFormula,
                'currencyPropertyName' => $currencyPropertyName,
                'dataSensitivity' => $dataSensitivity,
                'description' => $description,
                'displayOrder' => $displayOrder,
                'externalOptions' => $externalOptions,
                'formField' => $formField,
                'hasUniqueValue' => $hasUniqueValue,
                'hidden' => $hidden,
                'numberDisplayHint' => $numberDisplayHint,
                'options' => $options,
                'referencedObjectType' => $referencedObjectType,
                'showCurrencySymbol' => $showCurrencySymbol,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Perform a partial update of a property identified by { propertyName }. Provided fields will be overwritten.
     *
     * @param string $propertyName Path param
     * @param string $objectType Path param
     * @param string $calculationFormula body param: Represents a formula that is used to compute a calculated property
     * @param string $currencyPropertyName Body param
     * @param string $description body param: A description of the property that will be shown as help text in HubSpot
     * @param int $displayOrder Body param: Properties are displayed in order starting with the lowest positive integer value. Values of -1 will cause the Property to be displayed after any positive values.
     * @param \HubSpotSDK\Crm\Properties\PropertyUpdateParams\FieldType|value-of<\HubSpotSDK\Crm\Properties\PropertyUpdateParams\FieldType> $fieldType body param: Controls how the property appears in HubSpot
     * @param bool $formField body param: Whether or not the property can be used in a HubSpot form
     * @param string $groupName body param: The name of the property group the property belongs to
     * @param bool $hidden body param: If true, the property won't be visible and can't be used in HubSpot
     * @param string $label body param: A human-readable property label that will be shown in HubSpot
     * @param \HubSpotSDK\Crm\Properties\PropertyUpdateParams\NumberDisplayHint|value-of<\HubSpotSDK\Crm\Properties\PropertyUpdateParams\NumberDisplayHint> $numberDisplayHint Body param
     * @param list<OptionInput|OptionInputShape> $options body param: A list of valid options for the property
     * @param bool $showCurrencySymbol Body param
     * @param \HubSpotSDK\Crm\Properties\PropertyUpdateParams\Type|value-of<\HubSpotSDK\Crm\Properties\PropertyUpdateParams\Type> $type body param: The data type of the property
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $propertyName,
        string $objectType,
        ?string $calculationFormula = null,
        ?string $currencyPropertyName = null,
        ?string $description = null,
        ?int $displayOrder = null,
        \HubSpotSDK\Crm\Properties\PropertyUpdateParams\FieldType|string|null $fieldType = null,
        ?bool $formField = null,
        ?string $groupName = null,
        ?bool $hidden = null,
        ?string $label = null,
        \HubSpotSDK\Crm\Properties\PropertyUpdateParams\NumberDisplayHint|string|null $numberDisplayHint = null,
        ?array $options = null,
        ?bool $showCurrencySymbol = null,
        \HubSpotSDK\Crm\Properties\PropertyUpdateParams\Type|string|null $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): Property {
        $params = Util::removeNulls(
            [
                'objectType' => $objectType,
                'calculationFormula' => $calculationFormula,
                'currencyPropertyName' => $currencyPropertyName,
                'description' => $description,
                'displayOrder' => $displayOrder,
                'fieldType' => $fieldType,
                'formField' => $formField,
                'groupName' => $groupName,
                'hidden' => $hidden,
                'label' => $label,
                'numberDisplayHint' => $numberDisplayHint,
                'options' => $options,
                'showCurrencySymbol' => $showCurrencySymbol,
                'type' => $type,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($propertyName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Read all existing properties for the specified object type and HubSpot account.
     *
     * @param bool $archived whether to return only results that have been archived
     * @param \HubSpotSDK\Crm\Properties\PropertyListParams\DataSensitivity|value-of<\HubSpotSDK\Crm\Properties\PropertyListParams\DataSensitivity> $dataSensitivity
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        bool $archived = false,
        \HubSpotSDK\Crm\Properties\PropertyListParams\DataSensitivity|string $dataSensitivity = 'non_sensitive',
        ?string $locale = null,
        ?string $properties = null,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponsePropertyNoPaging {
        $params = Util::removeNulls(
            [
                'archived' => $archived,
                'dataSensitivity' => $dataSensitivity,
                'locale' => $locale,
                'properties' => $properties,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Move a property identified by {propertyName} to the recycling bin.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $propertyName,
        string $objectType,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['objectType' => $objectType]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($propertyName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Read a property identified by {propertyName}.
     *
     * @param string $propertyName Path param
     * @param string $objectType Path param
     * @param bool $archived query param: Whether to return only results that have been archived
     * @param \HubSpotSDK\Crm\Properties\PropertyGetParams\DataSensitivity|value-of<\HubSpotSDK\Crm\Properties\PropertyGetParams\DataSensitivity> $dataSensitivity Query param
     * @param string $locale Query param
     * @param string $properties Query param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $propertyName,
        string $objectType,
        bool $archived = false,
        \HubSpotSDK\Crm\Properties\PropertyGetParams\DataSensitivity|string $dataSensitivity = 'non_sensitive',
        ?string $locale = null,
        ?string $properties = null,
        RequestOptions|array|null $requestOptions = null,
    ): Property {
        $params = Util::removeNulls(
            [
                'objectType' => $objectType,
                'archived' => $archived,
                'dataSensitivity' => $dataSensitivity,
                'locale' => $locale,
                'properties' => $properties,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($propertyName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}

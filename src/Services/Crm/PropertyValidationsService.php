<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\PropertyValidations\CollectionResponsePublicPropertyValidationRuleMapNoPaging;
use HubspotSDK\Crm\PropertyValidations\CollectionResponsePublicPropertyValidationRuleNoPaging;
use HubspotSDK\Crm\PropertyValidations\PropertyValidationCrmV3PropertyValidationsObjectTypeIDPropertyNameRuleTypeRuleTypeParams\RuleType;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\PropertyValidationsContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class PropertyValidationsService implements PropertyValidationsContract
{
    /**
     * @api
     */
    public PropertyValidationsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PropertyValidationsRawService($client);
    }

    /**
     * @api
     *
     * Read all properties with validation rules for a given object.
     *
     * @param string $objectTypeID the ID of the object type for which all property validation rules are being retrieved
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $objectTypeID,
        RequestOptions|array|null $requestOptions = null
    ): CollectionResponsePublicPropertyValidationRuleMapNoPaging {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($objectTypeID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a specific validation rule for a property identified by its name and rule type.
     *
     * @param RuleType|value-of<RuleType> $ruleType path param: The type of validation rule being updated, such as FORMAT, ALPHANUMERIC, or MAX_LENGTH
     * @param string $objectTypeID path param: The ID of the object type to which the property belongs
     * @param string $propertyName path param: The name of the property for which the validation rule is being updated
     * @param list<string> $ruleArguments body param: A list of arguments that define the constraints for the validation rule
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function _crmV3PropertyValidationsObjectTypeIDPropertyNameRuleTypeRuleType(
        RuleType|string $ruleType,
        string $objectTypeID,
        string $propertyName,
        array $ruleArguments,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            [
                'objectTypeID' => $objectTypeID,
                'propertyName' => $propertyName,
                'ruleArguments' => $ruleArguments,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->_crmV3PropertyValidationsObjectTypeIDPropertyNameRuleTypeRuleType($ruleType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Read a property's validation rules identified by {propertyName}.
     *
     * @param string $propertyName the name of the property whose validation rules are being retrieved
     * @param string $objectTypeID the ID of the object type to which the property belongs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $propertyName,
        string $objectTypeID,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponsePublicPropertyValidationRuleNoPaging {
        $params = Util::removeNulls(['objectTypeID' => $objectTypeID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($propertyName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}

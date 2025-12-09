<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\PropertyValidations\CollectionResponsePublicPropertyValidationRuleMapNoPaging;
use HubspotSDK\Crm\PropertyValidations\CollectionResponsePublicPropertyValidationRuleNoPaging;
use HubspotSDK\Crm\PropertyValidations\PropertyValidationCrmV3PropertyValidationsObjectTypeIDPropertyNameRuleTypeRuleTypeParams\RuleType;
use HubspotSDK\RequestOptions;

interface PropertyValidationsContract
{
    /**
     * @api
     *
     * @param string $objectTypeID the ID of the object type for which all property validation rules are being retrieved
     *
     * @throws APIException
     */
    public function list(
        string $objectTypeID,
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePublicPropertyValidationRuleMapNoPaging;

    /**
     * @api
     *
     * @param RuleType|value-of<RuleType> $ruleType path param: The type of validation rule being updated, such as FORMAT, ALPHANUMERIC, or MAX_LENGTH
     * @param string $objectTypeID path param: The ID of the object type to which the property belongs
     * @param string $propertyName path param: The name of the property for which the validation rule is being updated
     * @param list<string> $ruleArguments body param: A list of arguments that define the constraints for the validation rule
     *
     * @throws APIException
     */
    public function crmV3PropertyValidationsObjectTypeIDPropertyNameRuleTypeRuleType(
        RuleType|string $ruleType,
        string $objectTypeID,
        string $propertyName,
        array $ruleArguments,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $propertyName the name of the property whose validation rules are being retrieved
     * @param string $objectTypeID the ID of the object type to which the property belongs
     *
     * @throws APIException
     */
    public function get(
        string $propertyName,
        string $objectTypeID,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePublicPropertyValidationRuleNoPaging;
}

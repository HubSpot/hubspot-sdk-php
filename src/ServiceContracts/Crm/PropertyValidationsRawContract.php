<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\PropertyValidations\CollectionResponsePublicPropertyValidationRuleMapNoPaging;
use HubspotSDK\Crm\PropertyValidations\CollectionResponsePublicPropertyValidationRuleNoPaging;
use HubspotSDK\Crm\PropertyValidations\PropertyValidationCrmV3PropertyValidationsObjectTypeIDPropertyNameRuleTypeRuleTypeParams;
use HubspotSDK\Crm\PropertyValidations\PropertyValidationCrmV3PropertyValidationsObjectTypeIDPropertyNameRuleTypeRuleTypeParams\RuleType;
use HubspotSDK\Crm\PropertyValidations\PropertyValidationGetParams;
use HubspotSDK\RequestOptions;

interface PropertyValidationsRawContract
{
    /**
     * @api
     *
     * @param string $objectTypeID the ID of the object type for which all property validation rules are being retrieved
     *
     * @return BaseResponse<CollectionResponsePublicPropertyValidationRuleMapNoPaging>
     *
     * @throws APIException
     */
    public function list(
        string $objectTypeID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RuleType|value-of<RuleType> $ruleType path param: The type of validation rule being updated, such as FORMAT, ALPHANUMERIC, or MAX_LENGTH
     * @param array<mixed>|PropertyValidationCrmV3PropertyValidationsObjectTypeIDPropertyNameRuleTypeRuleTypeParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function crmV3PropertyValidationsObjectTypeIDPropertyNameRuleTypeRuleType(
        RuleType|string $ruleType,
        array|PropertyValidationCrmV3PropertyValidationsObjectTypeIDPropertyNameRuleTypeRuleTypeParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $propertyName the name of the property whose validation rules are being retrieved
     * @param array<mixed>|PropertyValidationGetParams $params
     *
     * @return BaseResponse<CollectionResponsePublicPropertyValidationRuleNoPaging>
     *
     * @throws APIException
     */
    public function get(
        string $propertyName,
        array|PropertyValidationGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}

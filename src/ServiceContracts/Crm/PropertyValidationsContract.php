<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\PropertyValidations\CollectionResponsePublicPropertyValidationRuleMapNoPaging;
use HubspotSDK\Crm\PropertyValidations\CollectionResponsePublicPropertyValidationRuleNoPaging;
use HubspotSDK\Crm\PropertyValidations\PropertyValidationCrmV3PropertyValidationsObjectTypeIDPropertyNameRuleTypeRuleTypeParams;
use HubspotSDK\Crm\PropertyValidations\PropertyValidationCrmV3PropertyValidationsObjectTypeIDPropertyNameRuleTypeRuleTypeParams\RuleType;
use HubspotSDK\Crm\PropertyValidations\PropertyValidationGetParams;
use HubspotSDK\RequestOptions;

interface PropertyValidationsContract
{
    /**
     * @api
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
     * @param RuleType|value-of<RuleType> $ruleType
     * @param array<mixed>|PropertyValidationCrmV3PropertyValidationsObjectTypeIDPropertyNameRuleTypeRuleTypeParams $params
     *
     * @throws APIException
     */
    public function crmV3PropertyValidationsObjectTypeIDPropertyNameRuleTypeRuleType(
        RuleType|string $ruleType,
        array|PropertyValidationCrmV3PropertyValidationsObjectTypeIDPropertyNameRuleTypeRuleTypeParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|PropertyValidationGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $propertyName,
        array|PropertyValidationGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePublicPropertyValidationRuleNoPaging;
}

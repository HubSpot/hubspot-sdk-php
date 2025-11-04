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
     * @param string $objectTypeID
     * @param string $propertyName
     * @param list<string> $ruleArguments
     *
     * @throws APIException
     */
    public function crmV3PropertyValidationsObjectTypeIDPropertyNameRuleTypeRuleType(
        RuleType|string $ruleType,
        $objectTypeID,
        $propertyName,
        $ruleArguments,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param RuleType|value-of<RuleType> $ruleType
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function crmV3PropertyValidationsObjectTypeIDPropertyNameRuleTypeRuleTypeRaw(
        RuleType|string $ruleType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $objectTypeID
     *
     * @throws APIException
     */
    public function get(
        string $propertyName,
        $objectTypeID,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePublicPropertyValidationRuleNoPaging;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        string $propertyName,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePublicPropertyValidationRuleNoPaging;
}

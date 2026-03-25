<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\PropertiesValidations\CollectionResponsePublicPropertyValidationRuleMapNoPaging;
use HubspotSDK\Crm\PropertiesValidations\CollectionResponsePublicPropertyValidationRuleNoPaging;
use HubspotSDK\Crm\PropertiesValidations\PropertiesValidationGetByObjectTypeIDPropertyNameAndRuleTypeParams\RuleType;
use HubspotSDK\Crm\PropertiesValidations\PublicPropertyValidationRule;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface PropertiesValidationsContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getByObjectTypeID(
        string $objectTypeID,
        RequestOptions|array|null $requestOptions = null
    ): CollectionResponsePublicPropertyValidationRuleMapNoPaging;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getByObjectTypeIDAndPropertyName(
        string $propertyName,
        string $objectTypeID,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponsePublicPropertyValidationRuleNoPaging;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getByObjectTypeIDPropertyNameAndRuleType(
        RuleType|string $ruleType,
        string $objectTypeID,
        string $propertyName,
        RequestOptions|array|null $requestOptions = null,
    ): PublicPropertyValidationRule;

    /**
     * @api
     *
     * @param \HubspotSDK\Crm\PropertiesValidations\PropertiesValidationUpdateByObjectTypeIDPropertyNameAndRuleTypeParams\RuleType|string $ruleType Path param
     * @param string $objectTypeID Path param
     * @param string $propertyName Path param
     * @param list<string> $ruleArguments body param: A list of arguments that define the constraints for the validation rule
     * @param bool $shouldApplyNormalization Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateByObjectTypeIDPropertyNameAndRuleType(
        \HubspotSDK\Crm\PropertiesValidations\PropertiesValidationUpdateByObjectTypeIDPropertyNameAndRuleTypeParams\RuleType|string $ruleType,
        string $objectTypeID,
        string $propertyName,
        array $ruleArguments,
        ?bool $shouldApplyNormalization = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}

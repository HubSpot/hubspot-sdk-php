<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\PropertiesValidations\CollectionResponsePublicPropertyValidationRuleMapNoPaging;
use HubSpotSDK\Crm\PropertiesValidations\CollectionResponsePublicPropertyValidationRuleNoPaging;
use HubSpotSDK\Crm\PropertiesValidations\PropertiesValidationGetByObjectTypeIDPropertyNameAndRuleTypeParams\RuleType;
use HubSpotSDK\Crm\PropertiesValidations\PublicPropertyValidationRule;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
     * @param \HubSpotSDK\Crm\PropertiesValidations\PropertiesValidationUpdateByObjectTypeIDPropertyNameAndRuleTypeParams\RuleType|string $ruleType Path param
     * @param string $objectTypeID Path param
     * @param string $propertyName Path param
     * @param list<string> $ruleArguments body param: A list of arguments that define the constraints for the validation rule
     * @param bool $shouldApplyNormalization Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateByObjectTypeIDPropertyNameAndRuleType(
        \HubSpotSDK\Crm\PropertiesValidations\PropertiesValidationUpdateByObjectTypeIDPropertyNameAndRuleTypeParams\RuleType|string $ruleType,
        string $objectTypeID,
        string $propertyName,
        array $ruleArguments,
        ?bool $shouldApplyNormalization = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}

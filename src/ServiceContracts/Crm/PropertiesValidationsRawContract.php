<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\PropertiesValidations\CollectionResponsePublicPropertyValidationRuleMapNoPaging;
use HubspotSDK\Crm\PropertiesValidations\CollectionResponsePublicPropertyValidationRuleNoPaging;
use HubspotSDK\Crm\PropertiesValidations\PropertiesValidationGetByObjectTypeIDAndPropertyNameParams;
use HubspotSDK\Crm\PropertiesValidations\PropertiesValidationGetByObjectTypeIDPropertyNameAndRuleTypeParams;
use HubspotSDK\Crm\PropertiesValidations\PropertiesValidationGetByObjectTypeIDPropertyNameAndRuleTypeParams\RuleType;
use HubspotSDK\Crm\PropertiesValidations\PropertiesValidationUpdateByObjectTypeIDPropertyNameAndRuleTypeParams;
use HubspotSDK\Crm\PropertiesValidations\PublicPropertyValidationRule;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface PropertiesValidationsRawContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponsePublicPropertyValidationRuleMapNoPaging>
     *
     * @throws APIException
     */
    public function getByObjectTypeID(
        string $objectTypeID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PropertiesValidationGetByObjectTypeIDAndPropertyNameParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponsePublicPropertyValidationRuleNoPaging>
     *
     * @throws APIException
     */
    public function getByObjectTypeIDAndPropertyName(
        string $propertyName,
        array|PropertiesValidationGetByObjectTypeIDAndPropertyNameParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PropertiesValidationGetByObjectTypeIDPropertyNameAndRuleTypeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicPropertyValidationRule>
     *
     * @throws APIException
     */
    public function getByObjectTypeIDPropertyNameAndRuleType(
        RuleType|string $ruleType,
        array|PropertiesValidationGetByObjectTypeIDPropertyNameAndRuleTypeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param PropertiesValidationUpdateByObjectTypeIDPropertyNameAndRuleTypeParams\RuleType|string $ruleType Path param
     * @param array<string,mixed>|PropertiesValidationUpdateByObjectTypeIDPropertyNameAndRuleTypeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function updateByObjectTypeIDPropertyNameAndRuleType(
        PropertiesValidationUpdateByObjectTypeIDPropertyNameAndRuleTypeParams\RuleType|string $ruleType,
        array|PropertiesValidationUpdateByObjectTypeIDPropertyNameAndRuleTypeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}

<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\PropertyValidations\CollectionResponsePublicPropertyValidationRuleMapNoPaging;
use HubspotSDK\Crm\PropertyValidations\CollectionResponsePublicPropertyValidationRuleNoPaging;
use HubspotSDK\Crm\PropertyValidations\PropertyValidationCrmV3PropertyValidationsObjectTypeIDPropertyNameRuleTypeRuleTypeParams;
use HubspotSDK\Crm\PropertyValidations\PropertyValidationCrmV3PropertyValidationsObjectTypeIDPropertyNameRuleTypeRuleTypeParams\RuleType;
use HubspotSDK\Crm\PropertyValidations\PropertyValidationGetParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\PropertyValidationsRawContract;

final class PropertyValidationsRawService implements PropertyValidationsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Read all properties with validation rules for a given object.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/property-validations/%1$s', $objectTypeID],
            options: $requestOptions,
            convert: CollectionResponsePublicPropertyValidationRuleMapNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Update a specific validation rule for a property identified by its name and rule type.
     *
     * @param RuleType|value-of<RuleType> $ruleType path param: The type of validation rule being updated, such as FORMAT, ALPHANUMERIC, or MAX_LENGTH
     * @param array{
     *   objectTypeID: string, propertyName: string, ruleArguments: list<string>
     * }|PropertyValidationCrmV3PropertyValidationsObjectTypeIDPropertyNameRuleTypeRuleTypeParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function _crmV3PropertyValidationsObjectTypeIDPropertyNameRuleTypeRuleType(
        RuleType|string $ruleType,
        array|PropertyValidationCrmV3PropertyValidationsObjectTypeIDPropertyNameRuleTypeRuleTypeParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PropertyValidationCrmV3PropertyValidationsObjectTypeIDPropertyNameRuleTypeRuleTypeParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectTypeID = $parsed['objectTypeID'];
        unset($parsed['objectTypeID']);
        $propertyName = $parsed['propertyName'];
        unset($parsed['propertyName']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: [
                'crm/v3/property-validations/%1$s/%2$s/rule-type/%3$s',
                $objectTypeID,
                $propertyName,
                $ruleType,
            ],
            body: (object) array_diff_key(
                $parsed,
                array_flip(['objectTypeID', 'propertyName'])
            ),
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Read a property's validation rules identified by {propertyName}.
     *
     * @param string $propertyName the name of the property whose validation rules are being retrieved
     * @param array{objectTypeID: string}|PropertyValidationGetParams $params
     *
     * @return BaseResponse<CollectionResponsePublicPropertyValidationRuleNoPaging>
     *
     * @throws APIException
     */
    public function get(
        string $propertyName,
        array|PropertyValidationGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PropertyValidationGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectTypeID = $parsed['objectTypeID'];
        unset($parsed['objectTypeID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'crm/v3/property-validations/%1$s/%2$s', $objectTypeID, $propertyName,
            ],
            options: $options,
            convert: CollectionResponsePublicPropertyValidationRuleNoPaging::class,
        );
    }
}

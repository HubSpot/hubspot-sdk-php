<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\PropertiesValidations\CollectionResponsePublicPropertyValidationRuleMapNoPaging;
use HubSpotSDK\Crm\PropertiesValidations\CollectionResponsePublicPropertyValidationRuleNoPaging;
use HubSpotSDK\Crm\PropertiesValidations\PropertiesValidationGetByObjectTypeIDAndPropertyNameParams;
use HubSpotSDK\Crm\PropertiesValidations\PropertiesValidationGetByObjectTypeIDPropertyNameAndRuleTypeParams;
use HubSpotSDK\Crm\PropertiesValidations\PropertiesValidationGetByObjectTypeIDPropertyNameAndRuleTypeParams\RuleType;
use HubSpotSDK\Crm\PropertiesValidations\PropertiesValidationUpdateByObjectTypeIDPropertyNameAndRuleTypeParams;
use HubSpotSDK\Crm\PropertiesValidations\PublicPropertyValidationRule;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Crm\PropertiesValidationsRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class PropertiesValidationsRawService implements PropertiesValidationsRawContract
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponsePublicPropertyValidationRuleMapNoPaging>
     *
     * @throws APIException
     */
    public function getByObjectTypeID(
        string $objectTypeID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm/property-validations/2026-03/%1$s', $objectTypeID],
            options: $requestOptions,
            convert: CollectionResponsePublicPropertyValidationRuleMapNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Read a property's validation rules identified by {propertyName}.
     *
     * @param array{
     *   objectTypeID: string
     * }|PropertiesValidationGetByObjectTypeIDAndPropertyNameParams $params
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
    ): BaseResponse {
        [$parsed, $options] = PropertiesValidationGetByObjectTypeIDAndPropertyNameParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectTypeID = $parsed['objectTypeID'];
        unset($parsed['objectTypeID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'crm/property-validations/2026-03/%1$s/%2$s',
                $objectTypeID,
                $propertyName,
            ],
            options: $options,
            convert: CollectionResponsePublicPropertyValidationRuleNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a specific validation rule for a property identified by its name and rule type.
     *
     * @param RuleType|value-of<RuleType> $ruleType
     * @param array{
     *   objectTypeID: string, propertyName: string
     * }|PropertiesValidationGetByObjectTypeIDPropertyNameAndRuleTypeParams $params
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
    ): BaseResponse {
        [$parsed, $options] = PropertiesValidationGetByObjectTypeIDPropertyNameAndRuleTypeParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectTypeID = $parsed['objectTypeID'];
        unset($parsed['objectTypeID']);
        $propertyName = $parsed['propertyName'];
        unset($parsed['propertyName']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'crm/property-validations/2026-03/%1$s/%2$s/rule-type/%3$s',
                $objectTypeID,
                $propertyName,
                $ruleType,
            ],
            options: $options,
            convert: PublicPropertyValidationRule::class,
        );
    }

    /**
     * @api
     *
     * Update a specific validation rule for a property identified by its name and rule type.
     *
     * @param PropertiesValidationUpdateByObjectTypeIDPropertyNameAndRuleTypeParams\RuleType|value-of<PropertiesValidationUpdateByObjectTypeIDPropertyNameAndRuleTypeParams\RuleType> $ruleType Path param
     * @param array{
     *   objectTypeID: string,
     *   propertyName: string,
     *   ruleArguments: list<string>,
     *   shouldApplyNormalization?: bool,
     * }|PropertiesValidationUpdateByObjectTypeIDPropertyNameAndRuleTypeParams $params
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
    ): BaseResponse {
        [$parsed, $options] = PropertiesValidationUpdateByObjectTypeIDPropertyNameAndRuleTypeParams::parseRequest(
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
                'crm/property-validations/2026-03/%1$s/%2$s/rule-type/%3$s',
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
}

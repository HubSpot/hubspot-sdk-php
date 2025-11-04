<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\PropertyValidations\CollectionResponsePublicPropertyValidationRuleMapNoPaging;
use HubspotSDK\Crm\PropertyValidations\CollectionResponsePublicPropertyValidationRuleNoPaging;
use HubspotSDK\Crm\PropertyValidations\PropertyValidationCrmV3PropertyValidationsObjectTypeIDPropertyNameRuleTypeRuleTypeParams;
use HubspotSDK\Crm\PropertyValidations\PropertyValidationCrmV3PropertyValidationsObjectTypeIDPropertyNameRuleTypeRuleTypeParams\RuleType;
use HubspotSDK\Crm\PropertyValidations\PropertyValidationGetParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\PropertyValidationsContract;

final class PropertyValidationsService implements PropertyValidationsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Read all properties with validation rules for a given object.
     *
     * @throws APIException
     */
    public function list(
        string $objectTypeID,
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePublicPropertyValidationRuleMapNoPaging {
        // @phpstan-ignore-next-line;
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
    ): mixed {
        $params = [
            'objectTypeID' => $objectTypeID,
            'propertyName' => $propertyName,
            'ruleArguments' => $ruleArguments,
        ];

        return $this->crmV3PropertyValidationsObjectTypeIDPropertyNameRuleTypeRuleTypeRaw(
            $ruleType,
            $params,
            $requestOptions
        );
    }

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
    ): mixed {
        [
            $parsed, $options,
        ] = PropertyValidationCrmV3PropertyValidationsObjectTypeIDPropertyNameRuleTypeRuleTypeParams::parseRequest(
            $params,
            $requestOptions
        );
        $objectTypeID = $parsed['objectTypeID'];
        unset($parsed['objectTypeID']);
        $propertyName = $parsed['propertyName'];
        unset($parsed['propertyName']);

        // @phpstan-ignore-next-line;
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
     * @param string $objectTypeID
     *
     * @throws APIException
     */
    public function get(
        string $propertyName,
        $objectTypeID,
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePublicPropertyValidationRuleNoPaging {
        $params = ['objectTypeID' => $objectTypeID];

        return $this->getRaw($propertyName, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePublicPropertyValidationRuleNoPaging {
        [$parsed, $options] = PropertyValidationGetParams::parseRequest(
            $params,
            $requestOptions
        );
        $objectTypeID = $parsed['objectTypeID'];
        unset($parsed['objectTypeID']);

        // @phpstan-ignore-next-line;
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

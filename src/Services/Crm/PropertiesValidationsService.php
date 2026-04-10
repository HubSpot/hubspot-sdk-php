<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Crm\PropertiesValidations\CollectionResponsePublicPropertyValidationRuleMapNoPaging;
use HubSpotSDK\Crm\PropertiesValidations\CollectionResponsePublicPropertyValidationRuleNoPaging;
use HubSpotSDK\Crm\PropertiesValidations\PropertiesValidationGetByObjectTypeIDPropertyNameAndRuleTypeParams\RuleType;
use HubSpotSDK\Crm\PropertiesValidations\PublicPropertyValidationRule;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Crm\PropertiesValidationsContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class PropertiesValidationsService implements PropertiesValidationsContract
{
    /**
     * @api
     */
    public PropertiesValidationsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PropertiesValidationsRawService($client);
    }

    /**
     * @api
     *
     * Read all properties with validation rules for a given object.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getByObjectTypeID(
        string $objectTypeID,
        RequestOptions|array|null $requestOptions = null
    ): CollectionResponsePublicPropertyValidationRuleMapNoPaging {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getByObjectTypeID($objectTypeID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Read a property's validation rules identified by {propertyName}.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getByObjectTypeIDAndPropertyName(
        string $propertyName,
        string $objectTypeID,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponsePublicPropertyValidationRuleNoPaging {
        $params = Util::removeNulls(['objectTypeID' => $objectTypeID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getByObjectTypeIDAndPropertyName($propertyName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a specific validation rule for a property identified by its name and rule type.
     *
     * @param RuleType|value-of<RuleType> $ruleType
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getByObjectTypeIDPropertyNameAndRuleType(
        RuleType|string $ruleType,
        string $objectTypeID,
        string $propertyName,
        RequestOptions|array|null $requestOptions = null,
    ): PublicPropertyValidationRule {
        $params = Util::removeNulls(
            ['objectTypeID' => $objectTypeID, 'propertyName' => $propertyName]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getByObjectTypeIDPropertyNameAndRuleType($ruleType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a specific validation rule for a property identified by its name and rule type.
     *
     * @param \HubSpotSDK\Crm\PropertiesValidations\PropertiesValidationUpdateByObjectTypeIDPropertyNameAndRuleTypeParams\RuleType|value-of<\HubSpotSDK\Crm\PropertiesValidations\PropertiesValidationUpdateByObjectTypeIDPropertyNameAndRuleTypeParams\RuleType> $ruleType Path param
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
    ): mixed {
        $params = Util::removeNulls(
            [
                'objectTypeID' => $objectTypeID,
                'propertyName' => $propertyName,
                'ruleArguments' => $ruleArguments,
                'shouldApplyNormalization' => $shouldApplyNormalization,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateByObjectTypeIDPropertyNameAndRuleType($ruleType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}

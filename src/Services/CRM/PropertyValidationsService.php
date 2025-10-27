<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\PropertyValidations\CollectionResponsePublicPropertyValidationRuleMapNoPaging;
use HubspotSDK\CRM\PropertyValidations\CollectionResponsePublicPropertyValidationRuleNoPaging;
use HubspotSDK\CRM\PropertyValidations\PropertyValidationGetParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CRM\PropertyValidationsContract;

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

<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Associations\Schema\V4;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Associations\Schema\V4\CollectionResponseAssociationSpecWithLabel;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Associations\Schema\V4\DefinitionsContract;

final class DefinitionsService implements DefinitionsContract
{
    /**
     * @api
     */
    public DefinitionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new DefinitionsRawService($client);
    }

    /**
     * @api
     *
     * @param string $toObjectType Path param:
     * @param string $fromObjectType Path param:
     * @param string $label Body param:
     * @param string $name Body param:
     * @param string $inverseLabel Body param:
     *
     * @throws APIException
     */
    public function createLabel(
        string $toObjectType,
        string $fromObjectType,
        string $label,
        string $name,
        ?string $inverseLabel = null,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseAssociationSpecWithLabel {
        $params = [
            'fromObjectType' => $fromObjectType,
            'label' => $label,
            'name' => $name,
            'inverseLabel' => $inverseLabel,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createLabel($toObjectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteLabel(
        int $associationTypeID,
        string $fromObjectType,
        string $toObjectType,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = [
            'fromObjectType' => $fromObjectType, 'toObjectType' => $toObjectType,
        ];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteLabel($associationTypeID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function listLabels(
        string $toObjectType,
        string $fromObjectType,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseAssociationSpecWithLabel {
        $params = ['fromObjectType' => $fromObjectType];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listLabels($toObjectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $toObjectType Path param:
     * @param string $fromObjectType Path param:
     * @param int $associationTypeID Body param:
     * @param string $label Body param:
     * @param string $inverseLabel Body param:
     *
     * @throws APIException
     */
    public function updateLabel(
        string $toObjectType,
        string $fromObjectType,
        int $associationTypeID,
        string $label,
        ?string $inverseLabel = null,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = [
            'fromObjectType' => $fromObjectType,
            'associationTypeID' => $associationTypeID,
            'label' => $label,
            'inverseLabel' => $inverseLabel,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateLabel($toObjectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}

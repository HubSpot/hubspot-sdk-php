<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM\Associations;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Associations\Schema\CollectionResponsePublicAssociationDefinitionNoPaging;
use HubspotSDK\CRM\Associations\Schema\SchemaListParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CRM\Associations\SchemaContract;
use HubspotSDK\Services\CRM\Associations\Schema\V4Service;

final class SchemaService implements SchemaContract
{
    /**
     * @@api
     */
    public V4Service $v4;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->v4 = new V4Service($client);
    }

    /**
     * @api
     *
     * List all the valid association types available between two object types
     *
     * @param string $fromObjectType
     *
     * @throws APIException
     */
    public function list(
        string $toObjectType,
        $fromObjectType,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePublicAssociationDefinitionNoPaging {
        $params = ['fromObjectType' => $fromObjectType];

        return $this->listRaw($toObjectType, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePublicAssociationDefinitionNoPaging {
        [$parsed, $options] = SchemaListParams::parseRequest(
            $params,
            $requestOptions
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'crm/v3/associations/%1$s/%2$s/types', $fromObjectType, $toObjectType,
            ],
            options: $options,
            convert: CollectionResponsePublicAssociationDefinitionNoPaging::class,
        );
    }
}

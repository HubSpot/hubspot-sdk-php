<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Associations;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Associations\Schema\CollectionResponsePublicAssociationDefinitionNoPaging;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Associations\SchemaContract;
use HubspotSDK\Services\Crm\Associations\Schema\V4Service;

final class SchemaService implements SchemaContract
{
    /**
     * @api
     */
    public SchemaRawService $raw;

    /**
     * @api
     */
    public V4Service $v4;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SchemaRawService($client);
        $this->v4 = new V4Service($client);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        string $toObjectType,
        string $fromObjectType,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePublicAssociationDefinitionNoPaging {
        $params = Util::removeNulls(['fromObjectType' => $fromObjectType]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($toObjectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}

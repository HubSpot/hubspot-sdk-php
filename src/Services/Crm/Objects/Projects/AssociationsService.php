<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Objects\Projects;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\AssociatedID;
use HubspotSDK\Crm\Objects\Projects\Associations\AssociationDeleteParams;
use HubspotSDK\Crm\Objects\Projects\Associations\AssociationListParams;
use HubspotSDK\Crm\Objects\Projects\Associations\AssociationUpdateParams;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Objects\Projects\AssociationsContract;

final class AssociationsService implements AssociationsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param array{
     *   projectId: string, toObjectType: string, toObjectId: string
     * }|AssociationUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $associationType,
        array|AssociationUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations {
        [$parsed, $options] = AssociationUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $projectID = $parsed['projectId'];
        unset($parsed['projectId']);
        $toObjectType = $parsed['toObjectType'];
        unset($parsed['toObjectType']);
        $toObjectID = $parsed['toObjectId'];
        unset($parsed['toObjectId']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: [
                'crm/objects/v3/projects/%1$s/associations/%2$s/%3$s/%4$s',
                $projectID,
                $toObjectType,
                $toObjectID,
                $associationType,
            ],
            options: $options,
            convert: SimplePublicObjectWithAssociations::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   projectId: string, after?: string, includeFA?: bool, limit?: int
     * }|AssociationListParams $params
     *
     * @return Page<AssociatedID>
     *
     * @throws APIException
     */
    public function list(
        string $toObjectType,
        array|AssociationListParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page {
        [$parsed, $options] = AssociationListParams::parseRequest(
            $params,
            $requestOptions,
        );
        $projectID = $parsed['projectId'];
        unset($parsed['projectId']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'crm/objects/v3/projects/%1$s/associations/%2$s',
                $projectID,
                $toObjectType,
            ],
            query: $parsed,
            options: $options,
            convert: AssociatedID::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   projectId: string, toObjectType: string, toObjectId: string
     * }|AssociationDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $associationType,
        array|AssociationDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = AssociationDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $projectID = $parsed['projectId'];
        unset($parsed['projectId']);
        $toObjectType = $parsed['toObjectType'];
        unset($parsed['toObjectType']);
        $toObjectID = $parsed['toObjectId'];
        unset($parsed['toObjectId']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: [
                'crm/objects/v3/projects/%1$s/associations/%2$s/%3$s/%4$s',
                $projectID,
                $toObjectType,
                $toObjectID,
                $associationType,
            ],
            options: $options,
            convert: null,
        );
    }
}

<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Objects\Projects;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\AssociatedID;
use HubspotSDK\Crm\Objects\Projects\Associations\AssociationDeleteParams;
use HubspotSDK\Crm\Objects\Projects\Associations\AssociationListParams;
use HubspotSDK\Crm\Objects\Projects\Associations\AssociationUpdateParams;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Objects\Projects\AssociationsRawContract;

final class AssociationsRawService implements AssociationsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param array{
     *   projectID: string, toObjectType: string, toObjectID: string
     * }|AssociationUpdateParams $params
     *
     * @return BaseResponse<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function update(
        string $associationType,
        array|AssociationUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AssociationUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $projectID = $parsed['projectID'];
        unset($parsed['projectID']);
        $toObjectType = $parsed['toObjectType'];
        unset($parsed['toObjectType']);
        $toObjectID = $parsed['toObjectID'];
        unset($parsed['toObjectID']);

        // @phpstan-ignore-next-line return.type
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
     * @param string $toObjectType Path param:
     * @param array{
     *   projectID: string, after?: string, includeFa?: bool, limit?: int
     * }|AssociationListParams $params
     *
     * @return BaseResponse<Page<AssociatedID>>
     *
     * @throws APIException
     */
    public function list(
        string $toObjectType,
        array|AssociationListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AssociationListParams::parseRequest(
            $params,
            $requestOptions,
        );
        $projectID = $parsed['projectID'];
        unset($parsed['projectID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'crm/objects/v3/projects/%1$s/associations/%2$s',
                $projectID,
                $toObjectType,
            ],
            query: Util::array_transform_keys($parsed, ['includeFa' => 'includeFA']),
            options: $options,
            convert: AssociatedID::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   projectID: string, toObjectType: string, toObjectID: string
     * }|AssociationDeleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $associationType,
        array|AssociationDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AssociationDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $projectID = $parsed['projectID'];
        unset($parsed['projectID']);
        $toObjectType = $parsed['toObjectType'];
        unset($parsed['toObjectType']);
        $toObjectID = $parsed['toObjectID'];
        unset($parsed['toObjectID']);

        // @phpstan-ignore-next-line return.type
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

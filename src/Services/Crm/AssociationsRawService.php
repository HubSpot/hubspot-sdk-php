<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Associations\AssociationDeleteAssociationsParams;
use HubspotSDK\Crm\Associations\AssociationUpdateAssociationLabelsParams;
use HubspotSDK\Crm\Associations\ReportCreationResponse;
use HubspotSDK\Crm\LabelsBetweenObjectPair;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\AssociationsRawContract;

/**
 * @phpstan-import-type AssociationSpecShape from \HubspotSDK\AssociationSpec
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
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
     *   objectType: string, objectID: string, toObjectType: string
     * }|AssociationDeleteAssociationsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteAssociations(
        string $toObjectID,
        array|AssociationDeleteAssociationsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AssociationDeleteAssociationsParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);
        $toObjectType = $parsed['toObjectType'];
        unset($parsed['toObjectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'crm/objects/2026-03/%1$s/%2$s/associations/%3$s/%4$s',
                $objectType,
                $objectID,
                $toObjectType,
                $toObjectID,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Requests a report of all objects in the portal which have a high usage of associations
     *
     * @param int $userID The user for the report
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ReportCreationResponse>
     *
     * @throws APIException
     */
    public function requestHighUsageReport(
        int $userID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['crm/associations/2026-03/usage/high-usage-report/%1$s', $userID],
            options: $requestOptions,
            convert: ReportCreationResponse::class,
        );
    }

    /**
     * @api
     *
     * @param string $toObjectID Path param
     * @param array{
     *   objectType: string,
     *   objectID: string,
     *   toObjectType: string,
     *   body: list<AssociationSpec|AssociationSpecShape>,
     * }|AssociationUpdateAssociationLabelsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<LabelsBetweenObjectPair>
     *
     * @throws APIException
     */
    public function updateAssociationLabels(
        string $toObjectID,
        array|AssociationUpdateAssociationLabelsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AssociationUpdateAssociationLabelsParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);
        $toObjectType = $parsed['toObjectType'];
        unset($parsed['toObjectType']);

        /** @var array<string,mixed> */
        $body = $parsed['body'];

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: [
                'crm/objects/2026-03/%1$s/%2$s/associations/%3$s/%4$s',
                $objectType,
                $objectID,
                $toObjectType,
                $toObjectID,
            ],
            body: array_diff_key(
                $body,
                array_flip(['objectType', 'objectID', 'toObjectType'])
            ),
            options: $options,
            convert: LabelsBetweenObjectPair::class,
        );
    }
}

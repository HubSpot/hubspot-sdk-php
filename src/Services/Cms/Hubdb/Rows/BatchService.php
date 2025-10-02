<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Hubdb\Rows;

use HubspotSDK\Client;
use HubspotSDK\Cms\Hubdb\CmsHubdbBatchResponseHubDBTableRowV3;
use HubspotSDK\Cms\Hubdb\CmsHubdbHubDBTableRowV3BatchUpdateRequest;
use HubspotSDK\Cms\Hubdb\Rows\Batch\BatchReplaceParams;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Implementation\HasRawResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Hubdb\Rows\BatchContract;

final class BatchService implements BatchContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Replace rows in batch in draft table
     *
     * @param list<CmsHubdbHubDBTableRowV3BatchUpdateRequest> $inputs
     *
     * @return CmsHubdbBatchResponseHubDBTableRowV3<HasRawResponse>
     *
     * @throws APIException
     */
    public function replace(
        string $tableIDOrName,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): CmsHubdbBatchResponseHubDBTableRowV3 {
        $params = ['inputs' => $inputs];

        return $this->replaceRaw($tableIDOrName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CmsHubdbBatchResponseHubDBTableRowV3<HasRawResponse>
     *
     * @throws APIException
     */
    public function replaceRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CmsHubdbBatchResponseHubDBTableRowV3 {
        [$parsed, $options] = BatchReplaceParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'cms/v3/hubdb/tables/%1$s/rows/draft/batch/replace', $tableIDOrName,
            ],
            body: (object) $parsed,
            options: $options,
            convert: CmsHubdbBatchResponseHubDBTableRowV3::class,
        );
    }
}

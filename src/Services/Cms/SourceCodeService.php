<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Cms;

use HubSpotSDK\ActionResponse;
use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Cms\SourceCodeContract;
use HubSpotSDK\TaskLocator;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class SourceCodeService implements SourceCodeContract
{
    /**
     * @api
     */
    public SourceCodeRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SourceCodeRawService($client);
    }

    /**
     * @api
     *
     * Extract a zip file in the developer file system. Extraction status can be checked with the `/extract/async/tasks/taskId/status` endpoint below.
     *
     * @param string $path the file system location where the zip file is to be extracted
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function extractAsync(
        string $path,
        RequestOptions|array|null $requestOptions = null
    ): TaskLocator {
        $params = Util::removeNulls(['path' => $path]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->extractAsync(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the status of an extraction by the `taskId` returned from the initial `extract/async` request.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getExtractionStatus(
        int $taskID,
        RequestOptions|array|null $requestOptions = null
    ): ActionResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getExtractionStatus($taskID, requestOptions: $requestOptions);

        return $response->parse();
    }
}

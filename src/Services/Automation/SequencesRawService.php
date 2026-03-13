<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Automation;

use HubspotSDK\Automation\Sequences\PublicSequenceLiteResponse;
use HubspotSDK\Automation\Sequences\PublicSequenceResponse;
use HubspotSDK\Automation\Sequences\SequenceGetParams;
use HubspotSDK\Automation\Sequences\SequenceListParams;
use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Automation\SequencesRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class SequencesRawService implements SequencesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a list of sequences that belong to a specific user.
     *
     * @param array{
     *   userID: string, after?: string, limit?: int, name?: string
     * }|SequenceListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<PublicSequenceLiteResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|SequenceListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SequenceListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'automation/v4/sequences/',
            query: Util::array_transform_keys($parsed, ['userID' => 'userId']),
            options: $options,
            convert: PublicSequenceLiteResponse::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Retrieve details of a specific sequence by its ID.
     *
     * @param array{userID: string}|SequenceGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicSequenceResponse>
     *
     * @throws APIException
     */
    public function get(
        string $sequenceID,
        array|SequenceGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SequenceGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['automation/v4/sequences/%1$s', $sequenceID],
            query: Util::array_transform_keys($parsed, ['userID' => 'userId']),
            options: $options,
            convert: PublicSequenceResponse::class,
        );
    }
}

<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms;

use HubspotSDK\Client;
use HubspotSDK\Cms\AuditLogs\AuditLogListParams;
use HubspotSDK\Cms\AuditLogs\PublicAuditLog;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\AuditLogsContract;

final class AuditLogsService implements AuditLogsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns audit logs based on filters.
     *
     * @param array{
     *   after?: string,
     *   before?: string,
     *   eventType?: list<string>,
     *   limit?: int,
     *   objectID?: list<string>,
     *   objectType?: list<string>,
     *   sort?: list<string>,
     *   userID?: list<string>,
     * }|AuditLogListParams $params
     *
     * @return Page<PublicAuditLog>
     *
     * @throws APIException
     */
    public function list(
        array|AuditLogListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = AuditLogListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<Page<PublicAuditLog>> */
        $response = $this->client->request(
            method: 'get',
            path: 'cms/v3/audit-logs/',
            query: Util::array_transform_keys(
                $parsed,
                ['objectID' => 'objectId', 'userID' => 'userId']
            ),
            options: $options,
            convert: PublicAuditLog::class,
            page: Page::class,
        );

        return $response->parse();
    }
}

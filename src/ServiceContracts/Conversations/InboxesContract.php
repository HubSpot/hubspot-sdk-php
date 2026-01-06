<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations;

use HubspotSDK\Conversations\PublicInbox;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface InboxesContract
{
    /**
     * @api
     *
     * @param list<string> $sort
     *
     * @return Page<PublicInbox>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        ?bool $archived = null,
        ?int $defaultPageLength = null,
        ?int $limit = null,
        ?array $sort = null,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        int $inboxID,
        bool $archived = false,
        ?RequestOptions $requestOptions = null,
    ): PublicInbox;
}

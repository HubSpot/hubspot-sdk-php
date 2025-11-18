<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations;

use HubspotSDK\Conversations\Inboxes\InboxGetParams;
use HubspotSDK\Conversations\Inboxes\InboxListParams;
use HubspotSDK\Conversations\PublicInbox;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface InboxesContract
{
    /**
     * @api
     *
     * @param array<mixed>|InboxListParams $params
     *
     * @return Page<PublicInbox>
     *
     * @throws APIException
     */
    public function list(
        array|InboxListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|InboxGetParams $params
     *
     * @throws APIException
     */
    public function get(
        int $inboxID,
        array|InboxGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicInbox;
}

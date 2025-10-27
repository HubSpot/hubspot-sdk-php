<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations;

use HubspotSDK\Conversations\CollectionResponseWithTotalPublicInboxForwardPaging;
use HubspotSDK\Conversations\PublicInbox;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface InboxesContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalPublicInboxForwardPaging;

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        string $inboxID,
        ?RequestOptions $requestOptions = null
    ): PublicInbox;
}

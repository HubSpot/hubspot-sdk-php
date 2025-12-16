<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations;

use HubspotSDK\Conversations\Inboxes\InboxGetParams;
use HubspotSDK\Conversations\Inboxes\InboxListParams;
use HubspotSDK\Conversations\PublicInbox;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface InboxesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|InboxListParams $params
     *
     * @return BaseResponse<Page<PublicInbox>>
     *
     * @throws APIException
     */
    public function list(
        array|InboxListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|InboxGetParams $params
     *
     * @return BaseResponse<PublicInbox>
     *
     * @throws APIException
     */
    public function get(
        int $inboxID,
        array|InboxGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}

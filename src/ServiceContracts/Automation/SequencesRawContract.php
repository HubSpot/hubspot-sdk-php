<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Automation;

use HubspotSDK\Automation\Sequences\PublicSequenceLiteResponse;
use HubspotSDK\Automation\Sequences\PublicSequenceResponse;
use HubspotSDK\Automation\Sequences\SequenceGetParams;
use HubspotSDK\Automation\Sequences\SequenceListParams;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface SequencesRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|SequenceListParams $params
     *
     * @return BaseResponse<Page<PublicSequenceLiteResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|SequenceListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|SequenceGetParams $params
     *
     * @return BaseResponse<PublicSequenceResponse>
     *
     * @throws APIException
     */
    public function get(
        string $sequenceID,
        array|SequenceGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}

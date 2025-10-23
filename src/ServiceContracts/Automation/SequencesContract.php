<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Automation;

use HubspotSDK\Automation\Sequences\CollectionResponseWithTotalPublicSequenceLiteResponseForwardPaging;
use HubspotSDK\Automation\Sequences\PublicSequenceResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface SequencesContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalPublicSequenceLiteResponseForwardPaging;

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        string $sequenceID,
        ?RequestOptions $requestOptions = null
    ): PublicSequenceResponse;
}

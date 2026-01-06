<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Automation;

use HubspotSDK\Automation\Sequences\PublicSequenceLiteResponse;
use HubspotSDK\Automation\Sequences\PublicSequenceResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface SequencesContract
{
    /**
     * @api
     *
     * @return Page<PublicSequenceLiteResponse>
     *
     * @throws APIException
     */
    public function list(
        string $userID,
        ?string $after = null,
        ?int $limit = null,
        ?string $name = null,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        string $sequenceID,
        string $userID,
        ?RequestOptions $requestOptions = null
    ): PublicSequenceResponse;
}

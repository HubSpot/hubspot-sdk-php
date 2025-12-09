<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations;

use HubspotSDK\Conversations\VisitorIdentification\IdentificationTokenResponse;
use HubspotSDK\Conversations\VisitorIdentification\VisitorIdentificationGenerateTokenParams;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface VisitorIdentificationRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|VisitorIdentificationGenerateTokenParams $params
     *
     * @return BaseResponse<IdentificationTokenResponse>
     *
     * @throws APIException
     */
    public function generateToken(
        array|VisitorIdentificationGenerateTokenParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}

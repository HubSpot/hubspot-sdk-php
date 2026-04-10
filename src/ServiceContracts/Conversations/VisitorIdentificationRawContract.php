<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Conversations;

use HubSpotSDK\Conversations\VisitorIdentification\IdentificationTokenResponse;
use HubSpotSDK\Conversations\VisitorIdentification\VisitorIdentificationGenerateTokenParams;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface VisitorIdentificationRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|VisitorIdentificationGenerateTokenParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<IdentificationTokenResponse>
     *
     * @throws APIException
     */
    public function generateToken(
        array|VisitorIdentificationGenerateTokenParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}

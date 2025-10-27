<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\VisitorIdentification;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * The identification token to be passed to the Conversations JS API to identify the visitor.
 *
 * @phpstan-type identification_token_response = array{token: string}
 */
final class IdentificationTokenResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<identification_token_response> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public string $token;

    /**
     * `new IdentificationTokenResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IdentificationTokenResponse::with(token: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IdentificationTokenResponse)->withToken(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $token): self
    {
        $obj = new self;

        $obj->token = $token;

        return $obj;
    }

    public function withToken(string $token): self
    {
        $obj = clone $this;
        $obj->token = $token;

        return $obj;
    }
}

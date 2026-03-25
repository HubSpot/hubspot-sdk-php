<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\VisitorIdentification;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type IdentificationTokenResponseShape = array{token: string}
 */
final class IdentificationTokenResponse implements BaseModel
{
    /** @use SdkModel<IdentificationTokenResponseShape> */
    use SdkModel;

    /**
     * An identification token that allows the visitor to be treated as a known contact.
     */
    #[Required]
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
        $self = new self;

        $self['token'] = $token;

        return $self;
    }

    /**
     * An identification token that allows the visitor to be treated as a known contact.
     */
    public function withToken(string $token): self
    {
        $self = clone $this;
        $self['token'] = $token;

        return $self;
    }
}

<?php

declare(strict_types=1);

namespace HubSpotSDK\Auth\OAuth;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Returns validity and metadata for access and refresh tokens.
 *
 * @see HubSpotSDK\Services\Auth\OAuthService::introspectToken()
 *
 * @phpstan-type OAuthIntrospectTokenParamsShape = array{
 *   token?: string|null,
 *   clientID?: string|null,
 *   clientSecret?: string|null,
 *   tokenTypeHint?: string|null,
 * }
 */
final class OAuthIntrospectTokenParams implements BaseModel
{
    /** @use SdkModel<OAuthIntrospectTokenParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $token;

    #[Optional('client_id')]
    public ?string $clientID;

    #[Optional('client_secret')]
    public ?string $clientSecret;

    #[Optional('token_type_hint')]
    public ?string $tokenTypeHint;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $token = null,
        ?string $clientID = null,
        ?string $clientSecret = null,
        ?string $tokenTypeHint = null,
    ): self {
        $self = new self;

        null !== $token && $self['token'] = $token;
        null !== $clientID && $self['clientID'] = $clientID;
        null !== $clientSecret && $self['clientSecret'] = $clientSecret;
        null !== $tokenTypeHint && $self['tokenTypeHint'] = $tokenTypeHint;

        return $self;
    }

    public function withToken(string $token): self
    {
        $self = clone $this;
        $self['token'] = $token;

        return $self;
    }

    public function withClientID(string $clientID): self
    {
        $self = clone $this;
        $self['clientID'] = $clientID;

        return $self;
    }

    public function withClientSecret(string $clientSecret): self
    {
        $self = clone $this;
        $self['clientSecret'] = $clientSecret;

        return $self;
    }

    public function withTokenTypeHint(string $tokenTypeHint): self
    {
        $self = clone $this;
        $self['tokenTypeHint'] = $tokenTypeHint;

        return $self;
    }
}

<?php

declare(strict_types=1);

namespace HubspotSDK\Auth\OAuth;

use HubspotSDK\Auth\OAuth\OAuthCreateAccessTokenParams\GrantType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Use a [previously obtained refresh token](#get-oauth-2.0-access-and-refresh-tokens) to generate a new access token.
 *
 * Access tokens are short lived. You can check the `expires_in` parameter when generating an access token to determine its lifetime (in seconds). If you need offline access to HubSpot data, store the refresh token you get when [initiating your OAuth integration](https://developers.hubspot.com/docs/guides/api/app-management/oauth-tokens#initiating-oauth-access) and use it to generate a new access token once the initial one expires.
 *
 * Note: HubSpot access tokens will fluctuate in size as the information that's encoded in them changes over time. It's recommended to allow for tokens to be up to 300 characters to account for any potential changes.
 *
 * @see HubspotSDK\Services\Auth\OAuthService::createAccessToken()
 *
 * @phpstan-type OAuthCreateAccessTokenParamsShape = array{
 *   client_secret?: string,
 *   refresh_token?: string,
 *   client_id?: string,
 *   code?: string,
 *   code_verifier?: string,
 *   grant_type?: GrantType|value-of<GrantType>,
 *   redirect_uri?: string,
 *   scope?: string,
 * }
 */
final class OAuthCreateAccessTokenParams implements BaseModel
{
    /** @use SdkModel<OAuthCreateAccessTokenParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?string $client_secret;

    #[Api(optional: true)]
    public ?string $refresh_token;

    #[Api(optional: true)]
    public ?string $client_id;

    #[Api(optional: true)]
    public ?string $code;

    #[Api(optional: true)]
    public ?string $code_verifier;

    /** @var value-of<GrantType>|null $grant_type */
    #[Api(enum: GrantType::class, optional: true)]
    public ?string $grant_type;

    #[Api(optional: true)]
    public ?string $redirect_uri;

    #[Api(optional: true)]
    public ?string $scope;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param GrantType|value-of<GrantType> $grant_type
     */
    public static function with(
        ?string $client_secret = null,
        ?string $refresh_token = null,
        ?string $client_id = null,
        ?string $code = null,
        ?string $code_verifier = null,
        GrantType|string|null $grant_type = null,
        ?string $redirect_uri = null,
        ?string $scope = null,
    ): self {
        $obj = new self;

        null !== $client_secret && $obj->client_secret = $client_secret;
        null !== $refresh_token && $obj->refresh_token = $refresh_token;
        null !== $client_id && $obj->client_id = $client_id;
        null !== $code && $obj->code = $code;
        null !== $code_verifier && $obj->code_verifier = $code_verifier;
        null !== $grant_type && $obj['grant_type'] = $grant_type;
        null !== $redirect_uri && $obj->redirect_uri = $redirect_uri;
        null !== $scope && $obj->scope = $scope;

        return $obj;
    }

    public function withClientSecret(string $clientSecret): self
    {
        $obj = clone $this;
        $obj->client_secret = $clientSecret;

        return $obj;
    }

    public function withRefreshToken(string $refreshToken): self
    {
        $obj = clone $this;
        $obj->refresh_token = $refreshToken;

        return $obj;
    }

    public function withClientID(string $clientID): self
    {
        $obj = clone $this;
        $obj->client_id = $clientID;

        return $obj;
    }

    public function withCode(string $code): self
    {
        $obj = clone $this;
        $obj->code = $code;

        return $obj;
    }

    public function withCodeVerifier(string $codeVerifier): self
    {
        $obj = clone $this;
        $obj->code_verifier = $codeVerifier;

        return $obj;
    }

    /**
     * @param GrantType|value-of<GrantType> $grantType
     */
    public function withGrantType(GrantType|string $grantType): self
    {
        $obj = clone $this;
        $obj['grant_type'] = $grantType;

        return $obj;
    }

    public function withRedirectUri(string $redirectUri): self
    {
        $obj = clone $this;
        $obj->redirect_uri = $redirectUri;

        return $obj;
    }

    public function withScope(string $scope): self
    {
        $obj = clone $this;
        $obj->scope = $scope;

        return $obj;
    }
}

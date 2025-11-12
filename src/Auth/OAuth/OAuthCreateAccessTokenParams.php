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
 * @see HubspotSDK\Auth\OAuth->createAccessToken
 *
 * @phpstan-type OAuthCreateAccessTokenParamsShape = array{
 *   client_id?: string,
 *   client_secret?: string,
 *   code?: string,
 *   grant_type?: GrantType|value-of<GrantType>,
 *   redirect_uri?: string,
 *   refresh_token?: string,
 * }
 */
final class OAuthCreateAccessTokenParams implements BaseModel
{
    /** @use SdkModel<OAuthCreateAccessTokenParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?string $client_id;

    #[Api(optional: true)]
    public ?string $client_secret;

    #[Api(optional: true)]
    public ?string $code;

    /** @var value-of<GrantType>|null $grant_type */
    #[Api(enum: GrantType::class, optional: true)]
    public ?string $grant_type;

    #[Api(optional: true)]
    public ?string $redirect_uri;

    #[Api(optional: true)]
    public ?string $refresh_token;

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
        ?string $client_id = null,
        ?string $client_secret = null,
        ?string $code = null,
        GrantType|string|null $grant_type = null,
        ?string $redirect_uri = null,
        ?string $refresh_token = null,
    ): self {
        $obj = new self;

        null !== $client_id && $obj->client_id = $client_id;
        null !== $client_secret && $obj->client_secret = $client_secret;
        null !== $code && $obj->code = $code;
        null !== $grant_type && $obj['grant_type'] = $grant_type;
        null !== $redirect_uri && $obj->redirect_uri = $redirect_uri;
        null !== $refresh_token && $obj->refresh_token = $refresh_token;

        return $obj;
    }

    public function withClientID(string $clientID): self
    {
        $obj = clone $this;
        $obj->client_id = $clientID;

        return $obj;
    }

    public function withClientSecret(string $clientSecret): self
    {
        $obj = clone $this;
        $obj->client_secret = $clientSecret;

        return $obj;
    }

    public function withCode(string $code): self
    {
        $obj = clone $this;
        $obj->code = $code;

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

    public function withRefreshToken(string $refreshToken): self
    {
        $obj = clone $this;
        $obj->refresh_token = $refreshToken;

        return $obj;
    }
}

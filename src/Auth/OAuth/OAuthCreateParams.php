<?php

declare(strict_types=1);

namespace HubspotSDK\Auth\OAuth;

use HubspotSDK\Auth\OAuth\OAuthCreateParams\GrantType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new OAuthCreateParams); // set properties as needed
 * $client->auth.oauth->create(...$params->toArray());
 * ```
 * Refresh an access token.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->auth.oauth->create(...$params->toArray());`
 *
 * @see HubspotSDK\Auth\OAuth->create
 *
 * @phpstan-type oauth_create_params = array{
 *   clientID?: string,
 *   clientSecret?: string,
 *   code?: string,
 *   grantType?: GrantType|value-of<GrantType>,
 *   redirectUri?: string,
 *   refreshToken?: string,
 * }
 */
final class OAuthCreateParams implements BaseModel
{
    /** @use SdkModel<oauth_create_params> */
    use SdkModel;
    use SdkParams;

    #[Api('client_id', optional: true)]
    public ?string $clientID;

    #[Api('client_secret', optional: true)]
    public ?string $clientSecret;

    #[Api(optional: true)]
    public ?string $code;

    /** @var value-of<GrantType>|null $grantType */
    #[Api('grant_type', enum: GrantType::class, optional: true)]
    public ?string $grantType;

    #[Api('redirect_uri', optional: true)]
    public ?string $redirectUri;

    #[Api('refresh_token', optional: true)]
    public ?string $refreshToken;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param GrantType|value-of<GrantType> $grantType
     */
    public static function with(
        ?string $clientID = null,
        ?string $clientSecret = null,
        ?string $code = null,
        GrantType|string|null $grantType = null,
        ?string $redirectUri = null,
        ?string $refreshToken = null,
    ): self {
        $obj = new self;

        null !== $clientID && $obj->clientID = $clientID;
        null !== $clientSecret && $obj->clientSecret = $clientSecret;
        null !== $code && $obj->code = $code;
        null !== $grantType && $obj['grantType'] = $grantType;
        null !== $redirectUri && $obj->redirectUri = $redirectUri;
        null !== $refreshToken && $obj->refreshToken = $refreshToken;

        return $obj;
    }

    public function withClientID(string $clientID): self
    {
        $obj = clone $this;
        $obj->clientID = $clientID;

        return $obj;
    }

    public function withClientSecret(string $clientSecret): self
    {
        $obj = clone $this;
        $obj->clientSecret = $clientSecret;

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
        $obj['grantType'] = $grantType;

        return $obj;
    }

    public function withRedirectUri(string $redirectUri): self
    {
        $obj = clone $this;
        $obj->redirectUri = $redirectUri;

        return $obj;
    }

    public function withRefreshToken(string $refreshToken): self
    {
        $obj = clone $this;
        $obj->refreshToken = $refreshToken;

        return $obj;
    }
}

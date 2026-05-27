<?php

declare(strict_types=1);

namespace HubSpotSDK\Auth\OAuth;

use HubSpotSDK\Core\Concerns\SdkUnion;
use HubSpotSDK\Core\Conversion\Contracts\Converter;
use HubSpotSDK\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type AccessTokenResponseShape from \HubSpotSDK\Auth\OAuth\AccessTokenResponse
 * @phpstan-import-type ClientCredentialsTokenResponseShape from \HubSpotSDK\Auth\OAuth\ClientCredentialsTokenResponse
 *
 * @phpstan-type TokenResponseIfVariants = AccessTokenResponse|ClientCredentialsTokenResponse
 * @phpstan-type TokenResponseIfShape = TokenResponseIfVariants|AccessTokenResponseShape|ClientCredentialsTokenResponseShape
 */
final class TokenResponseIf implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [AccessTokenResponse::class, ClientCredentialsTokenResponse::class];
    }
}

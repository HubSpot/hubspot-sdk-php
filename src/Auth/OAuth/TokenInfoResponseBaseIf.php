<?php

declare(strict_types=1);

namespace HubSpotSDK\Auth\OAuth;

use HubSpotSDK\Core\Concerns\SdkUnion;
use HubSpotSDK\Core\Conversion\Contracts\Converter;
use HubSpotSDK\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type PublicAccessTokenInfoResponseShape from \HubSpotSDK\Auth\OAuth\PublicAccessTokenInfoResponse
 * @phpstan-import-type PublicRefreshTokenInfoResponseShape from \HubSpotSDK\Auth\OAuth\PublicRefreshTokenInfoResponse
 *
 * @phpstan-type TokenInfoResponseBaseIfVariants = PublicAccessTokenInfoResponse|PublicRefreshTokenInfoResponse
 * @phpstan-type TokenInfoResponseBaseIfShape = TokenInfoResponseBaseIfVariants|PublicAccessTokenInfoResponseShape|PublicRefreshTokenInfoResponseShape
 */
final class TokenInfoResponseBaseIf implements ConverterSource
{
    use SdkUnion;

    public static function discriminator(): string
    {
        return 'tokenUse';
    }

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            'access_token' => PublicAccessTokenInfoResponse::class,
            'refresh_token' => PublicRefreshTokenInfoResponse::class,
        ];
    }
}

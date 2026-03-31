<?php

declare(strict_types=1);

namespace HubspotSDK\Auth\OAuth;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type PublicAccessTokenInfoResponseShape from \HubspotSDK\Auth\OAuth\PublicAccessTokenInfoResponse
 * @phpstan-import-type PublicRefreshTokenInfoResponseShape from \HubspotSDK\Auth\OAuth\PublicRefreshTokenInfoResponse
 *
 * @phpstan-type TokenInfoResponseBaseIfVariants = PublicAccessTokenInfoResponse|PublicRefreshTokenInfoResponse
 * @phpstan-type TokenInfoResponseBaseIfShape = TokenInfoResponseBaseIfVariants|PublicAccessTokenInfoResponseShape|PublicRefreshTokenInfoResponseShape
 */
final class TokenInfoResponseBaseIf implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            PublicAccessTokenInfoResponse::class,
            PublicRefreshTokenInfoResponse::class,
        ];
    }
}

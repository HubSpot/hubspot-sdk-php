<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Timeline;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DeveloperQualifiedSymbolShape from \HubSpotSDK\Crm\Timeline\DeveloperQualifiedSymbol
 *
 * @phpstan-type AppEventResolutionResponseShape = array{
 *   developerQualifiedSymbol: DeveloperQualifiedSymbol|DeveloperQualifiedSymbolShape,
 *   fullyQualifiedName: string,
 * }
 */
final class AppEventResolutionResponse implements BaseModel
{
    /** @use SdkModel<AppEventResolutionResponseShape> */
    use SdkModel;

    #[Required]
    public DeveloperQualifiedSymbol $developerQualifiedSymbol;

    #[Required]
    public string $fullyQualifiedName;

    /**
     * `new AppEventResolutionResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AppEventResolutionResponse::with(
     *   developerQualifiedSymbol: ..., fullyQualifiedName: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AppEventResolutionResponse)
     *   ->withDeveloperQualifiedSymbol(...)
     *   ->withFullyQualifiedName(...)
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
     *
     * @param DeveloperQualifiedSymbol|DeveloperQualifiedSymbolShape $developerQualifiedSymbol
     */
    public static function with(
        DeveloperQualifiedSymbol|array $developerQualifiedSymbol,
        string $fullyQualifiedName,
    ): self {
        $self = new self;

        $self['developerQualifiedSymbol'] = $developerQualifiedSymbol;
        $self['fullyQualifiedName'] = $fullyQualifiedName;

        return $self;
    }

    /**
     * @param DeveloperQualifiedSymbol|DeveloperQualifiedSymbolShape $developerQualifiedSymbol
     */
    public function withDeveloperQualifiedSymbol(
        DeveloperQualifiedSymbol|array $developerQualifiedSymbol
    ): self {
        $self = clone $this;
        $self['developerQualifiedSymbol'] = $developerQualifiedSymbol;

        return $self;
    }

    public function withFullyQualifiedName(string $fullyQualifiedName): self
    {
        $self = clone $this;
        $self['fullyQualifiedName'] = $fullyQualifiedName;

        return $self;
    }
}

<?php

declare(strict_types=1);

namespace HubspotSDK\Auth\OAuth;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type TokenInfoResponseBaseIfShape = array{active: bool}
 */
final class TokenInfoResponseBaseIf implements BaseModel
{
    /** @use SdkModel<TokenInfoResponseBaseIfShape> */
    use SdkModel;

    #[Required]
    public bool $active;

    /**
     * `new TokenInfoResponseBaseIf()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TokenInfoResponseBaseIf::with(active: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TokenInfoResponseBaseIf)->withActive(...)
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
    public static function with(bool $active): self
    {
        $self = new self;

        $self['active'] = $active;

        return $self;
    }

    public function withActive(bool $active): self
    {
        $self = clone $this;
        $self['active'] = $active;

        return $self;
    }
}

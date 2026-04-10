<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Pages\LandingPages;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Create a copy of an existing landing page.
 *
 * @see HubSpotSDK\Services\Cms\Pages\LandingPagesService::clone()
 *
 * @phpstan-type LandingPageCloneParamsShape = array{
 *   id: string, cloneName?: string|null
 * }
 */
final class LandingPageCloneParams implements BaseModel
{
    /** @use SdkModel<LandingPageCloneParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of the object to be cloned.
     */
    #[Required]
    public string $id;

    /**
     * Name of the cloned object.
     */
    #[Optional]
    public ?string $cloneName;

    /**
     * `new LandingPageCloneParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LandingPageCloneParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LandingPageCloneParams)->withID(...)
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
    public static function with(string $id, ?string $cloneName = null): self
    {
        $self = new self;

        $self['id'] = $id;

        null !== $cloneName && $self['cloneName'] = $cloneName;

        return $self;
    }

    /**
     * ID of the object to be cloned.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Name of the cloned object.
     */
    public function withCloneName(string $cloneName): self
    {
        $self = clone $this;
        $self['cloneName'] = $cloneName;

        return $self;
    }
}

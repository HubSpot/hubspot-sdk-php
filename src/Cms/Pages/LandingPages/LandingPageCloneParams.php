<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages\LandingPages;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Clone a Landing Page.
 *
 * @see HubspotSDK\Services\Cms\Pages\LandingPagesService::clone()
 *
 * @phpstan-type LandingPageCloneParamsShape = array{
 *   id: string, cloneName?: string
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
        $obj = new self;

        $obj['id'] = $id;

        null !== $cloneName && $obj['cloneName'] = $cloneName;

        return $obj;
    }

    /**
     * ID of the object to be cloned.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Name of the cloned object.
     */
    public function withCloneName(string $cloneName): self
    {
        $obj = clone $this;
        $obj['cloneName'] = $cloneName;

        return $obj;
    }
}

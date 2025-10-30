<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages\LandingPages;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Set a landing page as the primary language of a multi-language group.
 *
 * @see HubspotSDK\Cms\Pages\LandingPages->setNewLangPrimary
 *
 * @phpstan-type LandingPageSetNewLangPrimaryParamsShape = array{id: string}
 */
final class LandingPageSetNewLangPrimaryParams implements BaseModel
{
    /** @use SdkModel<LandingPageSetNewLangPrimaryParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of object to set as primary in multi-language group.
     */
    #[Api]
    public string $id;

    /**
     * `new LandingPageSetNewLangPrimaryParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LandingPageSetNewLangPrimaryParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LandingPageSetNewLangPrimaryParams)->withID(...)
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
    public static function with(string $id): self
    {
        $obj = new self;

        $obj->id = $id;

        return $obj;
    }

    /**
     * ID of object to set as primary in multi-language group.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }
}

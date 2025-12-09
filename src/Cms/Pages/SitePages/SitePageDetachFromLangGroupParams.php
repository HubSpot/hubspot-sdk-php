<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages\SitePages;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Detach a site page from a multi-language group.
 *
 * @see HubspotSDK\Services\Cms\Pages\SitePagesService::detachFromLangGroup()
 *
 * @phpstan-type SitePageDetachFromLangGroupParamsShape = array{id: string}
 */
final class SitePageDetachFromLangGroupParams implements BaseModel
{
    /** @use SdkModel<SitePageDetachFromLangGroupParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of the object to remove from a multi-language group.
     */
    #[Required]
    public string $id;

    /**
     * `new SitePageDetachFromLangGroupParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SitePageDetachFromLangGroupParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SitePageDetachFromLangGroupParams)->withID(...)
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

        $obj['id'] = $id;

        return $obj;
    }

    /**
     * ID of the object to remove from a multi-language group.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }
}

<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages\LandingPages;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Takes a specified version of a Landing Page, sets it as the new draft version of the Landing Page.
 *
 * @see HubspotSDK\Cms\Pages\LandingPages->restoreRevisionToDraft
 *
 * @phpstan-type LandingPageRestoreRevisionToDraftParamsShape = array{
 *   objectID: string
 * }
 */
final class LandingPageRestoreRevisionToDraftParams implements BaseModel
{
    /** @use SdkModel<LandingPageRestoreRevisionToDraftParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectID;

    /**
     * `new LandingPageRestoreRevisionToDraftParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LandingPageRestoreRevisionToDraftParams::with(objectID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LandingPageRestoreRevisionToDraftParams)->withObjectID(...)
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
    public static function with(string $objectID): self
    {
        $obj = new self;

        $obj->objectID = $objectID;

        return $obj;
    }

    public function withObjectID(string $objectID): self
    {
        $obj = clone $this;
        $obj->objectID = $objectID;

        return $obj;
    }
}

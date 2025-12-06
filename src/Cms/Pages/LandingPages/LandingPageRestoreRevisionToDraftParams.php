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
 * @see HubspotSDK\Services\Cms\Pages\LandingPagesService::restoreRevisionToDraft()
 *
 * @phpstan-type LandingPageRestoreRevisionToDraftParamsShape = array{
 *   objectId: string
 * }
 */
final class LandingPageRestoreRevisionToDraftParams implements BaseModel
{
    /** @use SdkModel<LandingPageRestoreRevisionToDraftParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectId;

    /**
     * `new LandingPageRestoreRevisionToDraftParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LandingPageRestoreRevisionToDraftParams::with(objectId: ...)
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
    public static function with(string $objectId): self
    {
        $obj = new self;

        $obj['objectId'] = $objectId;

        return $obj;
    }

    public function withObjectID(string $objectID): self
    {
        $obj = clone $this;
        $obj['objectId'] = $objectID;

        return $obj;
    }
}

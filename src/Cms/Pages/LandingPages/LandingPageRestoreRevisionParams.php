<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages\LandingPages;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Takes a specified version of a Landing Page and restores it.
 *
 * @see HubspotSDK\Services\Cms\Pages\LandingPagesService::restoreRevision()
 *
 * @phpstan-type LandingPageRestoreRevisionParamsShape = array{objectId: string}
 */
final class LandingPageRestoreRevisionParams implements BaseModel
{
    /** @use SdkModel<LandingPageRestoreRevisionParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectId;

    /**
     * `new LandingPageRestoreRevisionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LandingPageRestoreRevisionParams::with(objectId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LandingPageRestoreRevisionParams)->withObjectID(...)
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

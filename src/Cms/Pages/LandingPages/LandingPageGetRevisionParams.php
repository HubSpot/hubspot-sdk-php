<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages\LandingPages;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieves a previous version of a Landing Page.
 *
 * @see HubspotSDK\Cms\Pages\LandingPages->getRevision
 *
 * @phpstan-type LandingPageGetRevisionParamsShape = array{objectID: string}
 */
final class LandingPageGetRevisionParams implements BaseModel
{
    /** @use SdkModel<LandingPageGetRevisionParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectID;

    /**
     * `new LandingPageGetRevisionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LandingPageGetRevisionParams::with(objectID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LandingPageGetRevisionParams)->withObjectID(...)
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

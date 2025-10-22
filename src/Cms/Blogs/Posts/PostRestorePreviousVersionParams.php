<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Restores a blog post to one of its previous versions.
 *
 * @see HubspotSDK\Cms\Blogs\Posts->restorePreviousVersion
 *
 * @phpstan-type post_restore_previous_version_params = array{objectID: string}
 */
final class PostRestorePreviousVersionParams implements BaseModel
{
    /** @use SdkModel<post_restore_previous_version_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectID;

    /**
     * `new PostRestorePreviousVersionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PostRestorePreviousVersionParams::with(objectID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PostRestorePreviousVersionParams)->withObjectID(...)
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

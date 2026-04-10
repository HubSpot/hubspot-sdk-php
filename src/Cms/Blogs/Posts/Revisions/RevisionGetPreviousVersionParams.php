<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Blogs\Posts\Revisions;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a previous version of a blog post.
 *
 * @see HubSpotSDK\Services\Cms\Blogs\Posts\RevisionsService::getPreviousVersion()
 *
 * @phpstan-type RevisionGetPreviousVersionParamsShape = array{objectID: string}
 */
final class RevisionGetPreviousVersionParams implements BaseModel
{
    /** @use SdkModel<RevisionGetPreviousVersionParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectID;

    /**
     * `new RevisionGetPreviousVersionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RevisionGetPreviousVersionParams::with(objectID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RevisionGetPreviousVersionParams)->withObjectID(...)
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
        $self = new self;

        $self['objectID'] = $objectID;

        return $self;
    }

    public function withObjectID(string $objectID): self
    {
        $self = clone $this;
        $self['objectID'] = $objectID;

        return $self;
    }
}

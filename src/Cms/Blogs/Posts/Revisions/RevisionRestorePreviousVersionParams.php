<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts\Revisions;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Restores a blog post to one of its previous versions.
 *
 * @see HubspotSDK\Services\Cms\Blogs\Posts\RevisionsService::restorePreviousVersion()
 *
 * @phpstan-type RevisionRestorePreviousVersionParamsShape = array{
 *   objectID: string
 * }
 */
final class RevisionRestorePreviousVersionParams implements BaseModel
{
    /** @use SdkModel<RevisionRestorePreviousVersionParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectID;

    /**
     * `new RevisionRestorePreviousVersionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RevisionRestorePreviousVersionParams::with(objectID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RevisionRestorePreviousVersionParams)->withObjectID(...)
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

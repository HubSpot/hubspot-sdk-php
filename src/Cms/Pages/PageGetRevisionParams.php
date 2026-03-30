<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a previous version of a website page by the revision ID.
 *
 * @see HubspotSDK\Services\Cms\PagesService::getRevision()
 *
 * @phpstan-type PageGetRevisionParamsShape = array{objectID: string}
 */
final class PageGetRevisionParams implements BaseModel
{
    /** @use SdkModel<PageGetRevisionParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectID;

    /**
     * `new PageGetRevisionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PageGetRevisionParams::with(objectID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PageGetRevisionParams)->withObjectID(...)
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

<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type VideoObjectShape = array{
 *   id: int, deeplinkURL: string, fileID: int
 * }
 */
final class VideoObject implements BaseModel
{
    /** @use SdkModel<VideoObjectShape> */
    use SdkModel;

    #[Required]
    public int $id;

    #[Required('deeplinkUrl')]
    public string $deeplinkURL;

    #[Required('fileId')]
    public int $fileID;

    /**
     * `new VideoObject()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VideoObject::with(id: ..., deeplinkURL: ..., fileID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VideoObject)->withID(...)->withDeeplinkURL(...)->withFileID(...)
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
    public static function with(int $id, string $deeplinkURL, int $fileID): self
    {
        $self = new self;

        $self['id'] = $id;
        $self['deeplinkURL'] = $deeplinkURL;
        $self['fileID'] = $fileID;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withDeeplinkURL(string $deeplinkURL): self
    {
        $self = clone $this;
        $self['deeplinkURL'] = $deeplinkURL;

        return $self;
    }

    public function withFileID(int $fileID): self
    {
        $self = clone $this;
        $self['fileID'] = $fileID;

        return $self;
    }
}

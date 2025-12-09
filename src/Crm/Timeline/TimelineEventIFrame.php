<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Timeline;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type TimelineEventIFrameShape = array{
 *   headerLabel: string, height: int, linkLabel: string, url: string, width: int
 * }
 */
final class TimelineEventIFrame implements BaseModel
{
    /** @use SdkModel<TimelineEventIFrameShape> */
    use SdkModel;

    /**
     * The label of the modal window that displays the iframe contents.
     */
    #[Required]
    public string $headerLabel;

    /**
     * The height of the modal window in pixels.
     */
    #[Required]
    public int $height;

    /**
     * The text displaying the link that will display the iframe.
     */
    #[Required]
    public string $linkLabel;

    /**
     * The URI of the iframe contents.
     */
    #[Required]
    public string $url;

    /**
     * The width of the modal window in pixels.
     */
    #[Required]
    public int $width;

    /**
     * `new TimelineEventIFrame()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TimelineEventIFrame::with(
     *   headerLabel: ..., height: ..., linkLabel: ..., url: ..., width: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TimelineEventIFrame)
     *   ->withHeaderLabel(...)
     *   ->withHeight(...)
     *   ->withLinkLabel(...)
     *   ->withURL(...)
     *   ->withWidth(...)
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
    public static function with(
        string $headerLabel,
        int $height,
        string $linkLabel,
        string $url,
        int $width
    ): self {
        $self = new self;

        $self['headerLabel'] = $headerLabel;
        $self['height'] = $height;
        $self['linkLabel'] = $linkLabel;
        $self['url'] = $url;
        $self['width'] = $width;

        return $self;
    }

    /**
     * The label of the modal window that displays the iframe contents.
     */
    public function withHeaderLabel(string $headerLabel): self
    {
        $self = clone $this;
        $self['headerLabel'] = $headerLabel;

        return $self;
    }

    /**
     * The height of the modal window in pixels.
     */
    public function withHeight(int $height): self
    {
        $self = clone $this;
        $self['height'] = $height;

        return $self;
    }

    /**
     * The text displaying the link that will display the iframe.
     */
    public function withLinkLabel(string $linkLabel): self
    {
        $self = clone $this;
        $self['linkLabel'] = $linkLabel;

        return $self;
    }

    /**
     * The URI of the iframe contents.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    /**
     * The width of the modal window in pixels.
     */
    public function withWidth(int $width): self
    {
        $self = clone $this;
        $self['width'] = $width;

        return $self;
    }
}

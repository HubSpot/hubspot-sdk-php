<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Timeline;

use HubspotSDK\Core\Attributes\Api;
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
    #[Api]
    public string $headerLabel;

    /**
     * The height of the modal window in pixels.
     */
    #[Api]
    public int $height;

    /**
     * The text displaying the link that will display the iframe.
     */
    #[Api]
    public string $linkLabel;

    /**
     * The URI of the iframe contents.
     */
    #[Api]
    public string $url;

    /**
     * The width of the modal window in pixels.
     */
    #[Api]
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
        $obj = new self;

        $obj['headerLabel'] = $headerLabel;
        $obj['height'] = $height;
        $obj['linkLabel'] = $linkLabel;
        $obj['url'] = $url;
        $obj['width'] = $width;

        return $obj;
    }

    /**
     * The label of the modal window that displays the iframe contents.
     */
    public function withHeaderLabel(string $headerLabel): self
    {
        $obj = clone $this;
        $obj['headerLabel'] = $headerLabel;

        return $obj;
    }

    /**
     * The height of the modal window in pixels.
     */
    public function withHeight(int $height): self
    {
        $obj = clone $this;
        $obj['height'] = $height;

        return $obj;
    }

    /**
     * The text displaying the link that will display the iframe.
     */
    public function withLinkLabel(string $linkLabel): self
    {
        $obj = clone $this;
        $obj['linkLabel'] = $linkLabel;

        return $obj;
    }

    /**
     * The URI of the iframe contents.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj['url'] = $url;

        return $obj;
    }

    /**
     * The width of the modal window in pixels.
     */
    public function withWidth(int $width): self
    {
        $obj = clone $this;
        $obj['width'] = $width;

        return $obj;
    }
}

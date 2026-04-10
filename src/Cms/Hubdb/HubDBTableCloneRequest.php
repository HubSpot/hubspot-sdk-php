<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Hubdb;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type HubDBTableCloneRequestShape = array{
 *   copyRows: bool,
 *   isHubSpotDefined: bool,
 *   newLabel?: string|null,
 *   newName?: string|null,
 * }
 */
final class HubDBTableCloneRequest implements BaseModel
{
    /** @use SdkModel<HubDBTableCloneRequestShape> */
    use SdkModel;

    /**
     * Specifies whether to copy the rows during clone.
     */
    #[Required]
    public bool $copyRows;

    /**
     * Indicates whether the table is defined by HubSpot.
     */
    #[Required('isHubspotDefined')]
    public bool $isHubSpotDefined;

    /**
     * The new label for the cloned table.
     */
    #[Optional]
    public ?string $newLabel;

    /**
     * The new name for the cloned table.
     */
    #[Optional]
    public ?string $newName;

    /**
     * `new HubDBTableCloneRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HubDBTableCloneRequest::with(copyRows: ..., isHubSpotDefined: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HubDBTableCloneRequest)->withCopyRows(...)->withIsHubSpotDefined(...)
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
        bool $copyRows,
        bool $isHubSpotDefined,
        ?string $newLabel = null,
        ?string $newName = null,
    ): self {
        $self = new self;

        $self['copyRows'] = $copyRows;
        $self['isHubSpotDefined'] = $isHubSpotDefined;

        null !== $newLabel && $self['newLabel'] = $newLabel;
        null !== $newName && $self['newName'] = $newName;

        return $self;
    }

    /**
     * Specifies whether to copy the rows during clone.
     */
    public function withCopyRows(bool $copyRows): self
    {
        $self = clone $this;
        $self['copyRows'] = $copyRows;

        return $self;
    }

    /**
     * Indicates whether the table is defined by HubSpot.
     */
    public function withIsHubSpotDefined(bool $isHubSpotDefined): self
    {
        $self = clone $this;
        $self['isHubSpotDefined'] = $isHubSpotDefined;

        return $self;
    }

    /**
     * The new label for the cloned table.
     */
    public function withNewLabel(string $newLabel): self
    {
        $self = clone $this;
        $self['newLabel'] = $newLabel;

        return $self;
    }

    /**
     * The new name for the cloned table.
     */
    public function withNewName(string $newName): self
    {
        $self = clone $this;
        $self['newName'] = $newName;

        return $self;
    }
}

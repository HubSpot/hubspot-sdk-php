<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type HubDBTableCloneRequestShape = array{
 *   copyRows: bool,
 *   isHubspotDefined: bool,
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

    #[Required]
    public bool $isHubspotDefined;

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
     * HubDBTableCloneRequest::with(copyRows: ..., isHubspotDefined: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HubDBTableCloneRequest)->withCopyRows(...)->withIsHubspotDefined(...)
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
        bool $isHubspotDefined,
        ?string $newLabel = null,
        ?string $newName = null,
    ): self {
        $obj = new self;

        $obj['copyRows'] = $copyRows;
        $obj['isHubspotDefined'] = $isHubspotDefined;

        null !== $newLabel && $obj['newLabel'] = $newLabel;
        null !== $newName && $obj['newName'] = $newName;

        return $obj;
    }

    /**
     * Specifies whether to copy the rows during clone.
     */
    public function withCopyRows(bool $copyRows): self
    {
        $obj = clone $this;
        $obj['copyRows'] = $copyRows;

        return $obj;
    }

    public function withIsHubspotDefined(bool $isHubspotDefined): self
    {
        $obj = clone $this;
        $obj['isHubspotDefined'] = $isHubspotDefined;

        return $obj;
    }

    /**
     * The new label for the cloned table.
     */
    public function withNewLabel(string $newLabel): self
    {
        $obj = clone $this;
        $obj['newLabel'] = $newLabel;

        return $obj;
    }

    /**
     * The new name for the cloned table.
     */
    public function withNewName(string $newName): self
    {
        $obj = clone $this;
        $obj['newName'] = $newName;

        return $obj;
    }
}

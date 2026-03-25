<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Send;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PropertyModificationMetadataShape = array{
 *   archivable: bool,
 *   readOnlyDefinition: bool,
 *   readOnlyValue: bool,
 *   readOnlyOptions?: bool|null,
 * }
 */
final class PropertyModificationMetadata implements BaseModel
{
    /** @use SdkModel<PropertyModificationMetadataShape> */
    use SdkModel;

    #[Required]
    public bool $archivable;

    #[Required]
    public bool $readOnlyDefinition;

    #[Required]
    public bool $readOnlyValue;

    #[Optional]
    public ?bool $readOnlyOptions;

    /**
     * `new PropertyModificationMetadata()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertyModificationMetadata::with(
     *   archivable: ..., readOnlyDefinition: ..., readOnlyValue: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PropertyModificationMetadata)
     *   ->withArchivable(...)
     *   ->withReadOnlyDefinition(...)
     *   ->withReadOnlyValue(...)
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
        bool $archivable,
        bool $readOnlyDefinition,
        bool $readOnlyValue,
        ?bool $readOnlyOptions = null,
    ): self {
        $self = new self;

        $self['archivable'] = $archivable;
        $self['readOnlyDefinition'] = $readOnlyDefinition;
        $self['readOnlyValue'] = $readOnlyValue;

        null !== $readOnlyOptions && $self['readOnlyOptions'] = $readOnlyOptions;

        return $self;
    }

    public function withArchivable(bool $archivable): self
    {
        $self = clone $this;
        $self['archivable'] = $archivable;

        return $self;
    }

    public function withReadOnlyDefinition(bool $readOnlyDefinition): self
    {
        $self = clone $this;
        $self['readOnlyDefinition'] = $readOnlyDefinition;

        return $self;
    }

    public function withReadOnlyValue(bool $readOnlyValue): self
    {
        $self = clone $this;
        $self['readOnlyValue'] = $readOnlyValue;

        return $self;
    }

    public function withReadOnlyOptions(bool $readOnlyOptions): self
    {
        $self = clone $this;
        $self['readOnlyOptions'] = $readOnlyOptions;

        return $self;
    }
}

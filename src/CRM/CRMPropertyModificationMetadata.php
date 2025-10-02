<?php

declare(strict_types=1);

namespace HubspotSDK\CRM;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type crm_property_modification_metadata = array{
 *   archivable: bool,
 *   readOnlyDefinition: bool,
 *   readOnlyValue: bool,
 *   readOnlyOptions?: bool,
 * }
 */
final class CRMPropertyModificationMetadata implements BaseModel
{
    /** @use SdkModel<crm_property_modification_metadata> */
    use SdkModel;

    #[Api]
    public bool $archivable;

    #[Api]
    public bool $readOnlyDefinition;

    #[Api]
    public bool $readOnlyValue;

    #[Api(optional: true)]
    public ?bool $readOnlyOptions;

    /**
     * `new CRMPropertyModificationMetadata()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMPropertyModificationMetadata::with(
     *   archivable: ..., readOnlyDefinition: ..., readOnlyValue: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMPropertyModificationMetadata)
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
        $obj = new self;

        $obj->archivable = $archivable;
        $obj->readOnlyDefinition = $readOnlyDefinition;
        $obj->readOnlyValue = $readOnlyValue;

        null !== $readOnlyOptions && $obj->readOnlyOptions = $readOnlyOptions;

        return $obj;
    }

    public function withArchivable(bool $archivable): self
    {
        $obj = clone $this;
        $obj->archivable = $archivable;

        return $obj;
    }

    public function withReadOnlyDefinition(bool $readOnlyDefinition): self
    {
        $obj = clone $this;
        $obj->readOnlyDefinition = $readOnlyDefinition;

        return $obj;
    }

    public function withReadOnlyValue(bool $readOnlyValue): self
    {
        $obj = clone $this;
        $obj->readOnlyValue = $readOnlyValue;

        return $obj;
    }

    public function withReadOnlyOptions(bool $readOnlyOptions): self
    {
        $obj = clone $this;
        $obj->readOnlyOptions = $readOnlyOptions;

        return $obj;
    }
}

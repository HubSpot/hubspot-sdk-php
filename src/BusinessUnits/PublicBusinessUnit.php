<?php

declare(strict_types=1);

namespace HubspotSDK\BusinessUnits;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * A Business Unit.
 *
 * @phpstan-type PublicBusinessUnitShape = array{
 *   id: string, name: string, logoMetadata?: PublicBusinessUnitLogoMetadata|null
 * }
 */
final class PublicBusinessUnit implements BaseModel
{
    /** @use SdkModel<PublicBusinessUnitShape> */
    use SdkModel;

    /**
     * The Business Unit's unique ID.
     */
    #[Api]
    public string $id;

    /**
     * The Business Unit's name.
     */
    #[Api]
    public string $name;

    /**
     * A Business Unit's logo metadata.
     */
    #[Api(optional: true)]
    public ?PublicBusinessUnitLogoMetadata $logoMetadata;

    /**
     * `new PublicBusinessUnit()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicBusinessUnit::with(id: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicBusinessUnit)->withID(...)->withName(...)
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
        string $id,
        string $name,
        ?PublicBusinessUnitLogoMetadata $logoMetadata = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->name = $name;

        null !== $logoMetadata && $obj->logoMetadata = $logoMetadata;

        return $obj;
    }

    /**
     * The Business Unit's unique ID.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The Business Unit's name.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * A Business Unit's logo metadata.
     */
    public function withLogoMetadata(
        PublicBusinessUnitLogoMetadata $logoMetadata
    ): self {
        $obj = clone $this;
        $obj->logoMetadata = $logoMetadata;

        return $obj;
    }
}

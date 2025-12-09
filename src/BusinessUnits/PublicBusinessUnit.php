<?php

declare(strict_types=1);

namespace HubspotSDK\BusinessUnits;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
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
    #[Required]
    public string $id;

    /**
     * The Business Unit's name.
     */
    #[Required]
    public string $name;

    /**
     * A Business Unit's logo metadata.
     */
    #[Optional]
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
     *
     * @param PublicBusinessUnitLogoMetadata|array{
     *   logoAltText?: string|null, logoURL?: string|null, resizedURL?: string|null
     * } $logoMetadata
     */
    public static function with(
        string $id,
        string $name,
        PublicBusinessUnitLogoMetadata|array|null $logoMetadata = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['name'] = $name;

        null !== $logoMetadata && $self['logoMetadata'] = $logoMetadata;

        return $self;
    }

    /**
     * The Business Unit's unique ID.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The Business Unit's name.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * A Business Unit's logo metadata.
     *
     * @param PublicBusinessUnitLogoMetadata|array{
     *   logoAltText?: string|null, logoURL?: string|null, resizedURL?: string|null
     * } $logoMetadata
     */
    public function withLogoMetadata(
        PublicBusinessUnitLogoMetadata|array $logoMetadata
    ): self {
        $self = clone $this;
        $self['logoMetadata'] = $logoMetadata;

        return $self;
    }
}

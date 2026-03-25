<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Owners;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Owners\OwnerGetParams\IDProperty;

/**
 * @see HubspotSDK\Services\Crm\OwnersService::get()
 *
 * @phpstan-type OwnerGetParamsShape = array{
 *   archived?: bool|null, idProperty?: null|IDProperty|value-of<IDProperty>
 * }
 */
final class OwnerGetParams implements BaseModel
{
    /** @use SdkModel<OwnerGetParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Whether to return only results that have been archived.
     */
    #[Optional]
    public ?bool $archived;

    /** @var value-of<IDProperty>|null $idProperty */
    #[Optional(enum: IDProperty::class)]
    public ?string $idProperty;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param IDProperty|value-of<IDProperty>|null $idProperty
     */
    public static function with(
        ?bool $archived = null,
        IDProperty|string|null $idProperty = null
    ): self {
        $self = new self;

        null !== $archived && $self['archived'] = $archived;
        null !== $idProperty && $self['idProperty'] = $idProperty;

        return $self;
    }

    /**
     * Whether to return only results that have been archived.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    /**
     * @param IDProperty|value-of<IDProperty> $idProperty
     */
    public function withIDProperty(IDProperty|string $idProperty): self
    {
        $self = clone $this;
        $self['idProperty'] = $idProperty;

        return $self;
    }
}

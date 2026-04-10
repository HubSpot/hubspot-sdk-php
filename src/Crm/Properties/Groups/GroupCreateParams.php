<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Properties\Groups;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Create and return a copy of a new property group.
 *
 * @see HubSpotSDK\Services\Crm\Properties\GroupsService::create()
 *
 * @phpstan-type GroupCreateParamsShape = array{
 *   label: string, name: string, displayOrder?: int|null
 * }
 */
final class GroupCreateParams implements BaseModel
{
    /** @use SdkModel<GroupCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $label;

    #[Required]
    public string $name;

    #[Optional]
    public ?int $displayOrder;

    /**
     * `new GroupCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * GroupCreateParams::with(label: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new GroupCreateParams)->withLabel(...)->withName(...)
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
        string $label,
        string $name,
        ?int $displayOrder = null
    ): self {
        $self = new self;

        $self['label'] = $label;
        $self['name'] = $name;

        null !== $displayOrder && $self['displayOrder'] = $displayOrder;

        return $self;
    }

    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withDisplayOrder(int $displayOrder): self
    {
        $self = clone $this;
        $self['displayOrder'] = $displayOrder;

        return $self;
    }
}

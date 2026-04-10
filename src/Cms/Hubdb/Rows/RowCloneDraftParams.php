<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Hubdb\Rows;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Clones a single row in the draft version of a table.
 *
 * @see HubSpotSDK\Services\Cms\Hubdb\RowsService::cloneDraft()
 *
 * @phpstan-type RowCloneDraftParamsShape = array{
 *   tableIDOrName: string, name?: string|null
 * }
 */
final class RowCloneDraftParams implements BaseModel
{
    /** @use SdkModel<RowCloneDraftParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $tableIDOrName;

    #[Optional]
    public ?string $name;

    /**
     * `new RowCloneDraftParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RowCloneDraftParams::with(tableIDOrName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RowCloneDraftParams)->withTableIDOrName(...)
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
        string $tableIDOrName,
        ?string $name = null
    ): self {
        $self = new self;

        $self['tableIDOrName'] = $tableIDOrName;

        null !== $name && $self['name'] = $name;

        return $self;
    }

    public function withTableIDOrName(string $tableIDOrName): self
    {
        $self = clone $this;
        $self['tableIDOrName'] = $tableIDOrName;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}

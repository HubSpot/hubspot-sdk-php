<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Rows;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Clones a single row in the draft version of a table.
 *
 * @see HubspotSDK\Services\Cms\Hubdb\RowsService::cloneDraft()
 *
 * @phpstan-type RowCloneDraftParamsShape = array{
 *   tableIDOrName: string, name?: string
 * }
 */
final class RowCloneDraftParams implements BaseModel
{
    /** @use SdkModel<RowCloneDraftParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $tableIDOrName;

    /**
     * The name for the cloned row.
     */
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

    /**
     * The name for the cloned row.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}

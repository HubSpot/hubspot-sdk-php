<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Rows;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Get a single row by ID from a table's draft version.
 *
 * @see HubspotSDK\Services\Cms\Hubdb\RowsService::getDraft()
 *
 * @phpstan-type RowGetDraftParamsShape = array{
 *   tableIDOrName: string, archived?: bool|null
 * }
 */
final class RowGetDraftParams implements BaseModel
{
    /** @use SdkModel<RowGetDraftParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $tableIDOrName;

    /**
     * Whether to return only results that have been archived.
     */
    #[Optional]
    public ?bool $archived;

    /**
     * `new RowGetDraftParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RowGetDraftParams::with(tableIDOrName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RowGetDraftParams)->withTableIDOrName(...)
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
        ?bool $archived = null
    ): self {
        $self = new self;

        $self['tableIDOrName'] = $tableIDOrName;

        null !== $archived && $self['archived'] = $archived;

        return $self;
    }

    public function withTableIDOrName(string $tableIDOrName): self
    {
        $self = clone $this;
        $self['tableIDOrName'] = $tableIDOrName;

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
}

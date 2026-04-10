<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Hubdb\Rows;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Get a single row by ID from the published version of a table.
 * **Note:** This endpoint can be accessed without any authentication, if the table is set to be allowed for public access.
 *
 * @see HubSpotSDK\Services\Cms\Hubdb\RowsService::get()
 *
 * @phpstan-type RowGetParamsShape = array{
 *   tableIDOrName: string, archived?: bool|null
 * }
 */
final class RowGetParams implements BaseModel
{
    /** @use SdkModel<RowGetParamsShape> */
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
     * `new RowGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RowGetParams::with(tableIDOrName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RowGetParams)->withTableIDOrName(...)
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

<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Rows;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Get a single row by ID from the published version of a table.
 * **Note:** This endpoint can be accessed without any authentication, if the table is set to be allowed for public access.
 *
 * @see HubspotSDK\Services\Cms\Hubdb\RowsService::get()
 *
 * @phpstan-type RowGetParamsShape = array{tableIDOrName: string, archived?: bool}
 */
final class RowGetParams implements BaseModel
{
    /** @use SdkModel<RowGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $tableIDOrName;

    /**
     * Specifies whether to return an archived row. Defaults to `false`.
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
        $obj = new self;

        $obj['tableIDOrName'] = $tableIDOrName;

        null !== $archived && $obj['archived'] = $archived;

        return $obj;
    }

    public function withTableIDOrName(string $tableIDOrName): self
    {
        $obj = clone $this;
        $obj['tableIDOrName'] = $tableIDOrName;

        return $obj;
    }

    /**
     * Specifies whether to return an archived row. Defaults to `false`.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj['archived'] = $archived;

        return $obj;
    }
}

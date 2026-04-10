<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Hubdb\Tables;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Delete a specific version of a table.
 *
 * @see HubSpotSDK\Services\Cms\Hubdb\TablesService::deleteVersion()
 *
 * @phpstan-type TableDeleteVersionParamsShape = array{tableIDOrName: string}
 */
final class TableDeleteVersionParams implements BaseModel
{
    /** @use SdkModel<TableDeleteVersionParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $tableIDOrName;

    /**
     * `new TableDeleteVersionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TableDeleteVersionParams::with(tableIDOrName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TableDeleteVersionParams)->withTableIDOrName(...)
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
    public static function with(string $tableIDOrName): self
    {
        $self = new self;

        $self['tableIDOrName'] = $tableIDOrName;

        return $self;
    }

    public function withTableIDOrName(string $tableIDOrName): self
    {
        $self = clone $this;
        $self['tableIDOrName'] = $tableIDOrName;

        return $self;
    }
}

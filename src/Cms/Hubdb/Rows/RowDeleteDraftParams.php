<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Rows;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Permanently deletes a row from a table's draft version.
 *
 * @see HubspotSDK\Services\Cms\Hubdb\RowsService::deleteDraft()
 *
 * @phpstan-type RowDeleteDraftParamsShape = array{tableIDOrName: string}
 */
final class RowDeleteDraftParams implements BaseModel
{
    /** @use SdkModel<RowDeleteDraftParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $tableIDOrName;

    /**
     * `new RowDeleteDraftParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RowDeleteDraftParams::with(tableIDOrName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RowDeleteDraftParams)->withTableIDOrName(...)
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

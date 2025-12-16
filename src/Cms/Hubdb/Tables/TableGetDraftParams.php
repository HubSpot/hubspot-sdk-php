<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Tables;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Get the details for the draft version of a specific HubDB table. This will include the definitions for the columns in the table and the number of rows in the table.
 *
 * @see HubspotSDK\Services\Cms\Hubdb\TablesService::getDraft()
 *
 * @phpstan-type TableGetDraftParamsShape = array{
 *   archived?: bool|null,
 *   includeForeignIDs?: bool|null,
 *   isGetLocalizedSchema?: bool|null,
 * }
 */
final class TableGetDraftParams implements BaseModel
{
    /** @use SdkModel<TableGetDraftParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Set this to `true` to return an archived table. Defaults to `false`.
     */
    #[Optional]
    public ?bool $archived;

    /**
     * Set this to `true` to populate foreign ID values in the result.
     */
    #[Optional]
    public ?bool $includeForeignIDs;

    /**
     * Indicates whether to retrieve the localized schema for the table.
     */
    #[Optional]
    public ?bool $isGetLocalizedSchema;

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
        ?bool $archived = null,
        ?bool $includeForeignIDs = null,
        ?bool $isGetLocalizedSchema = null,
    ): self {
        $self = new self;

        null !== $archived && $self['archived'] = $archived;
        null !== $includeForeignIDs && $self['includeForeignIDs'] = $includeForeignIDs;
        null !== $isGetLocalizedSchema && $self['isGetLocalizedSchema'] = $isGetLocalizedSchema;

        return $self;
    }

    /**
     * Set this to `true` to return an archived table. Defaults to `false`.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    /**
     * Set this to `true` to populate foreign ID values in the result.
     */
    public function withIncludeForeignIDs(bool $includeForeignIDs): self
    {
        $self = clone $this;
        $self['includeForeignIDs'] = $includeForeignIDs;

        return $self;
    }

    /**
     * Indicates whether to retrieve the localized schema for the table.
     */
    public function withIsGetLocalizedSchema(bool $isGetLocalizedSchema): self
    {
        $self = clone $this;
        $self['isGetLocalizedSchema'] = $isGetLocalizedSchema;

        return $self;
    }
}

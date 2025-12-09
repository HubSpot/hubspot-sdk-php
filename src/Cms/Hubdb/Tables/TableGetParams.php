<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Tables;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Returns the details for the published version of the specified table. This will include the definitions for the columns in the table and the number of rows in the table.
 *
 * **Note:** This endpoint can be accessed without any authentication if the table is set to be allowed for public access. To do so, you'll need to include the HubSpot account ID in a `portalId` query parameter.
 *
 * @see HubspotSDK\Services\Cms\Hubdb\TablesService::get()
 *
 * @phpstan-type TableGetParamsShape = array{
 *   archived?: bool, includeForeignIDs?: bool, isGetLocalizedSchema?: bool
 * }
 */
final class TableGetParams implements BaseModel
{
    /** @use SdkModel<TableGetParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Set this to `true` to return details for an archived table. Defaults to `false`.
     */
    #[Optional]
    public ?bool $archived;

    /**
     * Set this to `true` to populate foreign ID values in the result.
     */
    #[Optional]
    public ?bool $includeForeignIDs;

    /**
     * Indicates whether to retrieve the localized schema for the tables.
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
     * Set this to `true` to return details for an archived table. Defaults to `false`.
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
     * Indicates whether to retrieve the localized schema for the tables.
     */
    public function withIsGetLocalizedSchema(bool $isGetLocalizedSchema): self
    {
        $self = clone $this;
        $self['isGetLocalizedSchema'] = $isGetLocalizedSchema;

        return $self;
    }
}

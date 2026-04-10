<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Hubdb\Tables;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Returns the details for the published version of the specified table. This will include the definitions for the columns in the table and the number of rows in the table.
 *
 * **Note:** This endpoint can be accessed without any authentication if the table is set to be allowed for public access. To do so, you'll need to include the HubSpot account ID in a `portalId` query parameter.
 *
 * @see HubSpotSDK\Services\Cms\Hubdb\TablesService::get()
 *
 * @phpstan-type TableGetParamsShape = array{
 *   archived?: bool|null,
 *   includeForeignIDs?: bool|null,
 *   isGetLocalizedSchema?: bool|null,
 * }
 */
final class TableGetParams implements BaseModel
{
    /** @use SdkModel<TableGetParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Whether to return only results that have been archived.
     */
    #[Optional]
    public ?bool $archived;

    #[Optional]
    public ?bool $includeForeignIDs;

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
     * Whether to return only results that have been archived.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    public function withIncludeForeignIDs(bool $includeForeignIDs): self
    {
        $self = clone $this;
        $self['includeForeignIDs'] = $includeForeignIDs;

        return $self;
    }

    public function withIsGetLocalizedSchema(bool $isGetLocalizedSchema): self
    {
        $self = clone $this;
        $self['isGetLocalizedSchema'] = $isGetLocalizedSchema;

        return $self;
    }
}

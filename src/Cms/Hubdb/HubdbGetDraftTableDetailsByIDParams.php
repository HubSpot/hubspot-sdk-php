<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new HubdbGetDraftTableDetailsByIDParams); // set properties as needed
 * $client->cms.hubdb->getDraftTableDetailsByID(...$params->toArray());
 * ```
 * Get the details for the draft version of a specific HubDB table. This will include the definitions for the columns in the table and the number of rows in the table.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->cms.hubdb->getDraftTableDetailsByID(...$params->toArray());`
 *
 * @see HubspotSDK\Cms\Hubdb->getDraftTableDetailsByID
 *
 * @phpstan-type hubdb_get_draft_table_details_by_id_params = array{
 *   archived?: bool, includeForeignIDs?: bool, isGetLocalizedSchema?: bool
 * }
 */
final class HubdbGetDraftTableDetailsByIDParams implements BaseModel
{
    /** @use SdkModel<hubdb_get_draft_table_details_by_id_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Set this to `true` to return an archived table. Defaults to `false`.
     */
    #[Api(optional: true)]
    public ?bool $archived;

    /**
     * Set this to `true` to populate foreign ID values in the result.
     */
    #[Api(optional: true)]
    public ?bool $includeForeignIDs;

    #[Api(optional: true)]
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
        $obj = new self;

        null !== $archived && $obj->archived = $archived;
        null !== $includeForeignIDs && $obj->includeForeignIDs = $includeForeignIDs;
        null !== $isGetLocalizedSchema && $obj->isGetLocalizedSchema = $isGetLocalizedSchema;

        return $obj;
    }

    /**
     * Set this to `true` to return an archived table. Defaults to `false`.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    /**
     * Set this to `true` to populate foreign ID values in the result.
     */
    public function withIncludeForeignIDs(bool $includeForeignIDs): self
    {
        $obj = clone $this;
        $obj->includeForeignIDs = $includeForeignIDs;

        return $obj;
    }

    public function withIsGetLocalizedSchema(bool $isGetLocalizedSchema): self
    {
        $obj = clone $this;
        $obj->isGetLocalizedSchema = $isGetLocalizedSchema;

        return $obj;
    }
}

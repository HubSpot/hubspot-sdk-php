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
 * $params = (new HubdbCloneDraftTableParams); // set properties as needed
 * $client->cms.hubdb->cloneDraftTable(...$params->toArray());
 * ```
 * Clone an existing HubDB table. The `newName` and `newLabel` of the new table can be sent as JSON in the request body. This will create the cloned table as a draft.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->cms.hubdb->cloneDraftTable(...$params->toArray());`
 *
 * @see HubspotSDK\Cms\Hubdb->cloneDraftTable
 *
 * @phpstan-type hubdb_clone_draft_table_params = array{
 *   copyRows: bool, isHubspotDefined: bool, newLabel?: string, newName?: string
 * }
 */
final class HubdbCloneDraftTableParams implements BaseModel
{
    /** @use SdkModel<hubdb_clone_draft_table_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Specifies whether to copy the rows during clone.
     */
    #[Api]
    public bool $copyRows;

    #[Api]
    public bool $isHubspotDefined;

    /**
     * The new label for the cloned table.
     */
    #[Api(optional: true)]
    public ?string $newLabel;

    /**
     * The new name for the cloned table.
     */
    #[Api(optional: true)]
    public ?string $newName;

    /**
     * `new HubdbCloneDraftTableParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HubdbCloneDraftTableParams::with(copyRows: ..., isHubspotDefined: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HubdbCloneDraftTableParams)->withCopyRows(...)->withIsHubspotDefined(...)
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
        bool $copyRows,
        bool $isHubspotDefined,
        ?string $newLabel = null,
        ?string $newName = null,
    ): self {
        $obj = new self;

        $obj->copyRows = $copyRows;
        $obj->isHubspotDefined = $isHubspotDefined;

        null !== $newLabel && $obj->newLabel = $newLabel;
        null !== $newName && $obj->newName = $newName;

        return $obj;
    }

    /**
     * Specifies whether to copy the rows during clone.
     */
    public function withCopyRows(bool $copyRows): self
    {
        $obj = clone $this;
        $obj->copyRows = $copyRows;

        return $obj;
    }

    public function withIsHubspotDefined(bool $isHubspotDefined): self
    {
        $obj = clone $this;
        $obj->isHubspotDefined = $isHubspotDefined;

        return $obj;
    }

    /**
     * The new label for the cloned table.
     */
    public function withNewLabel(string $newLabel): self
    {
        $obj = clone $this;
        $obj->newLabel = $newLabel;

        return $obj;
    }

    /**
     * The new name for the cloned table.
     */
    public function withNewName(string $newName): self
    {
        $obj = clone $this;
        $obj->newName = $newName;

        return $obj;
    }
}

<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Tables;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new TableGetParams); // set properties as needed
 * $client->cms.hubdb.tables->get(...$params->toArray());
 * ```
 * Get details of a published table.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->cms.hubdb.tables->get(...$params->toArray());`
 *
 * @see HubspotSDK\Cms\Hubdb\Tables->get
 *
 * @phpstan-type table_get_params = array{
 *   archived?: bool, includeForeignIDs?: bool, isGetLocalizedSchema?: bool
 * }
 */
final class TableGetParams implements BaseModel
{
    /** @use SdkModel<table_get_params> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?bool $archived;

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

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

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

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
 * $params = (new HubdbResetDraftTableParams); // set properties as needed
 * $client->cms.hubdb->resetDraftTable(...$params->toArray());
 * ```
 * Reset a draft table.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->cms.hubdb->resetDraftTable(...$params->toArray());`
 *
 * @see HubspotSDK\Cms\Hubdb->resetDraftTable
 *
 * @phpstan-type hubdb_reset_draft_table_params = array{includeForeignIDs?: bool}
 */
final class HubdbResetDraftTableParams implements BaseModel
{
    /** @use SdkModel<hubdb_reset_draft_table_params> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?bool $includeForeignIDs;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $includeForeignIDs = null): self
    {
        $obj = new self;

        null !== $includeForeignIDs && $obj->includeForeignIDs = $includeForeignIDs;

        return $obj;
    }

    public function withIncludeForeignIDs(bool $includeForeignIDs): self
    {
        $obj = clone $this;
        $obj->includeForeignIDs = $includeForeignIDs;

        return $obj;
    }
}

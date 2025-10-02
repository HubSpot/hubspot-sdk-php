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
 * $params = (new HubdbImportDraftTableParams); // set properties as needed
 * $client->cms.hubdb->importDraftTable(...$params->toArray());
 * ```
 * Import data into draft table.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->cms.hubdb->importDraftTable(...$params->toArray());`
 *
 * @see HubspotSDK\Cms\Hubdb->importDraftTable
 *
 * @phpstan-type hubdb_import_draft_table_params = array{
 *   config?: string, file?: string
 * }
 */
final class HubdbImportDraftTableParams implements BaseModel
{
    /** @use SdkModel<hubdb_import_draft_table_params> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?string $config;

    #[Api(optional: true)]
    public ?string $file;

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
        ?string $config = null,
        ?string $file = null
    ): self {
        $obj = new self;

        null !== $config && $obj->config = $config;
        null !== $file && $obj->file = $file;

        return $obj;
    }

    public function withConfig(string $config): self
    {
        $obj = clone $this;
        $obj->config = $config;

        return $obj;
    }

    public function withFile(string $file): self
    {
        $obj = clone $this;
        $obj->file = $file;

        return $obj;
    }
}

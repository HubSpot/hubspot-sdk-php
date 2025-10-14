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
 * Import the contents of a CSV file into an existing HubDB table. The data will always be imported into the draft version of the table. Use the `/publish` endpoint to push these changes to the published version.
 * This endpoint takes a multi-part POST request. The first part will be a set of JSON-formatted options for the import and you can specify this with the name as `config`.  The second part will be the CSV file you want to import and you can specify this with the name as `file`. Refer the [overview section](https://developers.hubspot.com/docs/api/cms/hubdb#importing-tables) to check the details and format of the JSON-formatted options for the import.
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

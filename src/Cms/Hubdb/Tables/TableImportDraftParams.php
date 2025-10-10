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
 * $params = (new TableImportDraftParams); // set properties as needed
 * $client->cms.hubdb.tables->importDraft(...$params->toArray());
 * ```
 * Import data into draft table.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->cms.hubdb.tables->importDraft(...$params->toArray());`
 *
 * @see HubspotSDK\Cms\Hubdb\Tables->importDraft
 *
 * @phpstan-type table_import_draft_params = array{config?: string, file?: string}
 */
final class TableImportDraftParams implements BaseModel
{
    /** @use SdkModel<table_import_draft_params> */
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

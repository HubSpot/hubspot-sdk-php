<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Hubdb\Tables;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Core\FileParam;

/**
 * Import the contents of a CSV file into an existing HubDB table. The data will always be imported into the draft version of the table. Use the `/publish` endpoint to push these changes to the published version.
 * This endpoint takes a multi-part POST request. The first part will be a set of JSON-formatted options for the import and you can specify this with the name as `config`.  The second part will be the CSV file you want to import and you can specify this with the name as `file`. Refer the [overview section](https://developers.hubspot.com/docs/api/cms/hubdb#importing-tables) to check the details and format of the JSON-formatted options for the import.
 *
 * @see HubSpotSDK\Services\Cms\Hubdb\TablesService::importDraft()
 *
 * @phpstan-type TableImportDraftParamsShape = array{
 *   config?: string|null, file?: string|null|FileParam
 * }
 */
final class TableImportDraftParams implements BaseModel
{
    /** @use SdkModel<TableImportDraftParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $config;

    #[Optional]
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
        string|FileParam|null $file = null
    ): self {
        $self = new self;

        null !== $config && $self['config'] = $config;
        null !== $file && $self['file'] = $file;

        return $self;
    }

    public function withConfig(string $config): self
    {
        $self = clone $this;
        $self['config'] = $config;

        return $self;
    }

    public function withFile(string|FileParam $file): self
    {
        $self = clone $this;
        $self['file'] = $file;

        return $self;
    }
}

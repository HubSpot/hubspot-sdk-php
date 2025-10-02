<?php

declare(strict_types=1);

namespace HubspotSDK\Files;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new FileUpdatePropertiesRecursivelyParams); // set properties as needed
 * $client->files->updatePropertiesRecursively(...$params->toArray());
 * ```
 * Update folder properties.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->files->updatePropertiesRecursively(...$params->toArray());`
 *
 * @see HubspotSDK\Files->updatePropertiesRecursively
 *
 * @phpstan-type file_update_properties_recursively_params = array{
 *   id: string, name?: string, parentFolderID?: int
 * }
 */
final class FileUpdatePropertiesRecursivelyParams implements BaseModel
{
    /** @use SdkModel<file_update_properties_recursively_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $id;

    #[Api(optional: true)]
    public ?string $name;

    #[Api('parentFolderId', optional: true)]
    public ?int $parentFolderID;

    /**
     * `new FileUpdatePropertiesRecursivelyParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FileUpdatePropertiesRecursivelyParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FileUpdatePropertiesRecursivelyParams)->withID(...)
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
        string $id,
        ?string $name = null,
        ?int $parentFolderID = null
    ): self {
        $obj = new self;

        $obj->id = $id;

        null !== $name && $obj->name = $name;
        null !== $parentFolderID && $obj->parentFolderID = $parentFolderID;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withParentFolderID(int $parentFolderID): self
    {
        $obj = clone $this;
        $obj->parentFolderID = $parentFolderID;

        return $obj;
    }
}

<?php

declare(strict_types=1);

namespace HubspotSDK\Files\Folders;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new FolderGetByPathParams); // set properties as needed
 * $client->files.folders->getByPath(...$params->toArray());
 * ```
 * Retrieve a folder, identified by its path.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->files.folders->getByPath(...$params->toArray());`
 *
 * @see HubspotSDK\Files\Folders->getByPath
 *
 * @phpstan-type folder_get_by_path_params = array{properties?: list<string>}
 */
final class FolderGetByPathParams implements BaseModel
{
    /** @use SdkModel<folder_get_by_path_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Properties to set on returned folder.
     *
     * @var list<string>|null $properties
     */
    #[Api(list: 'string', optional: true)]
    public ?array $properties;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $properties
     */
    public static function with(?array $properties = null): self
    {
        $obj = new self;

        null !== $properties && $obj->properties = $properties;

        return $obj;
    }

    /**
     * Properties to set on returned folder.
     *
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj->properties = $properties;

        return $obj;
    }
}

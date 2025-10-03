<?php

declare(strict_types=1);

namespace HubspotSDK\Files\Files;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new FileGetByPathParams); // set properties as needed
 * $client->files.files->getByPath(...$params->toArray());
 * ```
 * Retrieve file by path.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->files.files->getByPath(...$params->toArray());`
 *
 * @see HubspotSDK\Files\Files->getByPath
 *
 * @phpstan-type file_get_by_path_params = array{properties?: list<string>}
 */
final class FileGetByPathParams implements BaseModel
{
    /** @use SdkModel<file_get_by_path_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<string>|null $properties */
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
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj->properties = $properties;

        return $obj;
    }
}

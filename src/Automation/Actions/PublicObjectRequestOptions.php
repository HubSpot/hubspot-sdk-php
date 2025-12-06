<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicObjectRequestOptionsShape = array{properties: list<string>}
 */
final class PublicObjectRequestOptions implements BaseModel
{
    /** @use SdkModel<PublicObjectRequestOptionsShape> */
    use SdkModel;

    /** @var list<string> $properties */
    #[Api(list: 'string')]
    public array $properties;

    /**
     * `new PublicObjectRequestOptions()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicObjectRequestOptions::with(properties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicObjectRequestOptions)->withProperties(...)
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
     *
     * @param list<string> $properties
     */
    public static function with(array $properties): self
    {
        $obj = new self;

        $obj['properties'] = $properties;

        return $obj;
    }

    /**
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj['properties'] = $properties;

        return $obj;
    }
}

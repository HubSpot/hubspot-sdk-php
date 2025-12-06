<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type BehavioralEventTypeDefinitionLabelsShape = array{
 *   singular: string, plural?: string|null
 * }
 */
final class BehavioralEventTypeDefinitionLabels implements BaseModel
{
    /** @use SdkModel<BehavioralEventTypeDefinitionLabelsShape> */
    use SdkModel;

    #[Api]
    public string $singular;

    #[Api(optional: true)]
    public ?string $plural;

    /**
     * `new BehavioralEventTypeDefinitionLabels()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BehavioralEventTypeDefinitionLabels::with(singular: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BehavioralEventTypeDefinitionLabels)->withSingular(...)
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
    public static function with(string $singular, ?string $plural = null): self
    {
        $obj = new self;

        $obj['singular'] = $singular;

        null !== $plural && $obj['plural'] = $plural;

        return $obj;
    }

    public function withSingular(string $singular): self
    {
        $obj = clone $this;
        $obj['singular'] = $singular;

        return $obj;
    }

    public function withPlural(string $plural): self
    {
        $obj = clone $this;
        $obj['plural'] = $plural;

        return $obj;
    }
}

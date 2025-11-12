<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type MarketingEventEmailSubscriberShape = array{
 *   email: string,
 *   interactionDateTime: int,
 *   contactProperties?: array<string,string>|null,
 *   properties?: array<string,string>|null,
 * }
 */
final class MarketingEventEmailSubscriber implements BaseModel
{
    /** @use SdkModel<MarketingEventEmailSubscriberShape> */
    use SdkModel;

    /**
     * The email address of the contact in HubSpot to associate with the event.
     */
    #[Api]
    public string $email;

    /**
     * Timestamp in milliseconds at which the contact subscribed to the event.
     */
    #[Api]
    public int $interactionDateTime;

    /** @var array<string,string>|null $contactProperties */
    #[Api(map: 'string', optional: true)]
    public ?array $contactProperties;

    /** @var array<string,string>|null $properties */
    #[Api(map: 'string', optional: true)]
    public ?array $properties;

    /**
     * `new MarketingEventEmailSubscriber()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingEventEmailSubscriber::with(email: ..., interactionDateTime: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingEventEmailSubscriber)
     *   ->withEmail(...)
     *   ->withInteractionDateTime(...)
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
     * @param array<string,string> $contactProperties
     * @param array<string,string> $properties
     */
    public static function with(
        string $email,
        int $interactionDateTime,
        ?array $contactProperties = null,
        ?array $properties = null,
    ): self {
        $obj = new self;

        $obj->email = $email;
        $obj->interactionDateTime = $interactionDateTime;

        null !== $contactProperties && $obj->contactProperties = $contactProperties;
        null !== $properties && $obj->properties = $properties;

        return $obj;
    }

    /**
     * The email address of the contact in HubSpot to associate with the event.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }

    /**
     * Timestamp in milliseconds at which the contact subscribed to the event.
     */
    public function withInteractionDateTime(int $interactionDateTime): self
    {
        $obj = clone $this;
        $obj->interactionDateTime = $interactionDateTime;

        return $obj;
    }

    /**
     * @param array<string,string> $contactProperties
     */
    public function withContactProperties(array $contactProperties): self
    {
        $obj = clone $this;
        $obj->contactProperties = $contactProperties;

        return $obj;
    }

    /**
     * @param array<string,string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj->properties = $properties;

        return $obj;
    }
}

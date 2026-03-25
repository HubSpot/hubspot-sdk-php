<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type MarketingEventEmailSubscriberShape = array{
 *   contactProperties: array<string,string>,
 *   email: string,
 *   interactionDateTime: int,
 *   properties: array<string,string>,
 * }
 */
final class MarketingEventEmailSubscriber implements BaseModel
{
    /** @use SdkModel<MarketingEventEmailSubscriberShape> */
    use SdkModel;

    /**
     * The key-value set that contains properties of the contact.
     *
     * @var array<string,string> $contactProperties
     */
    #[Required(map: 'string')]
    public array $contactProperties;

    /**
     * The email address of the contact in HubSpot to associate with the event.
     */
    #[Required]
    public string $email;

    /**
     * Timestamp in milliseconds at which the contact subscribed to the event.
     */
    #[Required]
    public int $interactionDateTime;

    /**
     * The key-value set that contains properties of the marketing event.
     *
     * @var array<string,string> $properties
     */
    #[Required(map: 'string')]
    public array $properties;

    /**
     * `new MarketingEventEmailSubscriber()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingEventEmailSubscriber::with(
     *   contactProperties: ..., email: ..., interactionDateTime: ..., properties: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingEventEmailSubscriber)
     *   ->withContactProperties(...)
     *   ->withEmail(...)
     *   ->withInteractionDateTime(...)
     *   ->withProperties(...)
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
        array $contactProperties,
        string $email,
        int $interactionDateTime,
        array $properties,
    ): self {
        $self = new self;

        $self['contactProperties'] = $contactProperties;
        $self['email'] = $email;
        $self['interactionDateTime'] = $interactionDateTime;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * The key-value set that contains properties of the contact.
     *
     * @param array<string,string> $contactProperties
     */
    public function withContactProperties(array $contactProperties): self
    {
        $self = clone $this;
        $self['contactProperties'] = $contactProperties;

        return $self;
    }

    /**
     * The email address of the contact in HubSpot to associate with the event.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * Timestamp in milliseconds at which the contact subscribed to the event.
     */
    public function withInteractionDateTime(int $interactionDateTime): self
    {
        $self = clone $this;
        $self['interactionDateTime'] = $interactionDateTime;

        return $self;
    }

    /**
     * The key-value set that contains properties of the marketing event.
     *
     * @param array<string,string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }
}

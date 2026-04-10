<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\MarketingEvents;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type SubscriberEmailResponseShape = array{email: string, vid: int}
 */
final class SubscriberEmailResponse implements BaseModel
{
    /** @use SdkModel<SubscriberEmailResponseShape> */
    use SdkModel;

    /**
     * The email of the contact.
     */
    #[Required]
    public string $email;

    /**
     * The internal ID of the contact.
     */
    #[Required]
    public int $vid;

    /**
     * `new SubscriberEmailResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscriberEmailResponse::with(email: ..., vid: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubscriberEmailResponse)->withEmail(...)->withVid(...)
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
    public static function with(string $email, int $vid): self
    {
        $self = new self;

        $self['email'] = $email;
        $self['vid'] = $vid;

        return $self;
    }

    /**
     * The email of the contact.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * The internal ID of the contact.
     */
    public function withVid(int $vid): self
    {
        $self = clone $this;
        $self['vid'] = $vid;

        return $self;
    }
}

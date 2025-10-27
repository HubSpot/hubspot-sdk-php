<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type subscriber_email_response = array{email: string, vid: int}
 */
final class SubscriberEmailResponse implements BaseModel
{
    /** @use SdkModel<subscriber_email_response> */
    use SdkModel;

    #[Api]
    public string $email;

    #[Api]
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
        $obj = new self;

        $obj->email = $email;
        $obj->vid = $vid;

        return $obj;
    }

    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }

    public function withVid(int $vid): self
    {
        $obj = clone $this;
        $obj->vid = $vid;

        return $obj;
    }
}

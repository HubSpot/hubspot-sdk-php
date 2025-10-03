<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type marketing_emails_version_public_email = array{
 *   id: string,
 *   object1: MarketingEmailsPublicEmail,
 *   updatedAt: \DateTimeInterface,
 *   user: MarketingEmailsVersionUser,
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class MarketingEmailsVersionPublicEmail implements BaseModel
{
    /** @use SdkModel<marketing_emails_version_public_email> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public MarketingEmailsPublicEmail $object1;

    #[Api]
    public \DateTimeInterface $updatedAt;

    #[Api]
    public MarketingEmailsVersionUser $user;

    /**
     * `new MarketingEmailsVersionPublicEmail()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingEmailsVersionPublicEmail::with(
     *   id: ..., object1: ..., updatedAt: ..., user: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingEmailsVersionPublicEmail)
     *   ->withID(...)
     *   ->withObject(...)
     *   ->withUpdatedAt(...)
     *   ->withUser(...)
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
        MarketingEmailsPublicEmail $object1,
        \DateTimeInterface $updatedAt,
        MarketingEmailsVersionUser $user,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->object1 = $object1;
        $obj->updatedAt = $updatedAt;
        $obj->user = $user;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withObject(MarketingEmailsPublicEmail $object1): self
    {
        $obj = clone $this;
        $obj->object1 = $object1;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withUser(MarketingEmailsVersionUser $user): self
    {
        $obj = clone $this;
        $obj->user = $user;

        return $obj;
    }
}

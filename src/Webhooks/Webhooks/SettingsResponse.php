<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks\Webhooks;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ThrottlingSettingsShape from \HubspotSDK\Webhooks\Webhooks\ThrottlingSettings
 *
 * @phpstan-type SettingsResponseShape = array{
 *   createdAt: \DateTimeInterface,
 *   targetURL: string,
 *   throttling: ThrottlingSettings|ThrottlingSettingsShape,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class SettingsResponse implements BaseModel
{
    /** @use SdkModel<SettingsResponseShape> */
    use SdkModel;

    /**
     * When this subscription was created. Formatted as milliseconds from the [Unix epoch](#).
     */
    #[Required]
    public \DateTimeInterface $createdAt;

    /**
     * A publicly available URL for Hubspot to call where event payloads will be delivered. See [link-so-some-doc](#) for details about the format of these event payloads.
     */
    #[Required('targetUrl')]
    public string $targetURL;

    #[Required]
    public ThrottlingSettings $throttling;

    /**
     * When this subscription was last updated. Formatted as milliseconds from the [Unix epoch](#).
     */
    #[Optional]
    public ?\DateTimeInterface $updatedAt;

    /**
     * `new SettingsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SettingsResponse::with(createdAt: ..., targetURL: ..., throttling: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SettingsResponse)
     *   ->withCreatedAt(...)
     *   ->withTargetURL(...)
     *   ->withThrottling(...)
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
     * @param ThrottlingSettings|ThrottlingSettingsShape $throttling
     */
    public static function with(
        \DateTimeInterface $createdAt,
        string $targetURL,
        ThrottlingSettings|array $throttling,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        $self['createdAt'] = $createdAt;
        $self['targetURL'] = $targetURL;
        $self['throttling'] = $throttling;

        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * When this subscription was created. Formatted as milliseconds from the [Unix epoch](#).
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * A publicly available URL for Hubspot to call where event payloads will be delivered. See [link-so-some-doc](#) for details about the format of these event payloads.
     */
    public function withTargetURL(string $targetURL): self
    {
        $self = clone $this;
        $self['targetURL'] = $targetURL;

        return $self;
    }

    /**
     * @param ThrottlingSettings|ThrottlingSettingsShape $throttling
     */
    public function withThrottling(ThrottlingSettings|array $throttling): self
    {
        $self = clone $this;
        $self['throttling'] = $throttling;

        return $self;
    }

    /**
     * When this subscription was last updated. Formatted as milliseconds from the [Unix epoch](#).
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}

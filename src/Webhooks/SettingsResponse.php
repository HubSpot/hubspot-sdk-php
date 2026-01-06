<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Webhook settings for an app.
 *
 * @phpstan-type SettingsResponseShape = array{
 *   createdAt: \DateTimeInterface,
 *   targetURL: string,
 *   throttling: ThrottlingSettings,
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
     * A publicly available URL for HubSpot to call where event payloads will be delivered. See [link-so-some-doc](#) for details about the format of these event payloads.
     */
    #[Required('targetUrl')]
    public string $targetURL;

    /**
     * Configuration details for webhook throttling.
     */
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
     * @param ThrottlingSettings|array{maxConcurrentRequests: int} $throttling
     */
    public static function with(
        \DateTimeInterface $createdAt,
        string $targetURL,
        ThrottlingSettings|array $throttling,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        $obj['createdAt'] = $createdAt;
        $obj['targetURL'] = $targetURL;
        $obj['throttling'] = $throttling;

        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * When this subscription was created. Formatted as milliseconds from the [Unix epoch](#).
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * A publicly available URL for HubSpot to call where event payloads will be delivered. See [link-so-some-doc](#) for details about the format of these event payloads.
     */
    public function withTargetURL(string $targetURL): self
    {
        $obj = clone $this;
        $obj['targetURL'] = $targetURL;

        return $obj;
    }

    /**
     * Configuration details for webhook throttling.
     *
     * @param ThrottlingSettings|array{maxConcurrentRequests: int} $throttling
     */
    public function withThrottling(ThrottlingSettings|array $throttling): self
    {
        $obj = clone $this;
        $obj['throttling'] = $throttling;

        return $obj;
    }

    /**
     * When this subscription was last updated. Formatted as milliseconds from the [Unix epoch](#).
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}

<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type webhooks_settings_response = array{
 *   createdAt: \DateTimeInterface,
 *   targetURL: string,
 *   throttling: WebhooksThrottlingSettings,
 *   updatedAt?: \DateTimeInterface,
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class WebhooksSettingsResponse implements BaseModel
{
    /** @use SdkModel<webhooks_settings_response> */
    use SdkModel;

    #[Api]
    public \DateTimeInterface $createdAt;

    #[Api('targetUrl')]
    public string $targetURL;

    #[Api]
    public WebhooksThrottlingSettings $throttling;

    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAt;

    /**
     * `new WebhooksSettingsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhooksSettingsResponse::with(createdAt: ..., targetURL: ..., throttling: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhooksSettingsResponse)
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
     */
    public static function with(
        \DateTimeInterface $createdAt,
        string $targetURL,
        WebhooksThrottlingSettings $throttling,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        $obj->createdAt = $createdAt;
        $obj->targetURL = $targetURL;
        $obj->throttling = $throttling;

        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withTargetURL(string $targetURL): self
    {
        $obj = clone $this;
        $obj->targetURL = $targetURL;

        return $obj;
    }

    public function withThrottling(WebhooksThrottlingSettings $throttling): self
    {
        $obj = clone $this;
        $obj->throttling = $throttling;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}

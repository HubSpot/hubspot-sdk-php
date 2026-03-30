<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\CardsDev;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type CardMigrateViewsResponseShape = array{message: string}
 */
final class CardMigrateViewsResponse implements BaseModel
{
    /** @use SdkModel<CardMigrateViewsResponseShape> */
    use SdkModel;

    /**
     * A human readable message describing the error along with remediation steps where appropriate.
     */
    #[Required]
    public string $message;

    /**
     * `new CardMigrateViewsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CardMigrateViewsResponse::with(message: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CardMigrateViewsResponse)->withMessage(...)
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
    public static function with(string $message): self
    {
        $self = new self;

        $self['message'] = $message;

        return $self;
    }

    /**
     * A human readable message describing the error along with remediation steps where appropriate.
     */
    public function withMessage(string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }
}

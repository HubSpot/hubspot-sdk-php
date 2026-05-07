<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Extensions\CardsDev;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type CardMigrateViewsResponseShape = array{
 *   message: string,
 *   endedAt?: int|null,
 *   remainingPortalCount?: int|null,
 *   startedAt?: int|null,
 *   totalPortalCount?: int|null,
 * }
 */
final class CardMigrateViewsResponse implements BaseModel
{
    /** @use SdkModel<CardMigrateViewsResponseShape> */
    use SdkModel;

    /**
     * A human readable message describing the progress of the migration.
     */
    #[Required]
    public string $message;

    /**
     * The timestamp for when the migration ended.
     */
    #[Optional]
    public ?int $endedAt;

    /**
     * The number of portals that remain to be swapped from the Legacy CRM Card to the App Card.
     */
    #[Optional]
    public ?int $remainingPortalCount;

    /**
     * The timestamp for when the migration started.
     */
    #[Optional]
    public ?int $startedAt;

    /**
     * The total number of portals that have access to the Legacy CRM Card.
     */
    #[Optional]
    public ?int $totalPortalCount;

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
    public static function with(
        string $message,
        ?int $endedAt = null,
        ?int $remainingPortalCount = null,
        ?int $startedAt = null,
        ?int $totalPortalCount = null,
    ): self {
        $self = new self;

        $self['message'] = $message;

        null !== $endedAt && $self['endedAt'] = $endedAt;
        null !== $remainingPortalCount && $self['remainingPortalCount'] = $remainingPortalCount;
        null !== $startedAt && $self['startedAt'] = $startedAt;
        null !== $totalPortalCount && $self['totalPortalCount'] = $totalPortalCount;

        return $self;
    }

    /**
     * A human readable message describing the progress of the migration.
     */
    public function withMessage(string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }

    /**
     * The timestamp for when the migration ended.
     */
    public function withEndedAt(int $endedAt): self
    {
        $self = clone $this;
        $self['endedAt'] = $endedAt;

        return $self;
    }

    /**
     * The number of portals that remain to be swapped from the Legacy CRM Card to the App Card.
     */
    public function withRemainingPortalCount(int $remainingPortalCount): self
    {
        $self = clone $this;
        $self['remainingPortalCount'] = $remainingPortalCount;

        return $self;
    }

    /**
     * The timestamp for when the migration started.
     */
    public function withStartedAt(int $startedAt): self
    {
        $self = clone $this;
        $self['startedAt'] = $startedAt;

        return $self;
    }

    /**
     * The total number of portals that have access to the Legacy CRM Card.
     */
    public function withTotalPortalCount(int $totalPortalCount): self
    {
        $self = clone $this;
        $self['totalPortalCount'] = $totalPortalCount;

        return $self;
    }
}

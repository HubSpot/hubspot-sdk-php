<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Events\ParticipationProperties\AttendanceState;

/**
 * @phpstan-type ParticipationBreakdownShape = array{
 *   id: string,
 *   associations: ParticipationAssociations,
 *   createdAt: \DateTimeInterface,
 *   properties: ParticipationProperties,
 * }
 */
final class ParticipationBreakdown implements BaseModel
{
    /** @use SdkModel<ParticipationBreakdownShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public ParticipationAssociations $associations;

    #[Required]
    public \DateTimeInterface $createdAt;

    #[Required]
    public ParticipationProperties $properties;

    /**
     * `new ParticipationBreakdown()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ParticipationBreakdown::with(
     *   id: ..., associations: ..., createdAt: ..., properties: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ParticipationBreakdown)
     *   ->withID(...)
     *   ->withAssociations(...)
     *   ->withCreatedAt(...)
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
     * @param ParticipationAssociations|array{
     *   contact: ContactAssociation, marketingEvent: MarketingEventAssociation
     * } $associations
     * @param ParticipationProperties|array{
     *   attendanceState: value-of<AttendanceState>,
     *   occurredAt: int,
     *   attendanceDurationSeconds?: int|null,
     *   attendancePercentage?: string|null,
     * } $properties
     */
    public static function with(
        string $id,
        ParticipationAssociations|array $associations,
        \DateTimeInterface $createdAt,
        ParticipationProperties|array $properties,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['associations'] = $associations;
        $obj['createdAt'] = $createdAt;
        $obj['properties'] = $properties;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * @param ParticipationAssociations|array{
     *   contact: ContactAssociation, marketingEvent: MarketingEventAssociation
     * } $associations
     */
    public function withAssociations(
        ParticipationAssociations|array $associations
    ): self {
        $obj = clone $this;
        $obj['associations'] = $associations;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * @param ParticipationProperties|array{
     *   attendanceState: value-of<AttendanceState>,
     *   occurredAt: int,
     *   attendanceDurationSeconds?: int|null,
     *   attendancePercentage?: string|null,
     * } $properties
     */
    public function withProperties(
        ParticipationProperties|array $properties
    ): self {
        $obj = clone $this;
        $obj['properties'] = $properties;

        return $obj;
    }
}

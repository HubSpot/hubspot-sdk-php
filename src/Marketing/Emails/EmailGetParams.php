<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\Emails;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Use this endpoint to get aggregated statistics of emails sent in a specified time span. It also returns the list of emails that were sent during the time span.
 *
 * @see HubSpotSDK\Services\Marketing\EmailsService::get()
 *
 * @phpstan-type EmailGetParamsShape = array{
 *   emailIDs?: list<int>|null,
 *   endTimestamp?: \DateTimeInterface|null,
 *   property?: string|null,
 *   startTimestamp?: \DateTimeInterface|null,
 * }
 */
final class EmailGetParams implements BaseModel
{
    /** @use SdkModel<EmailGetParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<int>|null $emailIDs */
    #[Optional(list: 'int')]
    public ?array $emailIDs;

    #[Optional]
    public ?\DateTimeInterface $endTimestamp;

    #[Optional]
    public ?string $property;

    #[Optional]
    public ?\DateTimeInterface $startTimestamp;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<int>|null $emailIDs
     */
    public static function with(
        ?array $emailIDs = null,
        ?\DateTimeInterface $endTimestamp = null,
        ?string $property = null,
        ?\DateTimeInterface $startTimestamp = null,
    ): self {
        $self = new self;

        null !== $emailIDs && $self['emailIDs'] = $emailIDs;
        null !== $endTimestamp && $self['endTimestamp'] = $endTimestamp;
        null !== $property && $self['property'] = $property;
        null !== $startTimestamp && $self['startTimestamp'] = $startTimestamp;

        return $self;
    }

    /**
     * @param list<int> $emailIDs
     */
    public function withEmailIDs(array $emailIDs): self
    {
        $self = clone $this;
        $self['emailIDs'] = $emailIDs;

        return $self;
    }

    public function withEndTimestamp(\DateTimeInterface $endTimestamp): self
    {
        $self = clone $this;
        $self['endTimestamp'] = $endTimestamp;

        return $self;
    }

    public function withProperty(string $property): self
    {
        $self = clone $this;
        $self['property'] = $property;

        return $self;
    }

    public function withStartTimestamp(\DateTimeInterface $startTimestamp): self
    {
        $self = clone $this;
        $self['startTimestamp'] = $startTimestamp;

        return $self;
    }
}

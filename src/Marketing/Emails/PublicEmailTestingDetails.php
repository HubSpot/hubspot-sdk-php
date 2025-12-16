<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Emails\PublicEmailTestingDetails\AbSampleSizeDefault;
use HubspotSDK\Marketing\Emails\PublicEmailTestingDetails\AbSamplingDefault;
use HubspotSDK\Marketing\Emails\PublicEmailTestingDetails\AbStatus;
use HubspotSDK\Marketing\Emails\PublicEmailTestingDetails\AbSuccessMetric;

/**
 * AB testing related data. This property is only returned for AB type emails.
 *
 * @phpstan-type PublicEmailTestingDetailsShape = array{
 *   abSampleSizeDefault?: null|AbSampleSizeDefault|value-of<AbSampleSizeDefault>,
 *   abSamplingDefault?: null|AbSamplingDefault|value-of<AbSamplingDefault>,
 *   abStatus?: null|AbStatus|value-of<AbStatus>,
 *   abSuccessMetric?: null|AbSuccessMetric|value-of<AbSuccessMetric>,
 *   abTestPercentage?: int|null,
 *   hoursToWait?: int|null,
 *   isAbVariation?: bool|null,
 *   testID?: string|null,
 * }
 */
final class PublicEmailTestingDetails implements BaseModel
{
    /** @use SdkModel<PublicEmailTestingDetailsShape> */
    use SdkModel;

    /**
     * Version of the email that should be sent if there are too few recipients to conduct an AB test.
     *
     * @var value-of<AbSampleSizeDefault>|null $abSampleSizeDefault
     */
    #[Optional(enum: AbSampleSizeDefault::class)]
    public ?string $abSampleSizeDefault;

    /**
     * Version of the email that should be sent if the results are inconclusive after the test period, master or variant.
     *
     * @var value-of<AbSamplingDefault>|null $abSamplingDefault
     */
    #[Optional(enum: AbSamplingDefault::class)]
    public ?string $abSamplingDefault;

    /**
     * Status of the AB test.
     *
     * @var value-of<AbStatus>|null $abStatus
     */
    #[Optional(enum: AbStatus::class)]
    public ?string $abStatus;

    /**
     * Metric to determine the version that will be sent to the remaining contacts.
     *
     * @var value-of<AbSuccessMetric>|null $abSuccessMetric
     */
    #[Optional(enum: AbSuccessMetric::class)]
    public ?string $abSuccessMetric;

    /**
     * The size of your test group.
     */
    #[Optional]
    public ?int $abTestPercentage;

    /**
     * Time limit on gathering test results. After this time is up, the winning version will be sent to the remaining contacts.
     */
    #[Optional]
    public ?int $hoursToWait;

    #[Optional]
    public ?bool $isAbVariation;

    /**
     * The ID of the AB test.
     */
    #[Optional('testId')]
    public ?string $testID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AbSampleSizeDefault|value-of<AbSampleSizeDefault> $abSampleSizeDefault
     * @param AbSamplingDefault|value-of<AbSamplingDefault> $abSamplingDefault
     * @param AbStatus|value-of<AbStatus> $abStatus
     * @param AbSuccessMetric|value-of<AbSuccessMetric> $abSuccessMetric
     */
    public static function with(
        AbSampleSizeDefault|string|null $abSampleSizeDefault = null,
        AbSamplingDefault|string|null $abSamplingDefault = null,
        AbStatus|string|null $abStatus = null,
        AbSuccessMetric|string|null $abSuccessMetric = null,
        ?int $abTestPercentage = null,
        ?int $hoursToWait = null,
        ?bool $isAbVariation = null,
        ?string $testID = null,
    ): self {
        $self = new self;

        null !== $abSampleSizeDefault && $self['abSampleSizeDefault'] = $abSampleSizeDefault;
        null !== $abSamplingDefault && $self['abSamplingDefault'] = $abSamplingDefault;
        null !== $abStatus && $self['abStatus'] = $abStatus;
        null !== $abSuccessMetric && $self['abSuccessMetric'] = $abSuccessMetric;
        null !== $abTestPercentage && $self['abTestPercentage'] = $abTestPercentage;
        null !== $hoursToWait && $self['hoursToWait'] = $hoursToWait;
        null !== $isAbVariation && $self['isAbVariation'] = $isAbVariation;
        null !== $testID && $self['testID'] = $testID;

        return $self;
    }

    /**
     * Version of the email that should be sent if there are too few recipients to conduct an AB test.
     *
     * @param AbSampleSizeDefault|value-of<AbSampleSizeDefault> $abSampleSizeDefault
     */
    public function withAbSampleSizeDefault(
        AbSampleSizeDefault|string $abSampleSizeDefault
    ): self {
        $self = clone $this;
        $self['abSampleSizeDefault'] = $abSampleSizeDefault;

        return $self;
    }

    /**
     * Version of the email that should be sent if the results are inconclusive after the test period, master or variant.
     *
     * @param AbSamplingDefault|value-of<AbSamplingDefault> $abSamplingDefault
     */
    public function withAbSamplingDefault(
        AbSamplingDefault|string $abSamplingDefault
    ): self {
        $self = clone $this;
        $self['abSamplingDefault'] = $abSamplingDefault;

        return $self;
    }

    /**
     * Status of the AB test.
     *
     * @param AbStatus|value-of<AbStatus> $abStatus
     */
    public function withAbStatus(AbStatus|string $abStatus): self
    {
        $self = clone $this;
        $self['abStatus'] = $abStatus;

        return $self;
    }

    /**
     * Metric to determine the version that will be sent to the remaining contacts.
     *
     * @param AbSuccessMetric|value-of<AbSuccessMetric> $abSuccessMetric
     */
    public function withAbSuccessMetric(
        AbSuccessMetric|string $abSuccessMetric
    ): self {
        $self = clone $this;
        $self['abSuccessMetric'] = $abSuccessMetric;

        return $self;
    }

    /**
     * The size of your test group.
     */
    public function withAbTestPercentage(int $abTestPercentage): self
    {
        $self = clone $this;
        $self['abTestPercentage'] = $abTestPercentage;

        return $self;
    }

    /**
     * Time limit on gathering test results. After this time is up, the winning version will be sent to the remaining contacts.
     */
    public function withHoursToWait(int $hoursToWait): self
    {
        $self = clone $this;
        $self['hoursToWait'] = $hoursToWait;

        return $self;
    }

    public function withIsAbVariation(bool $isAbVariation): self
    {
        $self = clone $this;
        $self['isAbVariation'] = $isAbVariation;

        return $self;
    }

    /**
     * The ID of the AB test.
     */
    public function withTestID(string $testID): self
    {
        $self = clone $this;
        $self['testID'] = $testID;

        return $self;
    }
}

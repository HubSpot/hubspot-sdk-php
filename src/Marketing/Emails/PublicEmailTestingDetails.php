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
 *   abSampleSizeDefault?: value-of<AbSampleSizeDefault>|null,
 *   abSamplingDefault?: value-of<AbSamplingDefault>|null,
 *   abStatus?: value-of<AbStatus>|null,
 *   abSuccessMetric?: value-of<AbSuccessMetric>|null,
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
        $obj = new self;

        null !== $abSampleSizeDefault && $obj['abSampleSizeDefault'] = $abSampleSizeDefault;
        null !== $abSamplingDefault && $obj['abSamplingDefault'] = $abSamplingDefault;
        null !== $abStatus && $obj['abStatus'] = $abStatus;
        null !== $abSuccessMetric && $obj['abSuccessMetric'] = $abSuccessMetric;
        null !== $abTestPercentage && $obj['abTestPercentage'] = $abTestPercentage;
        null !== $hoursToWait && $obj['hoursToWait'] = $hoursToWait;
        null !== $isAbVariation && $obj['isAbVariation'] = $isAbVariation;
        null !== $testID && $obj['testID'] = $testID;

        return $obj;
    }

    /**
     * Version of the email that should be sent if there are too few recipients to conduct an AB test.
     *
     * @param AbSampleSizeDefault|value-of<AbSampleSizeDefault> $abSampleSizeDefault
     */
    public function withAbSampleSizeDefault(
        AbSampleSizeDefault|string $abSampleSizeDefault
    ): self {
        $obj = clone $this;
        $obj['abSampleSizeDefault'] = $abSampleSizeDefault;

        return $obj;
    }

    /**
     * Version of the email that should be sent if the results are inconclusive after the test period, master or variant.
     *
     * @param AbSamplingDefault|value-of<AbSamplingDefault> $abSamplingDefault
     */
    public function withAbSamplingDefault(
        AbSamplingDefault|string $abSamplingDefault
    ): self {
        $obj = clone $this;
        $obj['abSamplingDefault'] = $abSamplingDefault;

        return $obj;
    }

    /**
     * Status of the AB test.
     *
     * @param AbStatus|value-of<AbStatus> $abStatus
     */
    public function withAbStatus(AbStatus|string $abStatus): self
    {
        $obj = clone $this;
        $obj['abStatus'] = $abStatus;

        return $obj;
    }

    /**
     * Metric to determine the version that will be sent to the remaining contacts.
     *
     * @param AbSuccessMetric|value-of<AbSuccessMetric> $abSuccessMetric
     */
    public function withAbSuccessMetric(
        AbSuccessMetric|string $abSuccessMetric
    ): self {
        $obj = clone $this;
        $obj['abSuccessMetric'] = $abSuccessMetric;

        return $obj;
    }

    /**
     * The size of your test group.
     */
    public function withAbTestPercentage(int $abTestPercentage): self
    {
        $obj = clone $this;
        $obj['abTestPercentage'] = $abTestPercentage;

        return $obj;
    }

    /**
     * Time limit on gathering test results. After this time is up, the winning version will be sent to the remaining contacts.
     */
    public function withHoursToWait(int $hoursToWait): self
    {
        $obj = clone $this;
        $obj['hoursToWait'] = $hoursToWait;

        return $obj;
    }

    public function withIsAbVariation(bool $isAbVariation): self
    {
        $obj = clone $this;
        $obj['isAbVariation'] = $isAbVariation;

        return $obj;
    }

    /**
     * The ID of the AB test.
     */
    public function withTestID(string $testID): self
    {
        $obj = clone $this;
        $obj['testID'] = $testID;

        return $obj;
    }
}

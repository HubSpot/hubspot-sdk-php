<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Emails\EmailCreateParams\Language;
use HubspotSDK\Marketing\Emails\EmailCreateParams\State;
use HubspotSDK\Marketing\Emails\EmailCreateParams\Subcategory;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new EmailCreateParams); // set properties as needed
 * $client->marketing.emails->create(...$params->toArray());
 * ```
 * Create a new marketing email.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->marketing.emails->create(...$params->toArray());`
 *
 * @see HubspotSDK\Marketing\Emails->create
 *
 * @phpstan-type email_create_params = array{
 *   name: string,
 *   activeDomain?: string,
 *   archived?: bool,
 *   businessUnitID?: int,
 *   campaign?: string,
 *   content?: MarketingEmailsPublicEmailContent,
 *   feedbackSurveyID?: string,
 *   from?: MarketingEmailsPublicEmailFromDetails,
 *   jitterSendTime?: bool,
 *   language?: Language|value-of<Language>,
 *   publishDate?: \DateTimeInterface,
 *   rssData?: MarketingEmailsPublicRssEmailDetails,
 *   sendOnPublish?: bool,
 *   state?: State|value-of<State>,
 *   subcategory?: Subcategory|value-of<Subcategory>,
 *   subject?: string,
 *   subscriptionDetails?: MarketingEmailsPublicEmailSubscriptionDetails,
 *   testing?: MarketingEmailsPublicEmailTestingDetails,
 *   to?: MarketingEmailsPublicEmailToDetails,
 *   webversion?: MarketingEmailsPublicWebversionDetails,
 * }
 */
final class EmailCreateParams implements BaseModel
{
    /** @use SdkModel<email_create_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $name;

    #[Api(optional: true)]
    public ?string $activeDomain;

    #[Api(optional: true)]
    public ?bool $archived;

    #[Api('businessUnitId', optional: true)]
    public ?int $businessUnitID;

    #[Api(optional: true)]
    public ?string $campaign;

    #[Api(optional: true)]
    public ?MarketingEmailsPublicEmailContent $content;

    #[Api('feedbackSurveyId', optional: true)]
    public ?string $feedbackSurveyID;

    #[Api(optional: true)]
    public ?MarketingEmailsPublicEmailFromDetails $from;

    #[Api(optional: true)]
    public ?bool $jitterSendTime;

    /** @var value-of<Language>|null $language */
    #[Api(enum: Language::class, optional: true)]
    public ?string $language;

    #[Api(optional: true)]
    public ?\DateTimeInterface $publishDate;

    #[Api(optional: true)]
    public ?MarketingEmailsPublicRssEmailDetails $rssData;

    #[Api(optional: true)]
    public ?bool $sendOnPublish;

    /** @var value-of<State>|null $state */
    #[Api(enum: State::class, optional: true)]
    public ?string $state;

    /** @var value-of<Subcategory>|null $subcategory */
    #[Api(enum: Subcategory::class, optional: true)]
    public ?string $subcategory;

    #[Api(optional: true)]
    public ?string $subject;

    #[Api(optional: true)]
    public ?MarketingEmailsPublicEmailSubscriptionDetails $subscriptionDetails;

    #[Api(optional: true)]
    public ?MarketingEmailsPublicEmailTestingDetails $testing;

    #[Api(optional: true)]
    public ?MarketingEmailsPublicEmailToDetails $to;

    #[Api(optional: true)]
    public ?MarketingEmailsPublicWebversionDetails $webversion;

    /**
     * `new EmailCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailCreateParams::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailCreateParams)->withName(...)
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
     * @param Language|value-of<Language> $language
     * @param State|value-of<State> $state
     * @param Subcategory|value-of<Subcategory> $subcategory
     */
    public static function with(
        string $name,
        ?string $activeDomain = null,
        ?bool $archived = null,
        ?int $businessUnitID = null,
        ?string $campaign = null,
        ?MarketingEmailsPublicEmailContent $content = null,
        ?string $feedbackSurveyID = null,
        ?MarketingEmailsPublicEmailFromDetails $from = null,
        ?bool $jitterSendTime = null,
        Language|string|null $language = null,
        ?\DateTimeInterface $publishDate = null,
        ?MarketingEmailsPublicRssEmailDetails $rssData = null,
        ?bool $sendOnPublish = null,
        State|string|null $state = null,
        Subcategory|string|null $subcategory = null,
        ?string $subject = null,
        ?MarketingEmailsPublicEmailSubscriptionDetails $subscriptionDetails = null,
        ?MarketingEmailsPublicEmailTestingDetails $testing = null,
        ?MarketingEmailsPublicEmailToDetails $to = null,
        ?MarketingEmailsPublicWebversionDetails $webversion = null,
    ): self {
        $obj = new self;

        $obj->name = $name;

        null !== $activeDomain && $obj->activeDomain = $activeDomain;
        null !== $archived && $obj->archived = $archived;
        null !== $businessUnitID && $obj->businessUnitID = $businessUnitID;
        null !== $campaign && $obj->campaign = $campaign;
        null !== $content && $obj->content = $content;
        null !== $feedbackSurveyID && $obj->feedbackSurveyID = $feedbackSurveyID;
        null !== $from && $obj->from = $from;
        null !== $jitterSendTime && $obj->jitterSendTime = $jitterSendTime;
        null !== $language && $obj->language = $language instanceof Language ? $language->value : $language;
        null !== $publishDate && $obj->publishDate = $publishDate;
        null !== $rssData && $obj->rssData = $rssData;
        null !== $sendOnPublish && $obj->sendOnPublish = $sendOnPublish;
        null !== $state && $obj->state = $state instanceof State ? $state->value : $state;
        null !== $subcategory && $obj->subcategory = $subcategory instanceof Subcategory ? $subcategory->value : $subcategory;
        null !== $subject && $obj->subject = $subject;
        null !== $subscriptionDetails && $obj->subscriptionDetails = $subscriptionDetails;
        null !== $testing && $obj->testing = $testing;
        null !== $to && $obj->to = $to;
        null !== $webversion && $obj->webversion = $webversion;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withActiveDomain(string $activeDomain): self
    {
        $obj = clone $this;
        $obj->activeDomain = $activeDomain;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    public function withBusinessUnitID(int $businessUnitID): self
    {
        $obj = clone $this;
        $obj->businessUnitID = $businessUnitID;

        return $obj;
    }

    public function withCampaign(string $campaign): self
    {
        $obj = clone $this;
        $obj->campaign = $campaign;

        return $obj;
    }

    public function withContent(
        MarketingEmailsPublicEmailContent $content
    ): self {
        $obj = clone $this;
        $obj->content = $content;

        return $obj;
    }

    public function withFeedbackSurveyID(string $feedbackSurveyID): self
    {
        $obj = clone $this;
        $obj->feedbackSurveyID = $feedbackSurveyID;

        return $obj;
    }

    public function withFrom(MarketingEmailsPublicEmailFromDetails $from): self
    {
        $obj = clone $this;
        $obj->from = $from;

        return $obj;
    }

    public function withJitterSendTime(bool $jitterSendTime): self
    {
        $obj = clone $this;
        $obj->jitterSendTime = $jitterSendTime;

        return $obj;
    }

    /**
     * @param Language|value-of<Language> $language
     */
    public function withLanguage(Language|string $language): self
    {
        $obj = clone $this;
        $obj->language = $language instanceof Language ? $language->value : $language;

        return $obj;
    }

    public function withPublishDate(\DateTimeInterface $publishDate): self
    {
        $obj = clone $this;
        $obj->publishDate = $publishDate;

        return $obj;
    }

    public function withRssData(
        MarketingEmailsPublicRssEmailDetails $rssData
    ): self {
        $obj = clone $this;
        $obj->rssData = $rssData;

        return $obj;
    }

    public function withSendOnPublish(bool $sendOnPublish): self
    {
        $obj = clone $this;
        $obj->sendOnPublish = $sendOnPublish;

        return $obj;
    }

    /**
     * @param State|value-of<State> $state
     */
    public function withState(State|string $state): self
    {
        $obj = clone $this;
        $obj->state = $state instanceof State ? $state->value : $state;

        return $obj;
    }

    /**
     * @param Subcategory|value-of<Subcategory> $subcategory
     */
    public function withSubcategory(Subcategory|string $subcategory): self
    {
        $obj = clone $this;
        $obj->subcategory = $subcategory instanceof Subcategory ? $subcategory->value : $subcategory;

        return $obj;
    }

    public function withSubject(string $subject): self
    {
        $obj = clone $this;
        $obj->subject = $subject;

        return $obj;
    }

    public function withSubscriptionDetails(
        MarketingEmailsPublicEmailSubscriptionDetails $subscriptionDetails
    ): self {
        $obj = clone $this;
        $obj->subscriptionDetails = $subscriptionDetails;

        return $obj;
    }

    public function withTesting(
        MarketingEmailsPublicEmailTestingDetails $testing
    ): self {
        $obj = clone $this;
        $obj->testing = $testing;

        return $obj;
    }

    public function withTo(MarketingEmailsPublicEmailToDetails $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }

    public function withWebversion(
        MarketingEmailsPublicWebversionDetails $webversion
    ): self {
        $obj = clone $this;
        $obj->webversion = $webversion;

        return $obj;
    }
}

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
 * Use this endpoint to create a new marketing email.
 *
 * @see HubspotSDK\Marketing\Emails->create
 *
 * @phpstan-type EmailCreateParamsShape = array{
 *   name: string,
 *   activeDomain?: string,
 *   archived?: bool,
 *   businessUnitID?: int,
 *   campaign?: string,
 *   content?: PublicEmailContent,
 *   feedbackSurveyID?: string,
 *   folderIDV2?: int,
 *   from?: PublicEmailFromDetails,
 *   jitterSendTime?: bool,
 *   language?: Language|value-of<Language>,
 *   publishDate?: \DateTimeInterface,
 *   rssData?: PublicRssEmailDetails,
 *   sendOnPublish?: bool,
 *   state?: State|value-of<State>,
 *   subcategory?: Subcategory|value-of<Subcategory>,
 *   subject?: string,
 *   subscriptionDetails?: PublicEmailSubscriptionDetails,
 *   testing?: PublicEmailTestingDetails,
 *   to?: PublicEmailToDetails,
 *   webversion?: PublicWebversionDetails,
 * }
 */
final class EmailCreateParams implements BaseModel
{
    /** @use SdkModel<EmailCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The name of the email, as displayed on the email dashboard.
     */
    #[Api]
    public string $name;

    /**
     * The active domain of the email.
     */
    #[Api(optional: true)]
    public ?string $activeDomain;

    /**
     * Determines if the email is archived or not.
     */
    #[Api(optional: true)]
    public ?bool $archived;

    #[Api('businessUnitId', optional: true)]
    public ?int $businessUnitID;

    /**
     * The ID of the campaign this email is associated to.
     */
    #[Api(optional: true)]
    public ?string $campaign;

    /**
     * Data structure representing the content of the email.
     */
    #[Api(optional: true)]
    public ?PublicEmailContent $content;

    /**
     * The ID of the feedback survey linked to the email.
     */
    #[Api('feedbackSurveyId', optional: true)]
    public ?string $feedbackSurveyID;

    #[Api('folderIdV2', optional: true)]
    public ?int $folderIDV2;

    /**
     * Data structure representing the from fields on the email.
     */
    #[Api(optional: true)]
    public ?PublicEmailFromDetails $from;

    #[Api(optional: true)]
    public ?bool $jitterSendTime;

    /** @var value-of<Language>|null $language */
    #[Api(enum: Language::class, optional: true)]
    public ?string $language;

    /**
     * The date and time the email is scheduled for, in ISO8601 representation. This is only used in local time or scheduled emails.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $publishDate;

    /**
     * RSS related data if it is a blog or rss email.
     */
    #[Api(optional: true)]
    public ?PublicRssEmailDetails $rssData;

    /**
     * Determines whether the email will be sent immediately on publish.
     */
    #[Api(optional: true)]
    public ?bool $sendOnPublish;

    /**
     * The email state.
     *
     * @var value-of<State>|null $state
     */
    #[Api(enum: State::class, optional: true)]
    public ?string $state;

    /**
     * The email subcategory.
     *
     * @var value-of<Subcategory>|null $subcategory
     */
    #[Api(enum: Subcategory::class, optional: true)]
    public ?string $subcategory;

    /**
     * The subject of the email.
     */
    #[Api(optional: true)]
    public ?string $subject;

    /**
     * Data structure representing the subscription fields of the email.
     */
    #[Api(optional: true)]
    public ?PublicEmailSubscriptionDetails $subscriptionDetails;

    /**
     * AB testing related data. This property is only returned for AB type emails.
     */
    #[Api(optional: true)]
    public ?PublicEmailTestingDetails $testing;

    /**
     * Data structure representing the to fields of the email.
     */
    #[Api(optional: true)]
    public ?PublicEmailToDetails $to;

    #[Api(optional: true)]
    public ?PublicWebversionDetails $webversion;

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
        ?PublicEmailContent $content = null,
        ?string $feedbackSurveyID = null,
        ?int $folderIDV2 = null,
        ?PublicEmailFromDetails $from = null,
        ?bool $jitterSendTime = null,
        Language|string|null $language = null,
        ?\DateTimeInterface $publishDate = null,
        ?PublicRssEmailDetails $rssData = null,
        ?bool $sendOnPublish = null,
        State|string|null $state = null,
        Subcategory|string|null $subcategory = null,
        ?string $subject = null,
        ?PublicEmailSubscriptionDetails $subscriptionDetails = null,
        ?PublicEmailTestingDetails $testing = null,
        ?PublicEmailToDetails $to = null,
        ?PublicWebversionDetails $webversion = null,
    ): self {
        $obj = new self;

        $obj->name = $name;

        null !== $activeDomain && $obj->activeDomain = $activeDomain;
        null !== $archived && $obj->archived = $archived;
        null !== $businessUnitID && $obj->businessUnitID = $businessUnitID;
        null !== $campaign && $obj->campaign = $campaign;
        null !== $content && $obj->content = $content;
        null !== $feedbackSurveyID && $obj->feedbackSurveyID = $feedbackSurveyID;
        null !== $folderIDV2 && $obj->folderIDV2 = $folderIDV2;
        null !== $from && $obj->from = $from;
        null !== $jitterSendTime && $obj->jitterSendTime = $jitterSendTime;
        null !== $language && $obj['language'] = $language;
        null !== $publishDate && $obj->publishDate = $publishDate;
        null !== $rssData && $obj->rssData = $rssData;
        null !== $sendOnPublish && $obj->sendOnPublish = $sendOnPublish;
        null !== $state && $obj['state'] = $state;
        null !== $subcategory && $obj['subcategory'] = $subcategory;
        null !== $subject && $obj->subject = $subject;
        null !== $subscriptionDetails && $obj->subscriptionDetails = $subscriptionDetails;
        null !== $testing && $obj->testing = $testing;
        null !== $to && $obj->to = $to;
        null !== $webversion && $obj->webversion = $webversion;

        return $obj;
    }

    /**
     * The name of the email, as displayed on the email dashboard.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * The active domain of the email.
     */
    public function withActiveDomain(string $activeDomain): self
    {
        $obj = clone $this;
        $obj->activeDomain = $activeDomain;

        return $obj;
    }

    /**
     * Determines if the email is archived or not.
     */
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

    /**
     * The ID of the campaign this email is associated to.
     */
    public function withCampaign(string $campaign): self
    {
        $obj = clone $this;
        $obj->campaign = $campaign;

        return $obj;
    }

    /**
     * Data structure representing the content of the email.
     */
    public function withContent(PublicEmailContent $content): self
    {
        $obj = clone $this;
        $obj->content = $content;

        return $obj;
    }

    /**
     * The ID of the feedback survey linked to the email.
     */
    public function withFeedbackSurveyID(string $feedbackSurveyID): self
    {
        $obj = clone $this;
        $obj->feedbackSurveyID = $feedbackSurveyID;

        return $obj;
    }

    public function withFolderIDV2(int $folderIDV2): self
    {
        $obj = clone $this;
        $obj->folderIDV2 = $folderIDV2;

        return $obj;
    }

    /**
     * Data structure representing the from fields on the email.
     */
    public function withFrom(PublicEmailFromDetails $from): self
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
        $obj['language'] = $language;

        return $obj;
    }

    /**
     * The date and time the email is scheduled for, in ISO8601 representation. This is only used in local time or scheduled emails.
     */
    public function withPublishDate(\DateTimeInterface $publishDate): self
    {
        $obj = clone $this;
        $obj->publishDate = $publishDate;

        return $obj;
    }

    /**
     * RSS related data if it is a blog or rss email.
     */
    public function withRssData(PublicRssEmailDetails $rssData): self
    {
        $obj = clone $this;
        $obj->rssData = $rssData;

        return $obj;
    }

    /**
     * Determines whether the email will be sent immediately on publish.
     */
    public function withSendOnPublish(bool $sendOnPublish): self
    {
        $obj = clone $this;
        $obj->sendOnPublish = $sendOnPublish;

        return $obj;
    }

    /**
     * The email state.
     *
     * @param State|value-of<State> $state
     */
    public function withState(State|string $state): self
    {
        $obj = clone $this;
        $obj['state'] = $state;

        return $obj;
    }

    /**
     * The email subcategory.
     *
     * @param Subcategory|value-of<Subcategory> $subcategory
     */
    public function withSubcategory(Subcategory|string $subcategory): self
    {
        $obj = clone $this;
        $obj['subcategory'] = $subcategory;

        return $obj;
    }

    /**
     * The subject of the email.
     */
    public function withSubject(string $subject): self
    {
        $obj = clone $this;
        $obj->subject = $subject;

        return $obj;
    }

    /**
     * Data structure representing the subscription fields of the email.
     */
    public function withSubscriptionDetails(
        PublicEmailSubscriptionDetails $subscriptionDetails
    ): self {
        $obj = clone $this;
        $obj->subscriptionDetails = $subscriptionDetails;

        return $obj;
    }

    /**
     * AB testing related data. This property is only returned for AB type emails.
     */
    public function withTesting(PublicEmailTestingDetails $testing): self
    {
        $obj = clone $this;
        $obj->testing = $testing;

        return $obj;
    }

    /**
     * Data structure representing the to fields of the email.
     */
    public function withTo(PublicEmailToDetails $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }

    public function withWebversion(PublicWebversionDetails $webversion): self
    {
        $obj = clone $this;
        $obj->webversion = $webversion;

        return $obj;
    }
}

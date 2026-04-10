<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Actions\ChirpAIContextObject;

enum UnstructuredSource: string
{
    case NONE = 'NONE';

    case USER_INPUT = 'USER_INPUT';

    case LOGGED_EMAIL = 'LOGGED_EMAIL';

    case VIDEO_CALL = 'VIDEO_CALL';

    case AUDIO_CALL = 'AUDIO_CALL';

    case CALL_TRANSCRIPT = 'CALL_TRANSCRIPT';

    case MEETING_TRANSCRIPT = 'MEETING_TRANSCRIPT';

    case FORMS = 'FORMS';

    case FEEDBACK_SURVEY = 'FEEDBACK_SURVEY';

    case PDF = 'PDF';

    case QUOTE = 'QUOTE';

    case INVOICE = 'INVOICE';

    case OTHER_ATTACHMENT_DOC = 'OTHER_ATTACHMENT_DOC';

    case WHATSAPP = 'WHATSAPP';

    case SMS = 'SMS';

    case CHAT = 'CHAT';

    case FACEBOOK_MESSENGER = 'FACEBOOK_MESSENGER';

    case CUSTOM_CHANNEL_OR_API = 'CUSTOM_CHANNEL_OR_API';

    case MANY = 'MANY';

    case NOTE = 'NOTE';

    case DERIVED = 'DERIVED';
}

<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms\FormListParams;

enum FormType: string
{
    case HUBSPOT = 'hubspot';

    case CAPTURED = 'captured';

    case FLOW = 'flow';

    case BLOG_COMMENT = 'blog_comment';

    case ALL = 'all';
}

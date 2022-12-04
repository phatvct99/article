<?php

namespace App;

class Constant
{
	const REGEX_CONTENT = '/<\s*(h.*?|p.*?)[^>]*>([^<]*)<\s*\/\s*(h.*?|p)\s*>/';

	const REGEX_SCRIPT = '/<script\b[^>]*>([\s\S]*?)<\/script>/';

	const REGEX_STYLE = '/<style\b[^>]*>([\s\S]*?)<\/style>/';

	const REGEX_TAX = '/\d{10}/';

	const REGEX_DATE = '/\d{2}\/\d{2}\/\d{4}/';

	const REGEX_PHONE = '/(.*)thoại:(.*) Ngày(.*)/';

	const REGEX_ADDRESS_COMPANY = '/(.*)thuế: (.*)/';

	const REGEX_NAME_COMPANY = '/(.*)luật:(.*) Điện(.*)/';

	const REGEX_NAME_BUSINESS = '/(.*)chính: (.*)Trạng(.*)/';

	const REGEX_NAME_STATUS = '/(.*)thái:(.*) Mọi(.*)/';

	const PATH_THUMBNAILS_CRYPTO = 'photos/1/image/crypto/thumbails/';

	const PATH_THUMBNAILS_LAND = 'photos/1/image/batdongsan/thumbnails/';

	const PATH_THUMBNAILS_TECHNOLOGY = 'photos/1/image/congnghe/thumbnails/';

	const PATH_THUMBNAILS_FINANCE = 'photos/1/image/taichinh/thumbnails/';

	const PATH_THUMBNAILS_SOCIAL = 'photos/1/image/xahoi/thumbnails/';

	const PATH_THUMBNAILS_ECONOMY = 'photos/1/image/kinhte/thumbnails/';
}

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.apple.com/itms/" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="iTunes Store" />
<meta name="description" content="iTunes Store" />
<title>iPhone Activation</title>
<link
	href="http://static.ips.apple.com/ipa_itunes/stylesheets/shared/common-min.css"
	charset="utf-8" rel="stylesheet" />
<link href="null/deviceservices/stylesheets/styles.css" charset="utf-8"
	rel="stylesheet" />
<link
	href="http://static.ips.apple.com/ipa_itunes/stylesheets/pages/IPAJingleEndPointErrorPage-min.css"
	charset="utf-8" rel="stylesheet" />
<script id="protocol" type="text/x-apple-plist">
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE plist PUBLIC "-//Apple//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd">
<plist version="1.0">
<dict>
	<key>iphone-activation</key>
	<dict>
		<key>ack-received</key>
		<true/>
		<key>show-settings</key>
		<true/>
	</dict>
</dict>
</plist>
</script>
<script>
var protocolElement = document.getElementById("protocol");
var protocolContent = protocolElement.innerText;iTunes.addProtocol(protocolContent);
</script>
</head>
<body>
</body>
</html>
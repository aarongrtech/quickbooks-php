<?php

// For OAuth2 (all new application, and what you should be migrating to)
require_once dirname(__FILE__) . '/config_oauthv2.php';

// For old/legacy applications
//require_once dirname(__FILE__) . '/config_oauthv1.php';

require_once dirname(__FILE__) . '/views/header.tpl.php';

$examples = [];

$dh = opendir(dirname(__FILE__));
while (false !== ($file = readdir($dh))) {
    if (substr($file, 0, 7) !== 'example') {
        continue;
    }

    $tmp = explode('_', $file);
    switch (end($tmp)) {
        case 'get.php':
            $examples[$file] = 'Get ' . implode(' ', array_slice($tmp, 1, -1));
            break;
        case 'add.php':
            $examples[$file] = 'Add a ' . implode(' ', array_slice($tmp, 1, -1));
            break;
        case 'void.php':
            $examples[$file] = 'Void a ' . implode(' ', array_slice($tmp, 1, -1));
            break;
        case 'update.php':
            $examples[$file] = 'Update a ' . implode(' ', array_slice($tmp, 1, -1));
            break;
        case 'query.php':
            $examples[$file] = 'Query for ' . implode(' ', array_slice($tmp, 1, -1));
            break;
        case 'count.php':
            $examples[$file] = 'Count ' . implode(' ', array_slice($tmp, 1, -1));
            break;
        case 'cdc.php':
            $examples[$file] = 'Get objects that have changed since a timestamp';
            break;
        case 'entitlements.php':
            $examples[$file] = 'Get entitlement values (e.g. find out what features QBO supports)';
            break;
        case 'delete.php':
            $examples[$file] = 'Delete a ' . implode(' ', array_slice($tmp, 1, -1));
            break;
        case 'objects.php':
            $examples[$file] = 'Object ' . implode(' ', array_slice($tmp, 1, -1));
            break;
    }
}

?>

<div>
	<h1>
		Welcome to the QuickBooks PHP DevKit - IPP Intuit Anywhere Demo App!
	</h1>

	<p>
		This app demos a PHP connection to QuickBooks Online via the v3 REST APIs.
	</p>
	<p>
		<strong>Please make sure you review the <a target="_blank" href="http://www.consolibyte.com/docs/index.php/PHP_DevKit_for_QuickBooks_-_Intuit_Partner_Platform_Quick-Start">quick-start tutorial</a>!</strong>
	</p>
	<h2>
		Need Help?
	</h2>
	<p>
		You can get support on the forums:
	</p>
	<ul>
		<li><a target="_blank" href="http://www.consolibyte.com/forum/">ConsoliBYTE forums</a></li>
		<li><a target="_blank" href="https://intuitpartnerplatform.lc.intuit.com/">Intuit Developer forums</a></li>
	</ul>
	<p>
		When you post, <strong>make sure that you:</strong>
	</p>
	<ul>
		<li>Post your code.</li>
		<li>Check that all of your OAuth credentials and URLs match between your code and your Intuit account.</li>
		<li>Post your XML request/response. <a href="debugging.php">Don't know how to get the request/response?</a></li>
		<li>Post the results of the <a href="troubleshooting.php">troubleshooting script</a>.</li>
	</ul>

	<p>
		QuickBooks connection status:

		<?php if ($quickbooks_is_connected): ?>
			<div style="border: 2px solid green; text-align: center; padding: 8px; color: green;">
				CONNECTED!<br>
				<br>
				<i>
					Realm: <?php print($realm); ?><br>
					Company: <?php print($quickbooks_CompanyInfo->getCompanyName()); ?><br>
					Email: <?php print($quickbooks_CompanyInfo->getEmail()->getAddress()); ?><br>
					Country: <?php print($quickbooks_CompanyInfo->getCountry()); ?>
				</i>
			</div>

			<h2>Example QuickBooks Stuff</h2>

			<table>
				<?php foreach ($examples as $file => $title): ?>
					<tr>
						<td>
							<a href="<?php print($file); ?>"><?php print($title); ?></a>
						</td>
						<td>
							<a href="source.php?file=<?php print($file); ?>">(view source)</a>
						</td>
					</tr>
				<?php endforeach;
 ?>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>
						<a href="disconnect.php">Disconnect from QuickBooks</a>
					</td>
					<td>
						(If you do this, you'll have to go back through the authorization/connection process to get connected again)
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>
						<a href="reconnect.php">Reconnect / refresh connection</a>
					</td>
					<td>
						(QuickBooks connections expire after 6 months, so you have to this roughly every 5 and 1/2 months)
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>
						<a href="diagnostics.php">Diagnostics about QuickBooks connection</a>
					</td>
					<td>
						&nbsp;
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>
						<a href="debugging.php">Need help debugging/troubleshooting?</a>
					</td>
					<td>
						&nbsp;
					</td>
				</tr>
			</table>

<?php else: ?>
			<div style="border: 2px solid red; text-align: center; padding: 8px; color: red;">
				<b>NOT</b> CONNECTED!<br>
				<br>
				<ipp:connectToIntuit></ipp:connectToIntuit>
				<br>
				<br>
				You must authenticate to QuickBooks <b>once</b> before you can exchange data with it. <br>
				<br>
				<strong>You only have to do this once!</strong> <br><br>

				After you've authenticated once, you never have to go
				through this connection process again. <br>
				Click the button above to
				authenticate and connect.
			</div>
		<?php endif;
 ?>

	</p>
</div>

<?php

require_once dirname(__FILE__) . '/views/footer.tpl.php';

?>

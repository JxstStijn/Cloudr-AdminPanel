<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1">
		<title>Survey</title>
	</head>
	<body style="background-color:#F5F6F8;font-family:-apple-system, BlinkMacSystemFont, 'segoe ui', roboto, oxygen, ubuntu, cantarell, 'fira sans', 'droid sans', 'helvetica neue', Arial, sans-serif;box-sizing:border-box;font-size:16px;">
		<div style="background-color:#fff;margin:30px;box-sizing:border-box;font-size:16px;">
			<h1 style="padding:40px;box-sizing:border-box;font-size:24px;color:#ffffff;background-color:#cb5f51;margin:0;">Survey</h1>
			<p style="padding:40px 40px 20px 40px;margin:0;box-sizing:border-box;font-size:16px;">A user has submitted a survey.</p>
			<h2 style="padding:20px 40px;margin:0;color:#394453;box-sizing:border-box;">Survey Results</h2>
			<div style="box-sizing:border-box;padding:0 40px 20px;">
				<table style="border-collapse:collapse;width:100%;">
					<tbody>
						<tr>
							<td style="padding:15px 0;text-decoration:underline;">Email</td>
							<td style="text-align:right;"><?=$email?></td>
						</tr>
						<tr>
							<td style="padding:15px 0;text-decoration:underline;">Comments</td>
							<td style="text-align:right;"><?=htmlspecialchars($comments, ENT_QUOTES)?></td>
						</tr>
						<tr>
							<td style="padding:15px 0;text-decoration:underline;">How would you rate your experience with us?</td>
							<td style="text-align:right;"><?=htmlspecialchars($rating, ENT_QUOTES)?></td>
						</tr>
						<tr>
							<td style="padding:15px 0;text-decoration:underline;">Where did you hear about us?</td>
							<td style="text-align:right;"><?=htmlspecialchars($hear_about_us, ENT_QUOTES)?></td>
						</tr>
						<tr>
							<td style="padding:15px 0;text-decoration:underline;">How likely are you to recommend us?</td>
							<td style="text-align:right;"><?=htmlspecialchars($recommend, ENT_QUOTES)?></td>
						</tr>
						<tr>
							<td style="padding:15px 0;text-decoration:underline;">How would you like us to respond to you?</td>
							<td style="text-align:right;"><?=htmlspecialchars($contact_pref, ENT_QUOTES)?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>